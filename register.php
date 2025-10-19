<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $account_type = $_POST['account_type'];
    
    try {
        $stmt = $conn->prepare("INSERT INTO users (username, password, account_type) VALUES (:username, :password, :account_type)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':account_type', $account_type);
        
        if ($stmt->execute()) {
            header("Location: index.html"); 
            exit();
        }
    } catch(PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>State Bank of India - Registration</title>
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
                <li>SBIMOPS</li>
                <li>SB Collect</li>
                <li>Electoral Bond</li>
                <li>Videos</li>
                <li>mCash</li>
            </ul>
        </div>
        <div class="info">
            <center>
                <p class="info_first">New User Registration</p>
                <p class="info_second">Please fill in the details below to create your SBI account.</p>
            </center>
        </div>
        <div class="card">
            <div class="personal" style="width: 60%; margin: 0 auto;">
                <center>
                    <img src="images/user.png" alt="user" width="80px" height="80px" />
                    <p class="p_text"><span style="color:#1a75cf;">REGISTER</span> NOW</p>
                    <form method="POST" action="register.php" style="width: 100%;">
                        <input type="text" name="username" placeholder="Username" required style="width: 80%; padding: 10px; margin: 10px 0; border: 1px solid gray;">
                        <input type="password" name="password" placeholder="Password" required style="width: 80%; padding: 10px; margin: 10px 0; border: 1px solid gray;">
                        <select name="account_type" style="width: 80%; padding: 10px; margin: 10px 0; border: 1px solid gray;">
                            <option value="personal">Personal Banking</option>
                            <option value="corporate">Corporate Banking</option>
                        </select>
                        <button type="submit" class="login">Register >></button>
                    </form>
                    <?php if(isset($error)) echo "<p style='color:red; margin-top: 10px;'>$error</p>"; ?>
                    <p style="margin-top: 20px;"><a href="index.html" style="color: #1a75cf; text-decoration: none;">Back to Login</a></p>
                </center>
            </div>
        </div>
        <div class="news">
            <marquee>Call us toll-free on 1800 1234 and 1800 2100 for SBI Contact Centre services | SBI never asks for your Card/PIN/OTP/CVV details.</marquee>
        </div>
        <div class="slider"></div>
        <div class="footer">
            <p>© 2025 State Bank of India. All rights reserved.</p>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>