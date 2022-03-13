
<?php

include_once "../config.php";
session_start();
    if (isset($_POST['upload'])) {$username=$_SESSION['si_username'];
    $title=mysqli_real_escape_string($conn,$_POST["titlename"]);
    $description=mysqli_real_escape_string($conn,$_POST["description"]);
    $genre=mysqli_real_escape_string($conn,$_POST["genre"]);
    $rating=mysqli_real_escape_string($conn,$_POST["Rating"]);
    $dpname= $_FILES['uploadfile']['name']; 
    $dpTmpName = $_FILES['uploadfile']['tmp_name']; //used to move image in folder
    $user=mysqli_query($conn,"SELECT * from users where username='$username'");
    if(mysqli_num_rows($user)>0){
        $query=mysqli_query($conn,"SELECT * from details where title='$title'");
        if(mysqli_num_rows($query)>0){
            echo "<script>alert(\"Title already exists. Try another title.\");</script>";
            echo "<script>window.location.href='writer.php';</script>";
        }
        else{
        $folder="../cover-pages/".$dpname;
        $insert_q = "INSERT INTO details (title, authorUsername, genre, coverPage, description, rating) VALUES ('$title','$username','$genre','$dpname','$description','$rating');";
        $insertion = mysqli_query($conn, $insert_q);
        $select_dp=mysqli_query($conn,"SELECT * FROM details where authorUsername='$username' and title='$title'");
        $row=mysqli_fetch_assoc($select_dp);
        $_SESSION["titlename"]=$row["title"];
        $selection_dp=mysqli_query($conn,$select_dp);
        if (move_uploaded_file($dpTmpName,$folder)) {
            echo $_SESSION['titlename'];
            echo "<script>window.location.href='write/write.php';
            </script>";

        }
    }
}}


?>