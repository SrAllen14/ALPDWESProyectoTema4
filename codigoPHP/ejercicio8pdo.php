<!doctype html>
<html lang="es">
    <head>
        <title>Ejercicio 8</title>
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
            <h2>Ejercicio 8</h2>
        </nav>
        <main>
            <div class="ejercicio">
                <?php
                    /**
                     * @author Álvaro Allén
                     * @since 15-11-2025
                     * Exportación a archivo datos.json del contenido 
                     * de la tabla T02_Departamento de la base de datos.
                     */
                     
                    require_once '../config/confDB.php';
                    // Establecemos la configuración de fecha, hora y formato de España
                    setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'spanish');
                    
                    // Declaramos la variable con la ruta del archivo json
                    $numRegistros = 0;
                    
                    try{
                        $miDB = new PDO(DSN, USERNAME, PASSWORD);
                        $sql = "SELECT * FROM T02_Departamento";
                        
                        $consulta = $miDB->prepare($sql);
                        $consulta->execute();
                        
                        $aDepartamentos=[];
                        $indice = 0;
                        
                        while($registro = $consulta->fetchObject()){
                            $aDepartamentos[$indice]=[
                              'T02_CodDepartamento' => $registro->T02_CodDepartamento,
                              'T02_DescDepartamento' => $registro->T02_DescDepartamento,
                              'T02_FechaCreacionDepartamento' => $registro->T02_FechaCreacionDepartamento,
                              'T02_VolumenDeNegocio' => $registro->T02_VolumenDeNegocio,
                              'T02_FechaBajaDepartamento' => $registro->T02_FechaBajaDepartamento ?? 'null'
                            ];
                            $indice++;
                        }
                        
                        // https://www.php.net/manual/es/json.constants.php
                        $json = json_encode($aDepartamentos, JSON_PRETTY_PRINT);
                        file_put_contents('../tmp/datos.json', $json);
                        echo '<p>Datos introducidos correctamente.</p>';
                        
                        echo '<br>';
                        echo '<br>';
                        echo '<p>Contenido del archivo JSON.</p>';
                        echo '<pre>';
                            highlight_file('../tmp/datos.json');
                        echo '</pre>';
                    } catch(PDOException $exPDO){
                        echo "<h3>$exPDO->getMessage()</h3>";
                    } finally {
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
                <time datetime="2025-11-15">15-11-2025</time>
            </div>
        </footer>
    </body>
</html>
