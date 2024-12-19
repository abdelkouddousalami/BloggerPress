<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'author') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="sign.css">
</head>
<body>
    <video autoplay muted loop id="background-video">
        <source src="images/20422317-hd_1920_1080_25fps.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <nav>
        <div class="logo">
            <img src="images/bloglogo-removebg-preview_1.jpg" alt="">
        </div>
        <ul class="nav-links">
            <a href="index.php"><li>Home</li></a>
            <li>About</li>
            <li>Contact</li>
        </ul>
        <div class="login">
            Author Area
        </div>
    </nav>
    
    <main>
        <div class="imglog">
            <h1>Explore the Future with Us : <br> Your Journey Begins Here!</h1>
        </div>
        <div class="container" id="auth-container">
            <h1 id="form-title">Sign In</h1>
            <form id="auth-form" action="connect.php" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" name="password" required>
                </div>
                <button type="submit" class="btn">Sign In</button>
            </form>
            <div class="toggle">
                <p>Don't have an account? <a id="toggle-link" onclick="toggleForm()">Sign Up</a></p>
            </div>
        </div>


    </main>
    <script src="sign.js"></script>
</body>
</html>