<?php
$product = $_POST['product'];
$demo = $_POST['demo'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$mobileno = $_POST['mobileno'];
$adress = $_POST['adress'];
$email = $_POST['email'];
$pincode = $_POST['pincode'];

$conn = new mysqli('localhost', 'root', '', 'service');
if ($conn->connect_error){
    die('connection failed : ' .$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into demo(product, demo, fname, mname, lname, mobileno, adress, email, pincode) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssissi", $product, $demo, $fname, $mname, $lname, $mobileno, $adress, $email, $pincode);
    $stmt->execute();
    echo"REGISTRED SUCCESSFULLY...";
    $stmt->close();
    $conn->close();
}
?>