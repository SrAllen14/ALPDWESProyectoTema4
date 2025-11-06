<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 0</title>
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
                text-align: left;
                padding: 15px;
                
                table{
                    border-collapse: collapse;
                    
                    td{
                        border: 1px solid black;
                    }
                }
            }
            
            .nombre{
                font-weight: bold;
                background-color: lightskyblue;
            }
            
            .valor{
                color: gray;
                background-color: lemonchiffon;
            }
            
            .error{
                color: red;
                background-color: lemonchiffon;
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
            <h2>Ejercicio 0 PDO</h2>
        </nav>
        <main>
            <div class="ejercicio">
                <?php
                    /**
                     * @author Álvaro Allén
                     * @since 06-11-2025
                     * Realizar una conexión con la base de datos. Debe dar error en un intento y 
                     * realizarse correctamente en otro intento (poner mal la contraseña aproposito).
                     */
                    
                    // Definimos las constantes con el valor del DNS (host y nombre de la base)
                    // el nombre del usuario y la contraseña.
                    const DSN = "mysql:host=10.199.11.90;dbname=DBALPDWESProyectoTema4";
                    const USERNAME = 'userALPDWESProyectoTema4';
                    const PASSWORD = 'paso';
                    
                    // Definimos un array con cada uno de los atributos que tiene una base de datos.
                    $aAtributos = array(
                        "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
                        "ORACLE_NULLS", "PERSISTENT", "PREFETCH", "SERVER_INFO", "SERVER_VERSION",
                        "TIMEOUT"
                    );
                    
                    echo "<h3>Conexión correcta a la BD.</h3>";
                    
                    try{
                        // Esto se realizará en caso de que no haya errores.
                        // Comprobamos que se puede conectar a la base de datos correctamente.
                        $miDB = new PDO(DSN, USERNAME, PASSWORD);
                        echo 'Conectado a la BBDD con éxito';
                        echo '<br><br>';
                        
                        echo '<p><b>Atributos de la conexión</b></p>';
                        echo '<table>';
                        foreach($aAtributos as $atributo){
                            echo '<tr>';
                            echo "<td class='nombre'>PDO::ATTR_$atributo: </td>";
                            try{
                                echo "<td class='valor'>".$miDB->getAttribute(constant("PDO::ATTR_$atributo")).'</td>';
                            } catch (PDOException $ePDO){
                                echo "<td class='error'>Error:".$ePDO->getMessage().'<br>Código de error: '.$ePDO->getCode().'</td>';
                            }
                            echo '</tr>';
                        }
                        echo '</table>';
                    } catch (PDOException $miExceptionPDO){
                        echo "Error: ".$miExceptionPDO->getMessage();
                        echo '<br>';
                        echo 'Código de error: '.$miExceptionPDO->getCode();
                    } finally{
                        unset($miDB);
                    }
                    
                    echo '<br>';
                    echo "<h3>Eror de conexión por contraseña incorrecta.</h3>";
                    try{
                        $miDB = new PDO(DSN, USERNAME, "holaquetal");
                    } catch(PDOException $ePDO2){
                        echo $ePDO2->getMessage();
                    }
                ?>
            </div>
        </main>
        <footer>
            <div>
                <a href="../indexProyectoTema4.php">
                Álvaro Allén Perlines
                </a>
                <time datetime="2025-11-06">06-11-2025</time>
            </div>
        </footer>
    </body>
</html>
