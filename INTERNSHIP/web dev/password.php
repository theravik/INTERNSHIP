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

$var = $_POST['var'];
$_SESSION['varpass'] = $var;

$sql_check = "SELECT mem_id, username, email FROM info where username = '$var' || mem_id = '$var' || email = '$var'";
$result = $con->query($sql_check);
if ($result->num_rows > 0) {
    header('location: newpass.html');
}

else {
echo "INVALID CREDENTIALS...<br>";
}
?>