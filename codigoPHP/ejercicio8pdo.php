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
                     * Registros desde un array departamentosnuevos utilizando 
                     * una consulta preparada
                     */
                     
                    require_once '../config/confDB.php';
                    // Establecemos la configuración de fecha, hora y formato de España
                    setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'spanish');
                    
                    // Declaramos la variable con la ruta del archivo json
                    $rutaArchivo = '../tmp/departamentosnuevos.xml';
                    
                    if(!file_exists($rutaArchivo)){
                        echo '<h2>No existe el archivo</h2>';
                    } else{
                        try{
                        $archivoJSON = file_get_contents();
                        
                        }catch(PDOException $ePDO){
                            echo 'Error al conectarse: '.$ePDO->getMessage();
                            echo 'Codigo de error: '.$ePDO->getCode();
                            echo 'Linea de error: '.$ePDO->getLine();
                        } finally{
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
                <time datetime="2025-11-15">15-11-2025</time>
            </div>
        </footer>
    </body>
</html>
