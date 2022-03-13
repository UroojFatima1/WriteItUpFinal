<?php
 session_start();
    include_once "../../../config.php";
    $outgoing_id = $_SESSION['si_username'];
    $searchTerm=mysqli_real_escape_string($conn,$_POST['searchTerm']);
    $output="";
    $sql=mysqli_query($conn,"SELECT * FROM users WHERE NOT username='$outgoing_id' AND username LIKE '%{$searchTerm}%'");
    if (mysqli_num_rows($sql)>0){
        include_once "data.php";
    }else{
         $output .="No user found";
    }
    echo ($output);

?>