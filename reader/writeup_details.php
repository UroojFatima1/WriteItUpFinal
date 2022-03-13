<?php
session_start();
include_once "../config.php";
$title=$_GET['title'];
$book_details=mysqli_query($conn,"SELECT * FROM details WHERE title='$title'");
$details=mysqli_fetch_assoc($book_details);
$_SESSION["title"] = $details["title"];
$_SESSION["authorUsername"]=$details["authorUsername"];
$_SESSION["desc"] = $details["description"];
$_SESSION["genre"] = $details["genre"];
$_SESSION["cover"] = $details["coverPage"];
$_SESSION["rating"] =$details["rating"];
$_SESSION["noOfChapters"]=$details["noOfChapters"];
$chapter_details=mysqli_query($conn,"SELECT * FROM story WHERE title='$title'");
$chapter=mysqli_fetch_assoc($chapter_details);
$_SESSION["chapterNumber"] = $chapter["chapterNumber"];
$_SESSION["text"] = $chapter["text"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="favicon.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="writeup_details.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!---Fonts-->
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <title>WriteItUp</title>
</head>

<body>
<nav class="topnav">
        <li><a class="logonav" href="../index.html">WriteItUp</a></li>
        <div class="search-box">
        <input type="search" name="search" id="search" class="search" autocomplete="off" placeholder="Browse">
            <i class="fa fa-search" id="search-icon"></i>
        </div>
        <ul class="nav" id="navi">
            <li><a class="navbtn search-r"><i class="fa fa-search"></i></a>
            <li><a href="../Writer/writer.php" class="navbtn"><span class="text">Write</span> <i class="fad fa-marker"></i></a></li>
            <li><a href="../index.html" class="navbtn"><span class="text">Home</span> <i class="fas fa-home"></i></a></li>
            <li class="menu-area">
                <img src="../signin-signup/user-dps/<?php echo $_SESSION["dp"]; ?>" alt="dp" class="dp">
                <div class="menu">
                    <a href="../signin-signup/chat/chat.php">Inbox</a>
                    <a href="#">Notifications
                    <a href="../index.html#footer">Help</a>
                    <a href="../logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div class="spikes">
        <div id="result"></div>
        <h2 class="heading"><?php echo $_GET["title"]; ?></h2>
    </div>
    <div class="forms-container">
        <div class="rectangle"><img id="output" src="../cover-pages/<?php echo $_SESSION["cover"]; ?>"></div>
        <div class="form">
            <div class="input-field">
                <i class="fa fa-book"></i>
                <input type="text" name="author" class="inp" disabled value="Written By: <?php echo $_SESSION["authorUsername"] ?>">
            </div>
            <div class="input-field">
                <i class="fa fa-edit"></i>
                <textarea ype="text" name="desc" class="inp" rows="8" disabled><?php echo $_SESSION["desc"] ?>
                </textarea>
            </div>
            <div class="input-field">
                <i class="fa fa-server"></i>
                <input type="text" name="genre" class="inp" disabled value="Genre:  <?php echo $_SESSION["genre"] ?>">
            </div>
            <div class="input-field">
                <i class="fa fa-child"></i>
                <input type="text" name="rating" class="inp" disabled value="Rating:  <?php echo $_SESSION["rating"] ?>">
            </div>
            <div class="btncontainer">
                <button class="btn" id="read_button" onclick="window.location.href = 'writeup_story.php';">Start Reading</button>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-logo">
            <div class="footer-logo">WriteItUp</div>
            <p>&copy; CopyRight 2021</p>
        </div>
        <div class="write">
            <a href="../Writer/writer.php" class="footer-link">
                <p>Want to write your <br>own story? <i class="fas fa-edit"></i></p>
            </a>
        </div>
        <div class="footer-links">
            <ul class="nav footer-nav">
                <li><a href="../index.php" class="navbtn">Home</a></li>
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
    <script src="reader.js"></script>
</body>
</html>