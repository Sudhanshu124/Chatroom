<?php
include 'db_connet.php';
//$msgs=$_POST['text'];
//$room=$_POST['room'];
//$ip=$_POST['ip'];
if(isset($_POST['submit'])){
  extract($_POST);
$sql="INSERT INTO msgs (msgs,stime) VALUES ('$usermsg', current_timestamp());";
mysqli_query($conn,$sql);
//mysqli_close($conn);
}
?>

 <?php
 /*
$roomname=$_GET['roomname'];
include 'db_connet.php';
$sql=" SELECT * FROM rooms WHERE roomname='$roomname'";
$result=mysqli_query($conn,$sql);
if($result)
{
    if(mysqli_num_rows($result)==0)
    {
        $message="This room does not  exist try  another name ";
        echo'<script language="javascript";>';
        echo'alert("'.$message.'");';
        echo'window.location="http://localhost/Chatroom";';
        echo'</script>';
    }
}
else
{
    echo "Error:".mysqli_error($conn);
} */
?>
<!DOCTYPE html>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link href="CSS/product.css" rel="stylesheet">
<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.anyClass {
  height:350px;
  overflow-y: scroll;
}
</style>
</head>
<body>



<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Chatty Chat</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="#">Home</a>
    <a class="p-2 text-dark" href="#">About</a>
    <a class="p-2 text-dark" href="#">Contact</a>
    
  </nav> 
</div>
<div class="anyClass">

</div> 

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];  ?>">
  
<input type="text" class="form-control" name="usermsg" id="usermsg" placeholder="Type message"><br>

<button class="btn btn-success" name="submit" id="submitmsg">send</button>

</form>







<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type ="text/javascript">
setInterval(runFunction,1000);
function runFunction()
{
  $.post("htcont.php",{room:'<?php echo $roomname ?>'},
  function(data,status)
  {
    document.getElementsByClassName('anyClass')[0].innerHTML=data;
  }
  )
}
var input = document.getElementById("usermsg");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
    event.preventDefault();
    document.getElementById("submitmsg").click();
  }
});
    var clientmsg=$("#usermsg").val();
    $("#submitmsg").click(function(){ 
  $.post("postmsg.php",{text: clientmsg,room:'<?php echo $roomname?>',ip:'<?php echo $_SERVER['REMOTE_ADDR']?>'},
  function(data ,status){document.getElementsByClassName('anyClass')[0].innerHTML=data;});
  $("#usermsg").val("");
 return false;
});
</body>
</html>
