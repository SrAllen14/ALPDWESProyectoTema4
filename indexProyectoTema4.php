<html lang="es"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Indice general de la asignatura">
    <meta name="author" content="Álvaro Allén Perlines">
    <meta name="keywords" content="indice, daw1, edd">
    <meta name="generator" content="visual studio code">
    <title>Álvaro Allén Perlines</title>
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
        
        div.tabla1{
            margin:10px auto 10px auto;
            padding: 10px;
            width: 500px;
            
            border-radius: 20px;
            background-color: white; 
        }
        
        table.bd{
            width: 400px;
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
        }
        
        div.tabla2{
            margin:10px auto 10px auto;
            padding: 10px;
            width: 1000px;
            
            border-radius: 20px;
            background-color: white; 
        }
        
        table.ejer{
            width: 900px;
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            
        }
        
        img{
            width: 50px;
            height: 50px;
        }
        
        
        .principal{
            font-weight: bold;
            text-align: center;
        }
        
        
        
        td{
            height: auto;
            width: auto;
            border: 1px solid gray;
        }
        
        .imagen{
            height: 50px;
            width: 50px;
        }
        
        .ejer td:nth-of-type(1){
            width: 50px;
            text-align: center;
        }
        
        footer{
            margin: auto;
            background-color: #456d96;
            text-align: center;
            align-content: center;
            height: 10%;
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
        <h2>Técnicas de acceso a datos en PHP</h2>
        <h2>Álvaro Allén Perlines</h2>
    </nav>
    <main>
        <div class="tabla1">
            <table class="bd">
                <tr class="principal">
                    <td>Archivo</td>
                    <td>ED Script</td>
                    <td colspan="2">EE Script</td>
                </tr>
                <tr>
                    <td>Script creación de base de datos y usuario</td>
                    <td class="imagen"><a href="mostrarcodigo/script1.php"><img src="webroot/images/code.png"></a></td>
                    <td class="imagen"></td>
                    <td class="imagen"></td>
                </tr>
                <tr>
                    <td>Script carga inicial de base de datos</td>
                    <td class="imagen"><a href="mostrarcodigo/script2.php"><img src="webroot/images/code.png"></a></td>
                    <td class="imagen"></td>
                    <td class="imagen"></td>
                </tr>
                <tr>
                    <td>Script borrado de base de datos y usuario</td>
                    <td class="imagen"><a href="mostrarcodigo/script3.php"><img src="webroot/images/code.png"></a></td>
                    <td class="imagen"></td>
                    <td class="imagen"></td>
                </tr>
            </table>
        </div>
        <div class="tabla2">
            <table class="ejer">
                <tbody>
                    <tr class="principal">
                        <td>Nº</td>
                        <td>Enunciado</td>
                        <td colspan="2">PDO</td>
                        <td colspan="2">MySQLi</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Conexión a la base de datos con la cuenta usuario y tratamiento de errores.</td>
                        <td class="imagen"><a href="codigoPHP/ejercicio0pdo.php"><img src="webroot/images/play.png" alt="play.png"></a></td>
                        <td class="imagen"><a href="mostrarcodigo/codigo0.php"><img src="webroot/images/code.png" alt="code.png"></a></td>
                        <td class="imagen"><a href=""></a></td>
                        <td class="imagen"><a href=""></a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Mostrar el contenido de la tabla Departamento y el número de registros.</td>
                        <td class="imagen"><a href="codigoPHP/ejercicio2pdo.php"><img src="webroot/images/play.png" alt="play.png"></a></td>
                        <td class="imagen"><a href="mostrarcodigo/codigo2.php"><img src="webroot/images/code.png" alt="code.png"></a></td>
                        <td class="imagen"><a href=""></a></td>
                        <td class="imagen"><a href=""></a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores.</td>
                        <td class="imagen"><a href="codigoPHP/ejercicio3pdo.php"><img src="webroot/images/play.png" alt="play.png"></a></td>
                        <td class="imagen"><a href="mostrarcodigo/codigo3.php"><img src="webroot/images/code.png" alt="code.png"></a></td>
                        <td class="imagen"><a href=""></a></td>
                        <td class="imagen"><a href=""></a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Formulario de búsqueda de departamentos por descripción (por una parte del campo DescDepartamento, si el usuario no poone nada deben aparecer todos los departamentos.</td>
                        <td class="imagen"><a href="codigoPHP/ejercicio4pdo.php"><img src="webroot/images/play.png" alt="play.png"></a></td>
                        <td class="imagen"><a href="mostrarcodigo/codigo4.php"><img src="webroot/images/code.png" alt="code.png"></a></td>
                        <td class="imagen"><a href=""></a></td>
                        <td class="imagen"><a href=""></a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Página web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones insert y una transacción.</td>
                        <td class="imagen"><a href="codigoPHP/ejercicio5pdo.php"><img src="webroot/images/play.png" alt="play.png"></a></td>
                        <td class="imagen"><a href="mostrarcodigo/codigo5.php"><img src="webroot/images/code.png" alt="code.png"></a></td>
                        <td class="imagen"><a href=""></a></td>
                        <td class="imagen"><a href=""></a></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Página web que cargue registros en al tabla Departamento desde un array departamentosnuevos utilizando una consulta preparada.</td>
                        <td class="imagen"><a href="codigoPHP/ejercicio6pdo.php"><img src="webroot/images/play.png" alt="play.png"></a></td>
                        <td class="imagen"><a href="mostrarcodigo/codigo6.php"><img src="webroot/images/code.png" alt="code.png"></a></td>
                        <td class="imagen"><a href=""></a></td>
                        <td class="imagen"><a href=""></a></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Página web que toma datos de un fichero .xml y los importe en el directorio ../tmp/ del servidor.</td>
                        <td class="imagen"><a href="codigoPHP/ejercicio7pdo.php"><img src="webroot/images/play.png" alt="play.png"></a></td>
                        <td class="imagen"><a href="mostrarcodigo/codigo7.php"><img src="webroot/images/code.png" alt="code.png"></a></td>
                        <td class="imagen"><a href=""></a></td>
                        <td class="imagen"><a href=""></a></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Página web que toma datos de la tabla Departamento y los exporte en el directorio ../tmp/departamento.xml del servidor.</td>
                        <td class="imagen"><a href="codigoPHP/ejercicio8pdo.php"><img src="webroot/images/play.png" alt="play.png"></a></td>
                        <td class="imagen"><a href="mostrarcodigo/codigo8.php"><img src="webroot/images/code.png" alt="code.png"></a></td>
                        <td class="imagen"><a href=""></a></td>
                        <td class="imagen"><a href=""></a></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Aplicación resument MtoDeDepartamentoTema4.</td>
                        <td class="imagen"><a href=""></a></td>
                        <td class="imagen"><a href=""></a></td>
                        <td class="imagen"><a href=""></a></td>
                        <td class="imagen"><a href=""></a></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Aplicación resumen MtoDepartamento POO y multicapa.</td>
                        <td class="imagen"><a href=""></a></td>
                        <td class="imagen"><a href=""></a></td>
                        <td class="imagen"><a href=""></a></td>
                        <td class="imagen"><a href=""></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        <div>
            <a href="/index.html">
           Álvaro Allén Perlines
            </a>
            <time datetime="2025-11-15">15-11-2025</time>
        </div>
    </footer>
</body>
</html>