<?php
include_once '../../config.php';
session_start();

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="favicon.png"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>   <!---To add icons-->
    <link rel="stylesheet" href="write.css">   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">   <!---Fonts-->
    <link rel="shortcut icon" href="../../favicon.png" type="image/x-icon" />
    <title>WriteItUp</title>
</head>
<body>
<nav class="topnav">
        <li><a class="logonav" href="../index.html">WriteItUp</a></li>
        <div class="search">
            <div class="search-box">
                <input type="text" placeholder="Browse" name="search" id="search" autocomplete="off">
                <i class="fa fa-search" id="search-icon"></i>
            </div>
            <div class="result" id="result"></div>
        </div>
        <ul class="nav" id="navi">
            <li><a class="navbtn search-r"><i class="fa fa-search"></i></a>
            <li>
            <li><a href="../../reader/reader.php" class="navbtn"><span class="text">Read</span> <i class="fas fa-book-open"></i></a></li>
            <li><a href="../../index.html" class="navbtn"><span class="text">Home</span> <i class="fas fa-home"></i></a></li>
            <li class="menu-area">
                <img src="../../signin-signup/user-dps/<?php echo $_SESSION["dp"]; ?>" alt="dp" class="dp">
                <div class="menu">
                    <a href="../../signin-signup/chat/chat.php">Inbox</a>
                    <a href="../../index.html#footer">Help</a>
                    <a href="../../logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <body>
    <div class="spikes">
        <h2 class="heading"><?php echo $_SESSION["titlename"];?></h2>
    </div>
    <?php $session_value=(isset($_SESSION['si_username']))?$_SESSION['si_username']:''; ?>
    <?php $session_value1=(isset($_SESSION['titlename']))?$_SESSION['titlename']:''; ?>
        <div class="container">
            
            <label for="chap" class="chapter">Chapter No</label>
            <div class="chapter" ><input type="number" required name="chapterNumber" id="chapterNumber" autocomplete="off" placeholder="Choose number"></div>
            <hr>
            <div class="story-container">
            <textarea name="text" spellcheck="true" placeholder="Write your story here" class="story"  id="text" autocomplete="off"></textarea></div>
            <input type="hidden" name="id" id="id" /> 
            <div id="autosave"></div>   
        </div>
        <div class="buttons"><button class="btn" name="next" id="next" >Next Chapter</button>
            <button class="btn" name="Completed" id="Completed" >Story Completed</button></div>
    <footer><div class="footer-logo">
            <div class="footer-logo">WriteItUp</div>
            <p>&copy; CopyRight 2021</p>
        </div>
        <div class="write">
            <a href="../Writer/writer.html" class="footer-link">
                <p>Want to write your <br>own story? <i class="fas fa-edit"></i></p>
            </a>
        </div>
        <div class="footer-links">
            <ul class="nav footer-nav">
                <li><a href="../index.html" class="navbtn">Home</a></li>
                <li><a href="../index.html#features" class="navbtn">Features</a></li>
                <li><a href="../index.html#scroll" class="navbtn">About</a></li>
                <li><a href="../index.html#footer" class="navbtn">Contact</a></li>
            </ul>
            <ul class="footer-icons">
                <a href="mailto:someone@example.com" target="_blank"><i class="fas fa-envelope f"></i></a>
                <a href="https://www.facebook.com/writeitup" target="_blank"><i class="fab fa-facebook-f f"></i></a>
                <a href="https://www.instagram.com/writeitup" target="_blank"><i class="fab fa-instagram f"></i></a>
            </ul>
        </div>
    </footer>  
</body>
</html>

<script>  

 $(document).ready(function(){  var btn = document.getElementById('next');
    btn.addEventListener('click', function() {
    location.href = "nextchapter.php";
    });
    var btn = document.getElementById('Completed');
    btn.addEventListener('click', function() {
    location.href = "completed.php";
    })
     function autosave()  
      {    var authorUsername='<?php echo $session_value;?>';
            var title='<?php echo $session_value1;?>';
           var chapterNumber = $('#chapterNumber').val();  
           var text = $('#text').val();  
           var id = $('#id').val();  
           if(text != '' && chapterNumber != '')  
           {  
                $.ajax({  
                     url:"writeback.php",  
                     method:"POST",  
                     data:{chap:chapterNumber, story:text, Id:id,username:authorUsername,titl:title},  
                     dataType: "json",  
                     success:function(data)  
                     {  
                          if(data != '')  
                          {  
                               $('#id').val(data);  
                          }  
                          $('#autosave').text("Post save as draft");
                           
                         
                     }  
                });  
           }            
      }  
      setInterval(function(){   
           autosave();   
           }, 5000);  
 });  
 </script>