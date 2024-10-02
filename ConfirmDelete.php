<?php

$user_id = $_REQUEST["id"];

include("connections.php");

$query_delete = mysqli_query($connections, "SELECT * FROM mytbl WHERE id = '$user_id'");

while ($row_delete = mysqli_fetch_assoc($query_delete)) {
    $user_id = $row_delete["id"];
    $db_name = $row_delete["fName"];
    $db_address = $row_delete["address"];
    $db_email = $row_delete["email"];
    $db_contact = $row_delete["contact"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="confirmation-container">
    <h1>Are you sure you want to delete <?php echo htmlspecialchars($db_name); ?>?</h1>
    
    <form method="POST" action="Delete_Now.php">
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
        <input type="submit" value="Yes">
        <a href='index.php'>No</a>
    </form>
</div>

</body>
</html>


<style>
    /* General body styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Confirmation container */
.confirmation-container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    text-align: center;
}

/* Heading styling */
.confirmation-container h1 {
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
}

/* Form styling */
.confirmation-container form {
    margin: 20px 0;
}

.confirmation-container input[type="submit"] {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.confirmation-container input[type="submit"]:hover {
    background-color: #c82333;
}

.confirmation-container a {
    color: #007bff;
    text-decoration: none;
    font-size: 16px;
    margin: 0 10px;
}

.confirmation-container a:hover {
    text-decoration: underline;
}

</style>
