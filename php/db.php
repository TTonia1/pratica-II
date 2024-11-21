<?php
$servername ="localhost";
$username = "root";
$password = "root";
$db_name = "pratica2";

$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn -> connect_error){
    die("Erro".$conn -> connect_error);
}
?>