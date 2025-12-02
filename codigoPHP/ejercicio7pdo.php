<!doctype html>
<html lang="es">
    <head>
        <title>Ejercicio 7</title>
        <style>
            *{
                margin: 0 auto;
                padding: 0 auto;
            }
            body{
                font-family: Arial, sans-serif;
                background: #f4f6f9;
                align-items: center;
                text-align: center;
            }

            nav{
                background-color: #456D96;
                color: white;
            }

            .ejercicio{
                margin-top: 10px;
                margin-bottom: 10px;
                width: 750px;
                border: 1px solid black;
                border-radius: 10px;

                p{
                    font-weight: bold;
                }
            }

            footer{
                margin: auto;
                background-color: #456d96;
                text-align: center;
                align-content: center;
                height: 50px;
                ;
                color: white;

                & a{
                    text-decoration: none;
                }
            }
        </style>
    </head>
    <body>
        <nav>
            <h2>DWES - Tema 4</h2>
            <h2>Ejercicio 7</h2>
        </nav>
        <main>
            <div class="ejercicio">
                <?php
                /**
                 * @author Álvaro Allén
                 * @since 23-11-2025
                 * Realizar una importación de registros con datos recogidos de un archivo JSON.
                 */
                    require_once '../config/confDB.php';
                    // Establecemos la configuración de fecha, hora y formato de España
                    setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'spanish');

                    // Declaramos la variable con la ruta del archivo json
                    $rutaArchivo = '../tmp/datos.json';

                    if (!file_exists($rutaArchivo)) {
                        echo '<h2>No existe el archivo</h2>';
                    } else {
                        // Recogemos el archivo JSON de la ruta.
                        $archivoJSON = file_get_contents($rutaArchivo);

                        // Convertimos el archivo JSON en un array con cada apartado.
                        $aDepartamentos = json_decode($archivoJSON, true);
                        try {
                            // Realizamos la conexión con la base de datos creando un objeto PDO.
                            $miDB = new PDO(DSN, USERNAME, PASSWORD);
                                
                            // Vaciamos la tabla para poder hacer las insercciones sin causar conflictos.
                            $vaciarTabla = $miDB->prepare('TRUNCATE TABLE T02_Departamento');
                            $vaciarTabla->execute();

                            $miDB->beginTransaction();

                            // Realizamos la insercción de los datos recogidos en el archivo JSON en la tabla T02_Departamento.
                            $consulta = 'INSERT INTO T02_Departamento VALUES (:codigo, :fechaAlta, :fechaBaja, :descripcion, :volumen)';

                            $SQLConsulta = $miDB->prepare($consulta);
                            foreach ($aDepartamentos as $registro) {
                                $SQLConsulta->bindParam(":codigo", $registro['T02_CodDepartamento']);

                                $fechaA = new DateTime($registro['T02_FechaCreacionDepartamento']);
                                $fechaA = $fechaA->format('Y-m-d');
                                $SQLConsulta->bindParam(":fechaAlta", $fechaA);

                                if ($registro['T02_FechaBajaDepartamento'] === 'null') {
                                    $fechaB = null;
                                } else {
                                    $fechaB = new DateTime($registro['T02_FechaBajaDepartamento']);
                                    $fechaB = $fechaB->format('Y-m-d');
                                }
                                $SQLConsulta->bindParam(":fechaBaja", $fechaB);
                                $SQLConsulta->bindParam(":descripcion", $registro['T02_DescDepartamento']);
                                $SQLConsulta->bindParam(":volumen", $registro['T02_VolumenDeNegocio']);

                                $SQLConsulta->execute();
                            }

                            $miDB->commit();
                            echo 'Datos importados correctamente del JSON';
                        } catch (PDOException $ePDO) {
                            // En caso de lanzar una excepción se revertiran todos los cambios realizados durante la última ejecución.
                            $miDB->rollBack();
                            echo 'Error al conectarse: ' . $ePDO->getMessage();
                            echo 'Codigo de error: ' . $ePDO->getCode();
                            echo 'Linea de error: ' . $ePDO->getLine();
                        } finally {
                            unset($miDB);
                        }
                    }
                ?>
            </div>
        </main>
        <footer>
            <div>
                <a href="../indexProyectoTema4.php">
                    Álvaro Allén Perlines
                </a>
                <time datetime="2025-11-18">18-11-2025</time>
            </div>
        </footer>
    </body>
</html>