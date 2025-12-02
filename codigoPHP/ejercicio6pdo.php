<!doctype html>
<html lang="es">
    <head>
        <title>Ejercicio 6</title>
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
                height: 50px;;
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
            <h2>Ejercicio 6</h2>
        </nav>
        <main>
            <div class="ejercicio">
                <?php
                    /**
                     * @author Álvaro Allén
                     * @since 13-11-2025
                     * Registros desde un array departamentosnuevos utilizando 
                     * una consulta preparada
                     */
                     
                    require_once '../config/confDB.php';
                    // Establecemos la configuración de fecha, hora y formato de España
                    setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'spanish');
                    
                    // Declaramos las constantes con el valor del host, el nombre de la base, el nombre de usuario y la constraseña de dicho usuario
                    
                    $fechaActual = date('Y-m-d');
                    
                    
                    // El ejercicio se realiza dentro de un try para que, en caso de que haya un error, deje de ejecutarse y salte el mensaje de error.
                    try{
                        // Iniciamos el objeto PDO con los valores de las constantes.
                        $miDB = new PDO(DSN, USERNAME, PASSWORD);
                        // Creamos un array con los nuevos datos.
                        $aDepartamentosNuevos = [
                            ['DPN', 'Departamento de Seguridad Nacional', 475.5],
                            ['DGM', 'Departamento de Guerra Mundial', 1945.0],
                            ['DQV', 'Departamento de Quiruelas de Vidriales', 93.7]
                        ];

                        // Creamos la consulta SQL preparada.
                        $sql = "INSERT INTO T02_Departamento
                                (T02_CodDepartamento, T02_DescDepartamento, T02_VolumenDeNegocio) 
                                VALUES(:codigo, :descripcion, :volumen)";

                        $consultaPreparada = $miDB->prepare($sql);
                        
                        // Introducimos los parámetros necesarios en la consulta preparada.
                        foreach ($aDepartamentosNuevos as $departamento) {
                            $consultaPreparada->bindParam(':codigo', $departamento[0]);
                            $consultaPreparada->bindParam(':descripcion', $departamento[1]);
                            $consultaPreparada->bindParam(':volumen', $departamento[2]);
                            
                            $consultaPreparada->execute();
                            echo '<p>Se ha insertado correctamente el departamento.</p>';
                        }
                        echo '<br>';
                        echo '<p>Todos fueron insertados correctamente.</p>';
                    }catch(PDOException $ePDO){
                        echo 'Error al conectarse: '.$ePDO->getMessage();
                        echo 'Codigo de error: '.$ePDO->getCode();
                        echo 'Linea de error: '.$ePDO->getLine();
                    } finally{
                        unset($miDB);
                    }
                ?>
            </div>
        </main>
        <footer>
            <div>
                <a href="../indexProyectoTema4.php">
               Álvaro Allén Perlines
                </a>
                <time datetime="2025-11-13">13-11-2025</time>
            </div>
        </footer>
    </body>
</html>
