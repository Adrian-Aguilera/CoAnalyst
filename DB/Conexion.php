<?php

$servername="localhost";
$username="root";
$password="";
$database="tds11b";

$conn= new mysqli($servername,$username,$password,$database);

if($conn->connect_error){
    die('Conexion Fallida'.$conn->connect_error);
}else{
    echo "<script>alert('Conexion Exitosa')</script>";
}
