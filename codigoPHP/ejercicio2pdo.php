<!doctype html>
<html lang="es">
    <head>
        <title>Ejercicio 2</title>
        <style>
            *{
                margin: 0 auto;
                padding: 0 auto;
            }
            body{
                width: 1920px;
                height: 1080px;
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
                width: 1500px;
                border: 1px solid black;
                border-radius: 10px;

                p{
                    font-weight: bold;
                }
                
                table{
                    border-collapse: collapse;
                    
                    tr.titulo{
                        background-color: lightcyan;
                    }
                    
                    td{
                        border: 1px solid black
                    }
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
            <h2>Ejercicio 2</h2>
        </nav>
        <main>
            <div class="ejercicio">
                <?php
                    /**
                     * @author Álvaro Allén
                     * @since 03-11-2025
                     * Mostrar el contenido de la tabla T02_Departamento de la base de datos DBALPDWESProyectoTema4.
                     */
                    
                    // Declaramos las constantes con el valor del host, el nombre de la base, el nombre de usuario y la constraseña de dicho usuario.
                    require_once '../config/confDB.php';
                    
                    // El ejercicio se realiza dentro de un try para que, en caso de que haya un error, deje de ejecutarse y salte el mensaje de error.
                    try{
                        // Iniciamos el objeto PDO con los valores de las constantes.
                        $miDB = new PDO(DSN, USERNAME, PASSWORD);
                        
                        // Realizamos la consulta necesaria una vez la conexión sea efectiva.
                        $consulta = $miDB->query("select * from T02_Departamento");
                        
                        // Formateamos la salida para que los valores dentro de la tabla salgan en forma de tabla en HTML.
                        echo '<table>';
                        echo '<tr class="titulo">';
                        echo '<td>T02_CodDepartamento</td>';
                        echo '<td>T02_DescDepartamento</td>';
                        echo '<td>T02_FechaCreaciónDepartamento</td>';
                        echo '<td>T02_FechaBajaDeparamento</td>';
                        echo '<td>T02_VolumenDeNegocio</td>';
                        echo '</tr>';
                        
                        // Recorremos cada uno de los resultados mediante el método fetch().
                        while($aFila = $consulta->fetch()){
                            echo '<tr>';
                                echo '<td>'.$aFila['T02_CodDepartamento'].'</td>';
                                echo '<td>'.$aFila['T02_DescDepartamento'].'</td>';
                                echo '<td>'.(new DateTime($aFila['T02_FechaCreacionDepartamento']))->format("d-m-Y").'</td>';
                                if(empty($aFila['T02_FechaBajaDepartamento'])){
                                    echo '<td>Activo</td>';
                                } else{
                                    echo '<td>'.$aFila['T02_FechaBajaDepartamento'].'</td>';
                                }
                                echo '<td>'.$aFila['T02_VolumenDeNegocio'].'</td>';
                                echo '</tr>';
                        }
                        
                        echo '</table>';
                    }catch(PDOException $ePDO){
                        // En caso de excepción en la ejecución mostramos el mensaje de error.
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
                <time datetime="2025-11-10">10-11-2025</time>
            </div>
        </footer>
    </body>
</html>
