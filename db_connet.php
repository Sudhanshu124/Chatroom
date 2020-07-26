<?php
$servername= "localhost";
$username="root";
$pass="";
$database="chattychat";
$conn=mysqli_connect($servername,$username,$pass,$database);
if(!$conn)
{
    die("failed to connect".mysqli_connect_error());
}
?>