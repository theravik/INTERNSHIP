<?php

$server="localhost";
$username="root";
$password="Aditya@2001";
$dbname="company";

$con = mysqli_connect($server, $username, $password, $dbname);
if(!$con){
    echo"not connected";
}

$name = $_POST['name'];
$email = $_POST['email'];
$mobileno = $_POST['mobileno'];
$gender = $_POST['gender'];
$regtype= $_POST['regtype'];
$username1 = $_POST['username'];
$pass = $_POST['pass'];
$hashed_password = password_hash($pass, PASSWORD_BCRYPT);

$sql_check = "SELECT email FROM info where email = '$email'";
$result = $con->query($sql_check);

if($result->num_rows > 0) {
    echo "Error: You are alredy registered please login uisng your credentials";
} 
else {

$sql_check1 = "SELECT username FROM info where username = '$username1'";
$result = $con->query($sql_check1);

if ($result->num_rows > 0) {
        echo "username already exists...please select another username";
    }

else{

$sql="INSERT INTO `info`(`name`, `email`, `mobileno`, `gender`, `regtype`, `username`, `passkey`) VALUES ('$name','$email','$mobileno', '$gender', '$regtype', '$username1', '$hashed_password')";
$result = mysqli_query($con, $sql);


if($result){
    $sql1="update info set mem_id = CONCAT('MEM', '/', DATE_FORMAT(curdate(), '%d%Y'), '/', LPAD(sl, 4, '0')) where email = '$email'";
    $result = mysqli_query($con, $sql1);
    $sql_check2 = "SELECT mem_id FROM info where email = '$email'";
    $result = $con->query($sql_check2);
    if ($result->num_rows > 0) {
        while($row = mysqli_fetch_assoc($result))
           echo '<b><font color="green">SUCCESSFULLY DATA SUBMITTED.</font></b> <br> YOUR MEMBER ID IS "'.$row['mem_id'].'". PLEASE KEEP IT SAFE FOR FUTURE USE.';
           header('refresh: 10; url=login.html');
    }
}
else{
    echo "ERROR...DATA DOESN'T SUBMITTED";
}

}
}
?>