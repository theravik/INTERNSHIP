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

$regtype= $_POST['regtype'];
$username1 = $_POST['username'];
$pass = $_POST['pass'];


$sql_check = "SELECT mem_id, username, regtype, passkey FROM info where username = '$username1' && regtype = '$regtype'";
$result = $con->query($sql_check);

if ($result->num_rows > 0) {
    while($row = mysqli_fetch_assoc($result)){
        if(password_verify($pass, $row['passkey'])){
            $_SESSION['user_name'] = $username1;
            $_SESSION['reg_type'] = $regtype;
            $mem = $row['mem_id'];
            $_SESSION['mem'] = $mem;
            if($_SESSION['reg_type'] == 'ADMIN'){
            header('location:connect.php');
            }
            else if($_SESSION['reg_type'] == 'TECHNICIAN'){
                header('location:techconnect.php');
                }
            else{
                header('location:custconnect.php');
            }


    }
}
} else {
echo "LOGIN FAILED...<br>";
echo "PLEASE CHECK YOUR CREDENTIALS OR REGISTER YOURSELF";
header('refresh: 2; url=login.html');
}
?>