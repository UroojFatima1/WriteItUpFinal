<?php
include_once "config.php";
session_start();
$s_username=$_SESSION["si_username"];
$user=mysqli_query($conn,"SELECT username,status from users where username='$s_username'");
    if(mysqli_num_rows($user)>0){
        $status = "Offline now";
        $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE username='$s_username'");
        session_destroy();
        echo "<script>window.open('index.html','_self')</script>";}
?>