<?php
session_start();
echo "THANK YOU " .$_SESSION['user_name'];
echo "<br> <b>MEMBER ID :</b> ".$_SESSION['mem'];
$mem_id = $_SESSION['mem'];
echo "<br>";

$server="localhost";
$username="root";
$password="Aditya@2001";
$dbname="company";

$con = mysqli_connect($server, $username, $password, $dbname);
if(!$con){
    echo"not connected";
}

$prod_name = $_POST['prod_name'];
$old_addres = $_POST['old_addres'];
$new_addres = $_POST['new_addres'];


$sql1="INSERT INTO `reinstall`(`prod_name`, `mem_id`, `old_addres`, `new_addres`) VALUES ('$prod_name', '$mem_id', '$old_addres', '$new_addres')";
$result = mysqli_query($con, $sql1);


if($result){
    $sql2="update reinstall set reinstall_id = CONCAT('RI', DATE_FORMAT(curdate(), '%d%m%Y'), '/', LPAD(sl, 4, '0')) where mem_id = '$mem_id'";
$result = mysqli_query($con, $sql2);
    echo "<br> RE-INSTALLATION REQUEST REGISTERED SUCCESSFULLY...";
    header('refresh: 3; url=custconnect.php');
    }

else{
    echo "ERROR...RE-INSTALLATION REQUEST DOESN'T REGISTERED";
}

?>