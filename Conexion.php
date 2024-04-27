<?php

    $host = "localhost";
    $User = "root@localhost";
    $pass = "";
    $db = "iniciosesiondb";

    $conexion = mysqli_connect($host, $User , $pass, $iniciosesiondb);

    if (!$con) {
     echo "Conexion fallida";
    }
