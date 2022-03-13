<?php
session_start();
include_once "../../config.php";
$user=$_SESSION['si_username'];
if(!isset($_SESSION['si_username'])){
    header("location: ../signin-signup/signin.html"); //redirect to login if not logged into the app
}

?>

<?php include_once "once.php"; ?>
<body>
<nav class="topnav">
        <li><a class="logonav" href="../../index.html">WriteItUp</a></li>
        <div class="search-box">
            <input type="search" placeholder="Browse" class="search" id="search" name="search" autocomplete="off">
            <i class="fa fa-search" id="search-icon"></i>
        </div>
        <ul class="nav" id="navi">
            <li><a class="navbtn search-r"><i class="fa fa-search"></i></a>
            <li><a href="../../reader/reader.php" class="navbtn"><span class="text">Read</span> <i class="fas fa-book-open"></i></a></li>
            <li><a href="../../index.html" class="navbtn"><span class="text">Home</span> <i class="fas fa-home"></i></a></li>
            <li class="menu-area">
                <img src="../../signin-signup/user-dps/<?php echo $_SESSION["dp"]; ?>" alt="dp" class="dp">
                <div class="menu">
                    <a href="../../Writer/writer.php">Write</a>
                    <a href="chat.php">Inbox</a>
                    <a href="#footer">Help</a>
                    <a href="../../logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div class="body">
    <div class="wrapper">
        <section class="chat-area">
        <header>
            <?php 
            include_once "../../config.php";
                $user_id=mysqli_real_escape_string($conn,$_GET['user_id']);
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE username='$user_id'");
                if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);}
            ?>
            <a href="chat.php" class="back-icon"><i class="fa fa-arrow-left"></i></a>
            <img src="../user-dps/<?php echo $row['dp']; ?>" alt="">
            <div class="details">
                <span><?php echo ucfirst($row['username'])?></span>
                <p><?php echo $row['status']; ?></p>
             </div>
        </header>
    <div class="chat-box">
        
    </div>
    <form action="#" class="typing-area">
        <input type="text" class="outgoing_id" name="outgoing_id" value="<?php echo $_SESSION['si_username']; ?>" hidden>   
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
    </form>
        
    </section>
    </div>
    </div>
    <footer id="footer">
        <div class="footer-logo">
            <div class="footer-logo">WriteItUp</div>
            <p>&copy; CopyRight 2021</p>
        </div>
        <div class="write">
            <a href="../../Writer/writer.php" class="footer-link">
                <p>Want to write your <br>own story? <i class="fas fa-edit"></i></p>
            </a>
        </div>
        <div class="footer-links">
            <ul class="nav footer-nav">
                <li><a href="../../index.html" class="navbtn">Home</a></li>
                <li><a href="../../index.html#features" class="navbtn">Features</a></li>
                <li><a href="../../index.html#scroll" class="navbtn">About</a></li>
                <li><a href="../../index.html#footer" class="navbtn">Contact</a></li>
            </ul>
            <ul class="footer-icons">
                <a href="mailto:app.writeit@gmail.com" target="_blank"><i class="fas fa-envelope f"></i></a>
                <a href="https://www.facebook.com/writeitup" target="_blank"><i class="fab fa-facebook-f f"></i></a>
                <a href="https://www.instagram.com/writeitup" target="_blank"><i class="fab fa-instagram f"></i></a>
            </ul>
        </div>
    </footer>
    <script src="js/chat-area.js"></script>
</body>
</html>