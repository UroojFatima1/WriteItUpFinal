 
 <?php  
 include_once '../../config.php';
 session_start();
 if(isset($_POST["chap"]) && isset($_POST["story"]))
 {
  $chapterNumber = mysqli_real_escape_string($conn, $_POST["chap"]);
  $text = mysqli_real_escape_string($conn, $_POST["story"]);
  $title = mysqli_real_escape_string($conn, $_POST["titl"]);
  $authorUsername = mysqli_real_escape_string($conn, $_POST["username"]);

  $sql=mysqli_query($conn,"SELECT chapterNumber from story where title = '".$_POST["titl"]."' AND authorUsername = '".$_POST["username"]."'");

  if($_POST["Id"] != '')  
  {  
    //update post  
    $sql = "UPDATE story SET chapterNumber = '".$chapterNumber."', text = '".$text."' WHERE id = '".$_POST["Id"]."' AND title = '".$_POST["titl"]."'"; 
    mysqli_query($conn, $sql);  
  }  
  else  
  {  
    //insert post  
    $sql = "INSERT INTO story (chapterNumber , text,authorUsername,title) VALUES ('".$chapterNumber."', '".$text."', '".$authorUsername."', '".$title."')";  
    mysqli_query($conn, $sql);  
    echo mysqli_insert_id($conn);  
  }
 }  
 ?>
 