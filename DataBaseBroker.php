<?php
$host = "localhost";
$db = "volontiranje";
$user = "root";
$pass = "";

$conn = new mysqli($host,$user,$pass,$db);


if ($conn->connect_errno){
    exit("Niste se povezali sa bazom: greska> ".$conn->connect_error.", err kod>".$conn->connect_errno);
}

?>