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
$demo_mode = $_POST['demo_mode'];
$addres = $_POST['addres'];
$pincode = $_POST['pincode'];


$sql1="INSERT INTO `demo`(`prod_name`, `demo_mode`, `mem_id`, `addres`, `pincode`) VALUES ('$prod_name','$demo_mode', '$mem_id', '$addres', '$pincode')";
$result = mysqli_query($con, $sql1);


if($result){

    echo "<br> DEMO REQUEST REGISTERED SUCCESSFULLY...";
    $sql2="update demo set demo_id = CONCAT('DM', DATE_FORMAT(curdate(), '%d%m%Y'), '/', LPAD(sl, 4, '0'))";
    $result = mysqli_query($con, $sql2);

    header('refresh: 3; url=custconnect.php');

    }


else{
    echo "ERROR...DEMO REQUEST DOESN'T REGISTERED";
}


?>