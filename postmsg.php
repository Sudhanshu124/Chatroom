<?php
include 'db_connet.php';
$msgs=$_POST['text'];
$room=$_POST['room'];
$ip=$_POST['ip'];
$sql="INSERT INTO 'msgs' ('msgs', 'room', 'ip', 'stime') VALUES ( '$msgs', '$room', '$ip', current_timestamp());";
mysqli_query($conn,$sql);
mysqli_close($conn);
?>