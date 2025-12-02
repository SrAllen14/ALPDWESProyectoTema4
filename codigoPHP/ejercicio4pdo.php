<!doctype html>
<html lang="es">
    <head>
        <title>Ejercicio 4</title>
        <style>
            *{
                margin: 0 auto;
                padding: 0 auto;
            }
            body{
                width: 1920px;
                height: 100vh;
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
                background: #f4f6f9;
                align-items: center;
                text-align: center;
                transform-origin: top left;
                transform: scale(1);
            }

            nav{
                background-color: #456D96;
                color: white;
                width: 1920px;
            }

            .ejercicio{
                padding: 20px;
                margin-top: 10px;
                margin-bottom: 10px;
                width: 1200px;
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
            }
            
            table{
                border-collapse: collapse;
                width: 720px;

                tr.titulo{
                    background-color: lightcyan;
                }

                td{
                    border: 1px solid black
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
                width: 1920px;
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
            <h2>Ejercicio 4</h2>
        </nav>
        <main>
            <div class="ejercicio">
                <?php
                /**
                 * @author Álvaro Allén
                 * @since 13-11-2025
                 * Formulario de búsqueda de departamentos por descripción.
                 */
                // Establecemos la configuración de fecha, hora y formato de España
                setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'spanish');

                // Enlace para importar las librerías de validación de campos
                require_once '../core/231018libreriaValidacion.php';
                require_once '../core/miLibreriaValidacion.php';
                require_once '../config/confDB.php';

                //inicialización de variables
                $aErrores = [
                    'T02_DescDepartamento' => '',
                ];
                $aRespuestas = [
                    'T02_DescDepartamento' => '',
                ];

                $entradaOK = true;

                //Para cada campo del formulario se valida la entrada y se actua en consecuencia
                if (isset($_REQUEST['enviar'])) {//se cumple si el boton es submit
                    //Validación de los datos de los campos del formulario
                    $aErrores['T02_DescDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['T02_DescDepartamento'], 50, 1, 0);

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
                    $aRespuestas['T02_DescDepartamento'] = $_REQUEST['T02_DescDepartamento'];
                    ?>
                    <section>
                        <h2>Rellena el formulario.</h2>
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

                            <label for="T02_DescDepartamento">Descripción del departamento: </label>
                            <a style='color:red'><?php echo $aErrores['T02_DescDepartamento'] ?></a><br>
                            <input name="T02_DescDepartamento" id="T02_DescDepartamento" type="text" value='<?php echo(empty($aErrores['T02_DescDepartamento'])) ? ($_REQUEST['T02_DescDepartamento'] ?? '') : ''; ?>'><br>
                            <br>

                            <button type="submit" name="enviar">Enviar</button>
                            <a class="boton" href="../indexProyectoTema4.php">Cancelar</a>

                        </form>
                    </section>
                    <?php
                    try {
                        // Iniciamos el objeto PDO con los valores de las constantes.
                        $miDB = new PDO(DSN, USERNAME, PASSWORD);
                        $desc = "%" . $aRespuestas['T02_DescDepartamento'] . "%";

                        // Seleccionamos todas las columnas de la tabla departamento cuando 
                        // la descripción coincide con el texto introducido en el input del formulario.
                        $resultado = $miDB->query("SELECT * FROM T02_Departamento WHERE T02_DescDepartamento LIKE '$desc'");
                        if (!$resultado) {
                            $resultado = $miDB->query("SELECT * FROM T02_Departamento");
                            echo '<table>';
                            echo '<tr class="titulo">';
                            echo '<td>T02_CodDepartamento</td>';
                            echo '<td>T02_DescDepartamento</td>';
                            echo '<td>T02_FechaCreaciónDepartamento</td>';
                            echo '<td>T02_FechaBajaDeparamento</td>';
                            echo '<td>T02_VolumenDeNegocio</td>';
                            echo '</tr>';

                            while ($aFila = $resultado->fetch()) {
                                echo '<tr>';
                                echo '<td>' . $aFila['T02_CodDepartamento'] . '</td>';
                                echo '<td>' . $aFila['T02_DescDepartamento'] . '</td>';
                                echo '<td>' . (new DateTime($aFila['T02_FechaCreacionDepartamento']))->format("d-m-Y") . '</td>';
                                if (empty($aFila['T02_FechaBajaDepartamento'])) {
                                    echo '<td>Activo</td>';
                                } else {
                                    echo '<td>' . $aFila['T02_FechaBajaDepartamento'] . '</td>';
                                }
                                echo '<td>' . $aFila['T02_VolumenDeNegocio'] . '</td>';
                                echo '</tr>';
                            }
                            echo '</table>';
                        } else {
                            echo '<table>';
                            echo '<tr class="titulo">';
                            echo '<td>T02_CodDepartamento</td>';
                            echo '<td>T02_DescDepartamento</td>';
                            echo '<td>T02_FechaCreaciónDepartamento</td>';
                            echo '<td>T02_FechaBajaDeparamento</td>';
                            echo '<td>T02_VolumenDeNegocio</td>';
                            echo '</tr>';
                            while ($aFila = $resultado->fetch()) {
                                echo '<tr>';
                                echo '<td>' . $aFila['T02_CodDepartamento'] . '</td>';
                                echo '<td>' . $aFila['T02_DescDepartamento'] . '</td>';
                                echo '<td>' . (new DateTime($aFila['T02_FechaCreacionDepartamento']))->format("d-m-Y") . '</td>';
                                if (empty($aFila['T02_FechaBajaDepartamento'])) {
                                    echo '<td>Activo</td>';
                                } else {
                                    echo '<td>' . $aFila['T02_FechaBajaDepartamento'] . '</td>';
                                }
                                echo '<td>' . $aFila['T02_VolumenDeNegocio'] . '</td>';
                                echo '</tr>';
                            }
                            echo '</table>';
                        }
                    } catch (PDOException $ePDO) {
                        echo 'Error al conectarse: ' . $ePDO->getMessage();
                        echo 'Codigo de error: ' . $ePDO->getCode();
                        echo 'Linea de error: ' . $ePDO->getLine();
                    }
                } else {
                    //si hay algún error se vuelve a mostrar el formulario
                    ?>
                    <section>
                        <h2>Rellena el formulario.</h2>
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

                            <label for="T02_DescDepartamento">Descripción del departamento: </label>
                            <a style='color:red'><?php echo $aErrores['T02_DescDepartamento'] ?></a><br>
                            <input name="T02_DescDepartamento" id="T02_DescDepartamento" type="text" value='<?php echo(empty($aErrores['T02_DescDepartamento'])) ? ($_REQUEST['T02_DescDepartamento'] ?? '') : ''; ?>'><br>
                            <br>

                            <button type="submit" name="enviar">Enviar</button>
                            <a class="boton" href="../indexProyectoTema4.php">Cancelar</a>

                        </form>
                    </section>
    <?php
    try {
        // Iniciamos el objeto PDO con los valores de las constantes.
        $miDB = new PDO(DSN, USERNAME, PASSWORD);

        // Seleccionamos todas las columnas de la tabla T02_Departamento.
        $resultado = $miDB->query("SELECT * FROM T02_Departamento");
        echo '<table>';
        echo '<tr class="titulo">';
        echo '<td>T02_CodDepartamento</td>';
        echo '<td>T02_DescDepartamento</td>';
        echo '<td>T02_FechaCreaciónDepartamento</td>';
        echo '<td>T02_FechaBajaDeparamento</td>';
        echo '<td>T02_VolumenDeNegocio</td>';
        echo '</tr>';

        while ($aFila = $resultado->fetch()) {
            echo '<tr>';
            echo '<td>' . $aFila['T02_CodDepartamento'] . '</td>';
            echo '<td>' . $aFila['T02_DescDepartamento'] . '</td>';
            echo '<td>' . (new DateTime($aFila['T02_FechaCreacionDepartamento']))->format("d-m-Y") . '</td>';
            if (empty($aFila['T02_FechaBajaDepartamento'])) {
                echo '<td>Activo</td>';
            } else {
                echo '<td>' . $aFila['T02_FechaBajaDepartamento'] . '</td>';
            }
            echo '<td>' . $aFila['T02_VolumenDeNegocio'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } catch (PDOException $ePDO) {
        echo 'Error al conectarse: ' . $ePDO->getMessage();
        echo 'Codigo de error: ' . $ePDO->getCode();
        echo 'Linea de error: ' . $ePDO->getLine();
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
                <time datetime="2025-11-13">13-11-2025</time>
            </div>
        </footer>
    </body>
</html>
