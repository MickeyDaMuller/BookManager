<?php
include('connection.php');
$conn    = Connect();
$passkey = $_GET['passkey'];

$id = $_GET['id'];
//$timezone  = +1; //(GMT -5:00) EST (U.S. & Canada)
//$time_date = gmdate("d-M-Y H:i a", time() + 3600*($timezone+date("I")));


$sql = "UPDATE login_book SET read_book='Read' WHERE com_code='$passkey' and WHERE id = '$id";
//$sql1 = "INSERT into users (modified) VALUES('" . $time_date . "')";
echo $sql;
$result = mysqli_query($conn,$sql) or die(mysqli_error());
//$result1 = mysqli_query($conn,$sql1) or die(mysqli_error());
echo $result;
if($result)
{
echo '<center><div>Your account is now active. You may now <a href="login.php">Log in</a></div></center>';
//echo '<script>alert("Congratulations! Your account is now active. You may now Login.")</script>';
//header('Location: login.php');

}
else
{
echo "Some error occur.";
}
?>