<!-- <?php
session_start();

if (isset($_SESSION["id"])) {

    $user_id = $_SESSION["id"];

    include("../connections.php");

    $get_record = mysqli_query($connections, "SELECT * FROM mytbl WHERE id= '$user_id'");
    $row_edit = mysqli_fetch_array($get_record);

    if ($row_edit) {
        $db_fName = htmlspecialchars($row_edit["fName"]);
        $db_mName = htmlspecialchars($row_edit["mName"]);
        $db_lName = htmlspecialchars($row_edit["lName"]);
        $db_section = htmlspecialchars($row_edit["section"]);
        $db_address = htmlspecialchars($row_edit["address"]);
        $db_email = htmlspecialchars($row_edit["email"]);
        $db_contact = htmlspecialchars($row_edit["contact"]);
        $db_password = htmlspecialchars($row_edit["password"]);
        $db_account_type = htmlspecialchars($row_edit["account_type"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        .user-info {
            margin-bottom: 20px;
        }
        .user-info p {
            margin: 5px 0;
        }
        .logout-link {
            display: inline-block;
            padding: 10px 15px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
        .logout-link:hover {
            background-color: #0056b3;
        }
        .login-link {
            color: #007bff;
            text-decoration: none;
        }
        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo "$db_fName $db_mName $db_lName"; ?>!</h1>
        <div class="user-info">
            <p><strong>Section:</strong> <?php echo $db_section; ?></p>
            <p><strong>Address:</strong> <?php echo $db_address; ?></p>
            <p><strong>Email:</strong> <?php echo $db_email; ?></p>
            <p><strong>Contact:</strong> <?php echo $db_contact; ?></p>
            <p><strong>Account Type:</strong> <?php echo $db_account_type; ?></p>
        </div>
        <a href="logout.php" class="logout-link">Logout</a>
    </div>
<?php
} else {
?>
    <div class="container">
        <h1>Access Denied</h1>
        <p>You must log in first!</p>
        <a href="../login.php" class="login-link">Login now!</a>
    </div>
<?php
}
?>
</body>
</html> -->