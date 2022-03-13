<?php
include_once '../../config.php';
session_start();
$username=$_SESSION['si_username'];
$title=$_SESSION['titlename'];
$query=mysqli_query($conn,"SELECT * from details where title = '$title'AND authorUsername = '$username'");
if(mysqli_num_rows($query)>0){
    $comp=1;


$sql = mysqli_query($conn, "UPDATE details SET completed = '$comp' where authorUsername='$username' AND title='$title'");
}

?>