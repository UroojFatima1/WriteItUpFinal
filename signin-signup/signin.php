<?php
    $servername = "localhost";
    $username = "root";
    $password ="";
    $dbname = "writeitup";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("connection failed:" . $conn->connect_error);
    }
if (isset($_POST["register"])) {
    $username = mysqli_real_escape_string($conn, $_POST["su_username"]);
    $email = mysqli_real_escape_string($conn, $_POST["su_email"]);
    $dob = mysqli_real_escape_string($conn, $_POST["su_dob"]);
    $pass = mysqli_real_escape_string($conn, md5($_POST["su_password"]));
    $dp = mysqli_real_escape_string($conn, $_POST["su_dp"]);

    $check_username = mysqli_num_rows(mysqli_query($conn, "SELECT username from users where username='$username'"));
    $check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email from users where email='$email'"));
    if ($check_email > 0) {
        echo ("<script>alert(\"User already exists. Enter a new email.\")</script>");
    } else if ($check_username > 0) {
        echo ("<script>alert(\"This username already exists. Enter a new one.\")</script>");
    } else {
        if(isset($_FILES['su_dp'])){
            $img_name = $_FILES['su_dp']['name'];//to get name of image
            $img_type = $_FILES['su_dp']['type'];//to get type of image
            $tmp_name = $_FILES['su_dp']['tmp_name']; //used to move image in folder
            //exploding the image ato get extension
            $img_explode = explode('.',$img_name);
            $img_ext = end($img_explode); //to get extension of user file

            $extensions = ["jpeg", "png", "jpg"];//valid extensions
            //if user added image matches the extension
            if(in_array($img_type, $types) === true){
                $new_img_name = $username.$img_name;
                echo($new_img_name);
            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                $status="Active now";
                $insert_q = "INSERT INTO users (username,email,dob,pass,dp,status) VALUES ('$username','$email','$dob','$pass','$new_img_name','$status');";
                $insertion = mysqli_query($conn, $insert_q);
                if ($insertion) {
                    echo ("<script>alert(\"User registered successfully.\")</script>");
                } else {
                    echo ("<script>alert(\"User registration unsuccessful.\")</script>");
                }}
            }
            else{echo("Please select correct image file");};}}}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="signin.css">
    <title>SignIn</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="sign-in-sign-up">
                <form action="" method="post" class="signin-form">
                    <h2 class="form-title">Sign In</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password">
                    </div>
                    <input type="submit" class="btn" value="Login">
                    <p class="social-text">Or Sign in using social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-google"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    </div>
                </form>
                <form action="" method="post" class="signup-form" name="register">
                    <h2 class="form-title">Sign Up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="su_username">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="su_email">
                    </div>
                    <div class="input-field">
                        <i></i>
                        <input type="date" name="su_dob">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="su_password">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-upload"></i>
                        <input type="file" accept=".jpg,.png,.jpeg" name="su_dp">
                    </div>
                    <input type="submit" class="btn" value="Register" name="register">
                    <p class="social-text">Or Sign up using social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-google"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    </div>
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New Here?</h3>
                    <p>Register right now to get access to unlimited stories.</p>
                    <button class="btn transparent" id="sign-up-btn">Sign Up</button>
                </div>
                <img class="image" src="../images/sign-in.svg" alt="">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Already Registered?</h3>
                    <p>Sign back in and continue reading your stories.</p>
                    <button class="btn transparent" id="sign-in-btn">Sign In</button>
                </div>
                <img class="image" src="../images/sign-up.svg" alt="">
            </div>
        </div>
    </div>
</body>
<script src="signin.js"></script>

</html>