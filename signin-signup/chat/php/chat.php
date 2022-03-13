<?php
    session_start();
    $outgoing_id=$_SESSION['si_username'];
    include_once "../../../config.php";
    $sql=mysqli_query($conn,"SELECT * FROM users WHERE NOT username='$outgoing_id'");
    $output="";
    if(mysqli_num_rows($sql)==0){
        $output .="No one avaiable for chat";
    }
    else if(mysqli_num_rows($sql)>0){
        include_once "data.php";
    }
    echo $output; 
?>