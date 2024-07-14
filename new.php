
<?php
session_start();

$server="localhost";
$username="root";
$password="Aditya@2001";
$dbname="company";

$con = mysqli_connect($server, $username, $password, $dbname);
if(!$con){
    echo"not connected";
}

$pass1 = $_POST['pass1'];
$pass = $_POST['pass'];

$var1 = $_SESSION['varpass'];
$hashed_password = password_hash($pass1, PASSWORD_BCRYPT);

if($pass1 == $pass){

$sql = "UPDATE info SET passkey = '$hashed_password' where username = '$var1' || mem_id = '$var1' || email = '$var1'";
$result = mysqli_query($con, $sql);

header('location: login.html');
  }
else{
  echo "PASSWORD DOEN'T MATCH RETRY";
  header('location: newpass.html');
}

?>