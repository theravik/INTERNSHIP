<?php
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


$sql1="INSERT INTO `demo`(`prod_name`, `demo_mode`, `addres`, `pincode`) VALUES ('$prod_name','$demo_mode','$addres', '$pincode')";
$result = mysqli_query($con, $sql1);


if($result){
    echo "DEMO REQUEST REGISTERED SUCCESSFULLY...";
    }

else{
    echo "ERROR...DEMO REQUEST DOESN'T REGISTERED";
}

$sql2="update demo set demo_id = CONCAT('DM', DATE_FORMAT(curdate(), '%d%m%Y'), '/', LPAD(sl, 4, '0'))";
$result = mysqli_query($con, $sql2);

?>