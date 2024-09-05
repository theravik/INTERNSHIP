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
$prod_cond= $_POST['prod_cond'];
$descript = $_POST['descript'];
$addres = $_POST['addres'];
$pincode= $_POST['pincode'];


$sql1="INSERT INTO `serv`(`prod_name`, `prod_cond`, `descript`, `mem_id`, `addres`, `pincode`) VALUES ('$prod_name','$prod_cond','$descript', '$mem_id', '$addres', '$pincode')";
$result = mysqli_query($con, $sql1);


if($result){
$sql2 = "update serv set serv_id = CONCAT('SR', DATE_FORMAT(curdate(), '%d%m%Y'), '/', LPAD(sl, 4, '0')) where mem_id = '$mem_id'";
$result = mysqli_query($con, $sql2);
echo "<br> SERVICE REGISTERED SUCCESSFULLY...";
header('refresh: 3; url=custconnect.php');

}

else{
echo "ERROR...SERVICE DOESN'T REGISTERED";
}

?>