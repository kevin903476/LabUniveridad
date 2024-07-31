<?php

    $servidor= "localhost";
    $user= "root";
    $password= "";
    $bd= "universidad";


    $connect= mysqli_connect($servidor,$user,$password,$bd);

    $revision= mysqli_query($connect, "SET NAMES 'utf8' ");

    if(mysqli_connect_errno()){
        echo "Problemas de conexion".mysqli_connect_errno();
    }
?>