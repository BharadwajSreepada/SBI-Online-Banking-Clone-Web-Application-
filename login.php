<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    try {
        // Check for personal banking login
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND account_type = 'personal'");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['account_type'] = 'personal';
            header("Location: personal_dashboard.php");
            exit();
        }
        
        // Check for corporate banking login
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND account_type = 'corporate'");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['account_type'] = 'corporate';
            header("Location: corporate_dashboard.php");
            exit();
        }
        
        $error = "Invalid username or password";
        
    } catch(PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>State Bank of India - Login</title>
    <link rel="icon" href="images/icon.png"> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="parent">
        <div class="header">
            <logo class="logo1"><img src="images/icon.png" height="50px" width="80px" alt="logo"></logo>
            <logo class="logo2"><img src="images/icon.png" height="50px" width="80px" alt="logo"></logo>
        </div>
        <div class="menu">
            <ul class="items-list">
                <li><a href="index.html" style="color: white; text-decoration: none;">Home</a></li>
                <li>Services</li>
                <li>Mobile Banking</li>
                <li>FAQ</li>
                <li>Corporate Website</li>
            </ul>
        </div>
        <div class="info">
            <center>
                <p class="info_first">Login Error</p>
                <p class="info_second">Please check your credentials and try again.</p>
            </center>
        </div>
        <div class="card">
            <div class="personal" style="width: 60%; margin: 0 auto;">
                <center>
                    <img src="images/user.png" alt="user" width="80px" height="80px" />
                    <p class="p_text"><span style="color:#1a75cf;">LOGIN</span> ERROR</p>
                    <?php if(isset($error)) echo "<p style='color:red; margin-top: 10px;'>$error</p>"; ?>
                    <p style="margin-top: 20px;"><a href="index.html" style="color: #1a75cf; text-decoration: none;">Back to Login</a></p>
                </center>
            </div>
        </div>
        <div class="news">
            <marquee>Call us toll-free on 1800 1234 and 1800 2100 for SBI Contact Centre services.</marquee>
        </div>
        <div class="slider"></div>
        <div class="footer">
            <p>© 2025 State Bank of India. All rights reserved.</p>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>