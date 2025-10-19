<?php
// personal_dashboard.php
session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['user_id']) || $_SESSION['account_type'] !== 'personal') {
    header("Location: index.html");
    exit();
}

// Sample user data (in a real system, this would come from the database)
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT username FROM users WHERE id = :id");
$stmt->bindParam(':id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$username = $user['username'];

// Sample account details (you'd typically fetch this from a separate table)
$account_details = [
    'account_number' => '123456789012',
    'account_type' => 'Savings Account',
    'balance' => '₹ 25,000.00',
    'branch' => 'Dwarakanagar Branch, VSKP',
    'ifsc_code' => 'SBIN0001234',
    'last_transaction' => '₹ 500.00 (Debit) on 26-Mar-2025'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>State Bank of India - Personal Banking Dashboard</title>
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
                <li>Account Summary</li>
                <li>Fund Transfer</li>
                <li>Bill Payments</li>
                <li>Statements</li>
                <li>Profile</li>
                <li>Loans</li>
                <li>Investments</li>
                <li>Customer Care</li>
                <li><a href="logout.php" style="color: white; text-decoration: none;">Logout</a></li>
            </ul>
        </div>
        <div class="info">
            <center>
                <p class="info_first">Welcome, <?php echo htmlspecialchars($username); ?>!</p>
                <p class="info_second">SBI never asks for confidential information such as PIN and OTP from customers.</p>
            </center>
        </div>
        <div class="card">
            <div class="personal" style="width: 100%;">
                <center>
                    <h2 style="color: #1a75cf;">Account Details</h2>
                    <table style="width: 80%; margin: 20px auto; border-collapse: collapse; font-size: 14px;">
                        <tr style="background-color: #f0f0f0;">
                            <th style="padding: 10px; border: 1px solid #ccc;">Field</th>
                            <th style="padding: 10px; border: 1px solid #ccc;">Details</th>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ccc;">Account Number</td>
                            <td style="padding: 10px; border: 1px solid #ccc;"><?php echo $account_details['account_number']; ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ccc;">Account Type</td>
                            <td style="padding: 10px; border: 1px solid #ccc;"><?php echo $account_details['account_type']; ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ccc;">Balance</td>
                            <td style="padding: 10px; border: 1px solid #ccc;"><?php echo $account_details['balance']; ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ccc;">Branch</td>
                            <td style="padding: 10px; border: 1px solid #ccc;"><?php echo $account_details['branch']; ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ccc;">IFSC Code</td>
                            <td style="padding: 10px; border: 1px solid #ccc;"><?php echo $account_details['ifsc_code']; ?></td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ccc;">Last Transaction</td>
                            <td style="padding: 10px; border: 1px solid #ccc;"><?php echo $account_details['last_transaction']; ?></td>
                        </tr>
                    </table>
                </center>
            </div>
        </div>
        <div class="news">
            <marquee>Call us toll-free on 1800 1234 and 1800 2100 for SBI Contact Centre services | Last login: <?php echo date('d-M-Y H:i:s'); ?></marquee>
        </div>
        <div class="slider"></div>
        <div class="footer">
            <p>© 2025 State Bank of India. All rights reserved.</p>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>