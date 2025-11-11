<!doctype html>
<html lang="es">
    <head>
        <title>Ejercicio 5</title>
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
            <h2>Ejercicio 5</h2>
        </nav>
        <main>
            <div class="ejercicio">
                <?php
                    /**
                     * @author Álvaro Allén
                     * @since 11-11-2025
                     * Realizamos tres registros a la tabla de la base 
                     * de datos mediante inserts y una transación
                     */
                     
                    // Establecemos la configuración de fecha, hora y formato de España
                    setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'spanish');
                    
                    // Declaramos las constantes con el valor del host, el nombre de la base, el nombre de usuario y la constraseña de dicho usuario.
                    define('DSN', 'mysql:host='.$_SERVER['SERVER_ADDR'].'; dbname=DBALPDWESProyectoTema4');
                    define('USERNAME','userALPDWESProyectoTema4');
                    define('PASSWORD', 'paso');
                    
                    $fechaActual = date('Y-m-d');
                    // El ejercicio se realiza dentro de un try para que, en caso de que haya un error, deje de ejecutarse y salte el mensaje de error.
                    try{
                        // Iniciamos el objeto PDO con los valores de las constantes.
                        $miDB = new PDO(DSN, USERNAME, PASSWORD);
                        
                        // Realizamos la consulta necesaria una vez la conexión sea efectiva.
                        $consulta = $miDB->query("INSERT INTO T02_Departamento VALUES('BBB','$fechaActual',null,'Esto es una prueba', 10.5)");
                        $consulta = $miDB->query("INSERT INTO T02_Departamento VALUES('CCC','$fechaActual',null,'Esto es una prueba', 10.5)");
                        $consulta = $miDB->query("INSERT INTO T02_Departamento VALUES('DDD','$fechaActual',null,'Esto es una prueba', 10.5)");
                        
                        echo '<p>Insercciones realizadas correctamente.</p>';
                    }catch(PDOException $ePDO){
                        echo 'Error al conectarse: '.$ePDO->getMessage();
                    }
                ?>
            </div>
        </main>
        <footer>
            <div>
                <a href="../indexProyectoTema4.php">
               Álvaro Allén Perlines
                </a>
                <time datetime="2025-11-11">11-11-2025</time>
            </div>
        </footer>
    </body>
</html>
