<?php

    $miDB = new mysqli("10.199.11.190", "adminsql", "paso", "DBALPDWESProyectoTema4");
    $error = $miDB->connect_errno;
    
    $miDB->close();
?>