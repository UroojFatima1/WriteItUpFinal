<?php
session_start();
include_once "config.php";
$user=$_SESSION['si_username'];
if(!isset($_SESSION['si_username'])){
    header("location: ../signin-signup/signin.html"); //redirect to login if not logged into the app
}

?>

<?php include_once "once.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE username='$user'");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="urooj.jpg" alt="">
          <div class="details">
            <span><?php echo $row['username']?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        </header>
        
        <div class="search">
            <span class="text">Select an user to start chat</span>
            <input type="text" placeholder="Enter name to search..">
            <button><i class="fa fa-search"></i></button>
        </div>
        <div class="users-list">
            <a href="#">
                <div class="content">
                    <img src="ayesha.jpg" alt="">
                    <div class="details">
                        <span>Ayesha</span>
                        <p>This is test message</p>
                    </div>
                </div>
                <div class="status-dot"><i class="fa fa-circle"></i></div>
            </a>
            
        </div>
    </section>
    </div>
    <script src="chat.js"></script>
</body>
</html>