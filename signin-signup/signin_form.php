<?php
include '../config.php';
session_start();
if(isset($_POST["login"])){
    $s_username=mysqli_real_escape_string($conn,$_POST["si_username"]);
    $s_password=mysqli_real_escape_string($conn,md5($_POST["si_password"]));
    $user=mysqli_query($conn,"SELECT username,dp from users where username='$s_username' AND pass='$s_password'");
    if(mysqli_num_rows($user)>0){
        $status = "Active now";
        $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE username='$s_username' AND pass='$s_password'");
        $row=mysqli_fetch_assoc($user);
        $_SESSION['si_username']=$row['username'];
        $_SESSION['dp']=$row['dp'];
        echo "<script>window.location.href='../reader/genre.php';</script>";
    }
    else{
        echo "<script>alert(\"Login details are incorrect. Please try again.\");
        window.location.href='signin.html';
        </script>";
    }
}
?>