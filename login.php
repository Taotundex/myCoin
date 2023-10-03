<?php
    session_start();
    include "connect.php";

    $msg="";
    if(isset($_POST['login'])) {
        $email = $_POST["email"];
        $password = $_POST["password"];


        if(($email && $password) != ""){
            if($email == "mega@gmail.com" && $password == "admin"){
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
                header("location: admin/index.php");
            }
            else{
                $result = mysqli_query($conn, "SELECT * FROM `signup` WHERE `email`='$email' AND `password`='$password'");
                if((mysqli_num_rows($result) > 0)) {
                        $user = mysqli_fetch_assoc($result);
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['password'] = $user['password'];
                        header("location: dashboard.php");
                }
                else{
                    $msg = "Invalid email or password";
                }
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MEGAPROFITSTRADE</title>
    <link rel="stylesheet" href="style.css">
    <!-- <script src="https://kit.fontawesome.com/be0461b2be.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    body{
        height: 100vh;
        background: url(images/loginb.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        color: white;
    }
    ::placeholder{
        font-style: italic;
    }
</style>
<body>
    <div class="myreg">
        <div class="login">
            <div class="logo text-center">
                <img src="images/logo1.png" width="75%" alt="">
                <h2>LOGIN</h2>
            </div>
            <form action="" method="post">
                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" placeholder="Your email" required>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Your password" required>
                <center><small></small></center>
                <button type="submit" name="login">Login</button>
                <small class="right">New user?<a href="signup.php"> Signup </a>here</small>
            </form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>