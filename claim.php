<?php
$room=$_POST['room'];
if(strlen($room)>20 or strlen($room)<2)
{
    $message="Please enter the room name between 2 to 20 char";
    echo'<script language="javascript";>';
    echo'alert("'.$message.'");';
    echo'window.location="http://localhost/Chatroom";';
    echo'</script>';
}
else if(ctype_alnum($room))
{
    $message="Room name should  be alphanumeric";
    echo'<script language="javascript";>';
    echo'alert("'.$message.'");';
    echo'window.location="http://localhost/Chatroom";';
    echo'</script>';
}
else
{
    include 'db_connet.php';
}
$sql=" SELECT * FROM rooms WHERE roomname='$room'";
$result = mysqli_query($conn , $sql);
if($result)
{
    

    if(mysqli_num_rows($result)>0)
    {
        $message="Already exist another name ";
        echo'<script language="javascript";>';
        echo'alert("'.$message.'");';
        echo'window.location="http://localhost/Chatroom";';
        echo'</script>';
    }
    else{
    $sql="INSERT INTO rooms ( roomname, stime) VALUES ( '$room', current_timestamp());";
        if(mysqli_query($conn,$sql))
        {
            $message="Room is ready ";
            echo'<script language="javascript";>';
            echo'alert("'.$message.'");';
            echo'window.location="http://localhost/Chatroom/rooms.php? roomname=' .$room. '";';
            echo'</script>';
        }
    }
}
else
{
    echo "Error".mysqli_error($conn);
}
?>