<?php
require ("includes/common.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $myusername = mysqli_real_escape_string($con,$_POST['lemail']);
    $mypassword = mysqli_real_escape_string($con,$_POST['lpassword']); 
    
    $sql = "SELECT id,email_id,password FROM users WHERE email_id = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    
    $count = mysqli_num_rows($result);
    
      
    if($count == 1) {
        $_SESSION['email'] = $row['email_id'];
        $_SESSION['user_id'] = $row['id'];
       
       header("location: products.php");
    }else {
       $error = "Your Login Name or Password is invalid";
    }
 }
?>