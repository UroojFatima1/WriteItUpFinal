<?php
include '../config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WriteItUp</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="writeup_details.css" />
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon" />
</head>

<body>
    <nav class="topnav">
        <li><a class="logonav" href="../index.html">WriteItUp</a></li>
        <div class="search-box">
            <input type="search" placeholder="Browse">
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
        <h2 class="heading">Select your favourite genres.</h2>
    </div>
    <div class="container genre-container">
        <?php
        $display_genres = mysqli_query($conn, "SELECT genre_name FROM genre ORDER BY genre_name");
        foreach ($display_genres as $genre) {
        ?>
            <span class="genre" id="<?php echo $genre["genre_name"] ?>" onclick="select(this.id)">
                <?php echo $genre["genre_name"]; ?>
            </span>
        <?php
        }
        ?>
    </div>
    <form action="save_genres.php" method="post">
    <input name="proceed" class="btn proceed" id="proceed" value="Proceed" type="submit">
    </form>
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
    <script>
        var s_genres = [];
        var genre_box = document.querySelector(".genre");
        let select = function(id) {
            var box = document.getElementById(id);
            s_genres.push(id);
            box.classList.add("selected");
            console.log(s_genres);
        };
    </script>
</body>

</html>