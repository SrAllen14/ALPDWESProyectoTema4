<!doctype html>
<html lang="es">
    <head>
        <title>Ejercicio 3</title>
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
                width: 1500px;
                border: 1px solid black;
                border-radius: 10px;

                p{
                    font-weight: bold;
                }
                
                a.boton{
                    text-decoration: none;
                    background-color: #EFEFEF;
                    font-size: 0.9rem;
                    color: black;
                    border: 1px solid #767676;
                    border-radius: 3px;
                    width: 200px;
                    height: 20px;
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
            
            .obligatorio{
                background-color: #FCF8CC;
            }
            
            .lectura{
                background-color: whitesmoke;
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
            <h2>Ejercicio 3</h2>
        </nav>
        <main>
            <div class="ejercicio">
                <?php
                    /**
                     * @author Álvaro Allén
                     * @since 10-11-2025
                     * 
                     */
                    
                    // Establecemos la configuración de fecha, hora y formato de España
                    setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'spanish');
                    
                    // Enlace para importar las librerías de validación de campos
                    require_once '../core/231018libreriaValidacion.php';
                    require_once '../core/miLibreriaValidacion.php';

                    // Declaramos las constantes con el valor del host, el nombre de la base, el nombre de usuario y la constraseña de dicho usuario.
                    define('DSN', 'mysql:host='.$_SERVER['SERVER_ADDR'].'; dbname=DBALPDWESProyectoTema4');
                    define('USERNAME','userALPDWESProyectoTema4');
                    define('PASSWORD', 'paso');
                    
                     //inicialización de variables
                    $aErrores = [
                        'T02_CodDepartamento' => '',
                        'T02_DescDepartamento' => '',
                        'T02_VolumenDeNegocio' => ''
                    ];
                    $aRespuestas = [
                        'T02_CodDepartamento' => '',
                        'T02_DescDepartamento' => '',
                        'T02_VolumenDeNegocio' => ''
                    ];
                    
                    $fechaActual = date('Y-m-d');
                    $entradaOK = true;
                    
                    
                     //Para cada campo del formulario se valida la entrada y se actua en consecuencia
                    if (isset($_REQUEST['enviar'])) {//se cumple si el boton es submit
                        //Validación de los datos de los campos del formulario
                        $aErrores['T02_CodDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['T02_CodDepartamento'], 80, 1, 1);
                        $aErrores['T02_DescDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['T02_DescDepartamento'], 50, 1, 1);
                        $aErrores['T02_VolumenDeNegocio'] = validacionFormularios::comprobarFloat($_REQUEST['T02_VolumenDeNegocio']);

                        //recorre el array de errores para detectar si hay alguno
                        foreach ($aErrores as $campo => $valorCampo) {
                            if ($valorCampo != null) {//Si encuentra algún error 
                                $entradaOK = false; // la entrada no es correcta
                            }
                        }
                    } else {
                        //Si no se ha aceptado el formulario
                        $entradaOK = false;
                    }
                    //Tratamiento del formulario
                    if ($entradaOK) {
                        //REllenamos el array de respuesta con los valores que ha introducido el usuario
                        $aRespuestas['T02_CodDepartamento'] = $_REQUEST['T02_CodDepartamento'];
                        $aRespuestas['T02_DescDepartamento'] = $_REQUEST['T02_DescDepartamento'];
                        $aRespuestas['T02_VolumenDeNegocio'] = $_REQUEST['T02_VolumenDeNegocio'];

                        //Se recorre el array de las respuestas y se muestran
                        print("<br><h3>Respuestas del usuario</h3><br>");
                        foreach ($aRespuestas as $campo => $valorCampo) {
                            print("<p>El $campo del usuario: </p>" . $valorCampo . '<br>');
                        }
                        try{
                            // Iniciamos el objeto PDO con los valores de las constantes.
                            $miDB = new PDO(DSN, USERNAME, PASSWORD);
                            
                            $consulta = $miDB->query("INSERT INTO T02_Departamento VALUES('{$aRespuestas['T02_CodDepartamento']}','$fechaActual',null,'{$aRespuestas['T02_DescDepartamento']}', '{$aRespuestas['T02_VolumenDeNegocio']}')");
                        
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
                            echo 'Error al conectarse: '.$ePDO->getMessage();
                        }
                    } else {
                        //si hay algún error se vuelve a mostrar el formulario
                    ?>
                    <section>
                        <h2>Rellena el formulario.</h2>
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

                            <label for="T02_CodDepartamento">Código de departamento: </label>
                            <a style='color:red'><?php echo $aErrores['T02_CodDepartamento'] ?></a><br>
                            <input class="obligatorio" name="T02_CodDepartamento" id="T02_CodDepartamento" type="text" value=""><br>
                            <br>
                            
                            <label for="T02_DescDepartamento">Descripción del departamento: </label>
                            <a style='color:red'><?php echo $aErrores['T02_DescDepartamento'] ?></a><br>
                            <input class="obligatorio" name="T02_DescDepartamento" id="T02_DescDepartamento" type="text" value='<?php echo(empty($aErrores['T02_DescDepartamento'])) ? ($_REQUEST['T02_DescDepartamento'] ?? '') : ''; ?>'><br>
                            <br>
                            
                            <label for="T02_FechaCreacionDepartamento">Introduzca fecha de baja: </label>
                            <input class="lectura" type="date" name="T02_FechaCreacionDepartamento" id="T02_FechaCreacionDepartamento" value="<?php echo $fechaActual;?>" readonly><br>
                            <br>
                            
                            <label for="T02_VolumenDeNegocio">Introduzca el volumen del negocio: </label>
                            <a style='color:red'><?php echo $aErrores['T02_VolumenDeNegocio'] ?></a><br>
                            <input type="text" name="T02_VolumenDeNegocio" id="T02_VolumenDeNegocio" value='<?php echo(empty($aErrores['T02_VolumenDeNegocio'])) ? ($_REQUEST['T02_VolumenDeNegocio'] ?? '0.0') : ''; ?>'><br>
                            
                            <button type="submit" name="enviar">Enviar</button>
                            <a class="boton" href="../indexProyectoTema4.php">Cancelar</a>

                        </form>  
                        <?php
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
