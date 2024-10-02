<?php
$user_id = $_REQUEST["id"];
include("connections.php");
$get_record = mysqli_query($connections, "SELECT * FROM mytbl WHERE id='$user_id'");
$fName = $mName = $lName = $section = $address = $email = $contact = "";
if ($row_edit = mysqli_fetch_assoc($get_record)) {
    $fName = $row_edit["fName"];
    $mName = $row_edit["mName"];
    $lName = $row_edit["lName"];
    $section = $row_edit["section"];
    $address = $row_edit["address"];
    $email = $row_edit["email"];
    $contact = $row_edit["contact"];
} else {

    echo "Record not found!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .form-container input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-container input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="form-container">
    <form method="POST" action="Update_Record.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user_id); ?>">
        <input type="text" name="fName" value="<?php echo htmlspecialchars($fName); ?>" placeholder="First Name">
        <br>
        <input type="text" name="mName" value="<?php echo htmlspecialchars($mName); ?>" placeholder="Middle Name">
        <br>
        <input type="text" name="lName" value="<?php echo htmlspecialchars($lName); ?>" placeholder="Last Name">
        <br>
        <input type="text" name="section" value="<?php echo htmlspecialchars($section); ?>" placeholder="Section">
        <br>
        <input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>" placeholder="Address">
        <br>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="Email">
        <br>
        <input type="text" name="contact" value="<?php echo htmlspecialchars($contact); ?>" placeholder="Contact Number">
        <br>
        <input type="submit" value="Update">
    </form>
</div>
</body>
</html>
