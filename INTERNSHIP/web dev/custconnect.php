<?php
session_start();
echo "WELCOME " .$_SESSION['user_name'];
echo "<br> <b>MEMBER ID :</b> ".$_SESSION['mem'];
$mem_id = $_SESSION['mem'];
if($_SESSION['user_name'] == false){
    header('location:login.html');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
    <div class="cont">
    <button><a href="servicereq.html">SERVICE</button>
    <button><a href="install.html">INSTALL</button>
    <button><a href="reinstall.html">RE-INSTALL</button>
    <button><a href="demo.html">DEMO</button>
    <button><a href="logout.php">LOGOUT</button>
    
</div>


    

    <fieldset>
    <h2 align ="center">INFORMATION</h2>
    <center>
        <table border="1">
        <tr>
            <th width="10%">NAME</th>
            <th width="10%">EMAIL</th>
            <th width="10%">MOBILE NUMBER</th>
            <th width="10%">REGISTERED AS</th>
            <th width="10%">GENDER</th>
        </tr>
        
<?php

$server="localhost";
$username="root";
$password="Aditya@2001";
$dbname="company";

$con = mysqli_connect($server, $username, $password, $dbname);
if(!$con){
    echo"not connected";
}

$sql = "select name, email, mobileno, regtype, gender from info where mem_id = '$mem_id'";
$result = $con -> query($sql);

if($result -> num_rows > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
        <td>".$row['name']."</td>
        <td>".$row['email']."</td>
        <td>".$row['mobileno']."</td>
        <td>".$row['regtype']."</td>
        <td>".$row['gender']."</td>
        </tr>";
      }
}
else{
    echo '<b><font color="maroon">THE INFORMATION DATABASE IS EMPTY...!!</font></b>';
}
?>
    </table> 
</center>
</fieldset>
</body>
</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
   <br>
   <br>

    <fieldset>
    <h2 align ="center">SERVICE</h2>
    <center>
        <table border="1">
        <tr>

            <th width="10%">SERVICE ID</th>
            <th width="10%">PRODUCT NAME</th>
            <th width="10%">PRODUCT CONDITION</th>
            <th width="10%">DESCRIPTION</th>
            <th width="10%">ADDRESS</th>
            <th width="10%">PINCODE</th>
        </tr>
        
<?php

$server="localhost";
$username="root";
$password="Aditya@2001";
$dbname="company";

$con = mysqli_connect($server, $username, $password, $dbname);
if(!$con){
    echo"not connected";
}

$sql = "select serv_id, prod_name, prod_cond, descript, addres, pincode from serv where mem_id =  '$mem_id'";
$result = $con -> query($sql);

if($result -> num_rows > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
        <td>".$row['serv_id']."</td>
        <td>".$row['prod_name']."</td>
        <td>".$row['prod_cond']."</td>
        <td>".$row['descript']."</td>
        <td>".$row['addres']."</td>
        <td>".$row['pincode']."</td>
        </tr>";
      }
}
else{
    echo '<b><font color="maroon">THE SERVICE DATABASE IS EMPTY...!!</font></b>';
}
?>
    </table> 
</center>
</fieldset>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
   <br>
   <br>

    <fieldset>
    <h2 align ="center">INSTALLATION</h2>
    <center>
        <table border="1">
        <tr>

            <th width="10%">INSTALLATION ID</th>
            <th width="10%">PRODUCT NAME</th>
            <th width="10%">ADDRESS</th>
            <th width="10%">PINCODE</th>
        </tr>
        
<?php

$server="localhost";
$username="root";
$password="Aditya@2001";
$dbname="company";

$con = mysqli_connect($server, $username, $password, $dbname);
if(!$con){
    echo"not connected";
}

$sql = "select install_id, prod_name, addres, pincode from install where mem_id =  '$mem_id'";
$result = $con -> query($sql);

if($result -> num_rows > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
        <td>".$row['install_id']."</td>
        <td>".$row['prod_name']."</td>
        <td>".$row['addres']."</td>
        <td>".$row['pincode']."</td>
        </tr>";
      }
}
else{
    echo '<b><font color="maroon">THE INSTALLATION DATABASE IS EMPTY...!!</font></b>';
}
?>
    </table> 
</center>
</fieldset>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
   <br>
   <br>

    <fieldset>
    <h2 align ="center">RE-INSTALLATION</h2>
    <center>
        <table border="1">
        <tr>

            <th width="10%">RE-INSTALLATION ID</th>
            <th width="10%">PRODUCT NAME</th>
            <th width="10%">OLD ADDRESS</th>
            <th width="10%">NEW ADDRESS</th>
        </tr>
        
<?php

$server="localhost";
$username="root";
$password="Aditya@2001";
$dbname="company";

$con = mysqli_connect($server, $username, $password, $dbname);
if(!$con){
    echo"not connected";
}

$sql = "select reinstall_id, prod_name, old_addres, new_addres from reinstall where  mem_id =  '$mem_id'";
$result = $con -> query($sql);

if($result -> num_rows > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
        <td>".$row['reinstall_id']."</td>
        <td>".$row['prod_name']."</td>
        <td>".$row['old_addres']."</td>
        <td>".$row['new_addres']."</td>
        </tr>";
      }
}
else{
    echo '<b><font color="maroon">THE RE-INSTALLATION DATABASE IS EMPTY...!!</font></b>';
}
?>
    </table> 
</center>
</fieldset>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
   <br>
   <br>

    <fieldset>
    <h2 align ="center">DEMONSTRATION</h2>
    <center>
        <table border="1">
        <tr>

            <th width="10%">DEMO ID</th>
            <th width="10%">PRODUCT NAME</th>
            <th width="10%">DEMO MODE</th>
            <th width="10%">ADDRESS</th>
            <th width="10%">PINCODE</th>
        </tr>
        
<?php

$server="localhost";
$username="root";
$password="Aditya@2001";
$dbname="company";

$con = mysqli_connect($server, $username, $password, $dbname);
if(!$con){
    echo"not connected";
}

$sql = "select demo_id, prod_name, demo_mode, addres, pincode from demo where  mem_id =  '$mem_id'";
$result = $con -> query($sql);

if($result -> num_rows > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
        <td>".$row['demo_id']."</td>
        <td>".$row['prod_name']."</td>
        <td>".$row['demo_mode']."</td>
        <td>".$row['addres']."</td>
        <td>".$row['pincode']."</td>
        </tr>";
      }
}
else{
    echo '<b><font color="maroon">THE DEMONSTRATION DATABASE IS EMPTY...!!</font></b>';
}
?>
    </table> 
</center>
</fieldset>
</body>
</html>