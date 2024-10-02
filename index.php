

<?php

include("connections.php");

$fName = $mName = $lName = $address = $email = $section = $contact = $password = $cpassword= "";
$fnameErr = $mnameErr = $lnameErr = $addressErr = $emailErr = $sectionErr = $contactErr = $passwordErr = $cpasswordErr=  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fName"])) {
        $fnameErr = "First name is required";
    } else {
        $fName = $_POST["fName"];
    }

    if (empty($_POST["mName"])) {
        $mnameErr = "Middle name is required";
    } else {
        $mName = $_POST["mName"];
    }

    if (empty($_POST["lName"])) {
        $lnameErr = "Last name is required";
    } else {
        $lName = $_POST["lName"];
    }

    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = $_POST["address"];
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["section"])) {
        $sectionErr = "Section is required";
    } else {
        $section = $_POST["section"];
    }

    if (empty($_POST["contact"])) {
        $contactErr = "Contact number is required";
    } else {
        $contact = $_POST["contact"];
    }
    if (empty($_POST["password"])) {
        $passwordErr = " Password is required";
    } else {
        $password = $_POST["password"];
    }
    if (empty($_POST["cpassword"])) {
        $cpasswordErr = " Confirm Password is required";
    } else {
        $cpassword = $_POST["cpassword"];
    }


    if ($fName && $mName && $lName && $address && $email && $section && $contact && $password && $cpassword) {

        $check_email = mysqli_query($connections, "SELECT * FROM mytbl WHERE email ='$email'");
        $check_email_row = mysqli_num_rows($check_email);

        if($check_email_row > 0) {

                $emailErr = "Email is already registered";

        }else{

          $query = mysqli_query($connections, "INSERT INTO mytbl (fName, mName, lName, section, address, email, contact, password, account_type) 
          
          VALUES ('$fName','$mName','$lName', '$section', '$address', '$email', '$contact', '$password', '2')");

            echo "<div class='data-display'>";
            echo "<h2>Submitted Information</h2>";
            echo "<p><strong>First Name:</strong> " . htmlspecialchars($fName) . "</p>";
            echo "<p><strong>Middle Name:</strong> " . htmlspecialchars($mName) . "</p>";
            echo "<p><strong>Last Name:</strong> " . htmlspecialchars($lName) . "</p>";
            echo "<p><strong>Section:</strong> " . htmlspecialchars($section) . "</p>";
            echo "<p><strong>Address:</strong> " . htmlspecialchars($address) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
            echo "<p><strong>Contact Number:</strong> " . htmlspecialchars($contact) . "</p>";
            echo "</div>";

            echo "<script language='javascript'>alert('New Record has been inserted!')</script>";
            echo "<script>window.location.href='index.php'</script>";


    }




}
}
?>

<?php
if(isset($_POST["btn_1"])){
    echo "Napindot ko na si 1st Button";
}
if(isset($_POST["btn_2"])){
    echo "Napindot ko na si 2nd Button";
}
?>

<form method="POST">

    <input type="submit" name="btn_1" value="1st Button">
    <input type="submit" name="btn_2" value="2nd Button">

</form>

<?php
$first_name = $middle_name = $last_name = $gender = $preffix = $seven_digit = $email = "";
$first_nameErr = $middle_nameErr = $last_nameErr = $genderErr = $preffixErr = $seven_digitErr = $emailErr = "";

if (isset($_POST["btnRegister"])) {

    if (empty($_POST["first_name"])) {
        $first_nameErr = "REQUIRED!!!";
    } else {
        $first_name = $_POST["first_name"];
    }

    if (empty($_POST["middle_name"])) {
        $middle_nameErr = "REQUIRED!!!";
    } else {
        $middle_name = $_POST["middle_name"];
    }


    if (empty($_POST["last_name"])) {
        $last_nameErr = "REQUIRED!!!";
    } else {
        $last_name = $_POST["last_name"];
    }


    if (empty($_POST["gender"])) {
        $genderErr = "REQUIRED!!!";
    } else {
        $gender = $_POST["gender"];
    }


    if (empty($_POST["preffix"])) {
        $preffixErr = "REQUIRED!!!";
    } else {
        $preffix = $_POST["preffix"];
    }


    if (empty($_POST["seven_digits"])) {
        $seven_digitErr = "REQUIRED!!!";
    } else {
        $seven_digit = $_POST["seven_digits"];
    }

    if (empty($_POST["email"])) {
        $emailErr = "REQUIRED!!!";
    } else {
        $email = $_POST["email"];
    }

    if ($first_name && $middle_name && $last_name && $gender && $preffix && $seven_digit && $email) {
        if (!preg_match("/^[a-zA-Z]*$/")){
            $first_nameErr = "Letters lang maawa ka naman.";
        }else{

        }
}
}

?>

<style>
    .error{
        color:red;
    }
</style>

<form method="POST">

    <div style="text-align: center;">
        <table width="50%" style="border: 0px solid black;" >
            <tr>
                <td><input type="text" name="first_name" value="<?php echo $first_name ?>" placeholder="First Name"><span class="error"><?php echo $first_nameErr; ?></span></td>
            </tr>
            <tr>
                <td><input type="text" name="middle_name" value="<?php echo $middle_name ?>" placeholder="Middle Name"><span class="error"><?php echo $middle_nameErr; ?></td>
            </tr>
            <tr>
                <td><input type="text" name="last_name" value="<?php echo $last_name ?>" placeholder="Last Name"><span class="error"><?php echo $last_nameErr; ?></td>
            </tr>
            <tr>
                <td>
                <select name="gender">
                    <option value="">Select Gender</option>
                    <option value="Male" <?php if ($gender == "Male") {echo "selected";} ?>>Male</option>
                    <option value="Female" <?php if ($gender == "Female") {echo "selected";} ?>>Female</option>
                </select><span class="error"><?php echo $genderErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>
                <select name="preffix">
                    <option value="">Network Provider</option>
                    <option value="0813" <?php if ($preffix == "0813") {echo "selected";} ?>>0813</option>
                    <option value="0817" <?php if ($preffix == "0817") {echo "selected";} ?>>0817</option>
                    <option value="0905" <?php if ($preffix == "0905") {echo "selected";} ?>>0905</option>
                    <option value="0906" <?php if ($preffix == "0906") {echo "selected";} ?>>0906</option>
                    <option value="0907" <?php if ($preffix == "0907") {echo "selected";} ?>>0907</option>
                </select><span class="error"><?php echo $preffixErr; ?></span>
        
                <input type="text" name="seven_digits" value="<?php echo $seven_digit; ?>" maxlength="7" placeholder="Other Seven Digits"><span class="error"><?php echo $seven_digitErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="email" value="<?php echo $email ?>" placeholder="Email"><span class="error"><?php echo $emailErr; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <hr>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="btnRegister" valaue="Register">
                </td>
            </tr>
        </table>
    </div>

</form>


<?php include ("nav.php"); ?>

<!-- HTML form -->
<div class="form-container">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

FirstName: <input type="text" name="fName" placeholder="First Name" value="<?php echo $fName; ?>"> <br>
           <span class="error"><?php echo $fnameErr; ?></span> <br>

MiddleName:<input type="text" name="mName" placeholder="Middle Name" value="<?php echo $mName; ?>"> <br>
           <span class="error"><?php echo $mnameErr; ?></span> <br>

LastName:  <input type="text" name="lName" placeholder="Last Name" value="<?php echo $lName; ?>"> <br>
           <span class="error"><?php echo $lnameErr; ?></span> <br>

Section:   <input type="text" name="section" placeholder="Section" value="<?php echo $section; ?>"> <br>
           <span class="error"><?php echo $sectionErr; ?></span> <br>

Address:   <input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>"> <br>
           <span class="error"><?php echo $addressErr; ?></span> <br>

Email:     <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>"> <br>
           <span class="error"><?php echo $emailErr; ?></span> <br>

Contact:   <input type="text" name="contact" placeholder="Contact Number" value="<?php echo $contact; ?>"> <br>
           <span class="error"><?php echo $contactErr; ?></span> <br>
           
Password:  <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>"> <br>
           <span class="error"><?php echo $passwordErr; ?></span> <br>

Confirm Password:  <input type="password" name="cpassword" placeholder="Confirm Password" value="<?php echo $cpassword; ?>"> <br>
                   <span class="error"><?php echo $cpasswordErr; ?></span> <br>


<input type="submit" value="Submit">

    </form>
</div>

<hr>

<?php

$view_query = mysqli_query($connections, "SELECT * FROM mytbl");

echo "<table border='2' width='50%'>";
echo "<tr>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Section</th>
        <th>Address</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Option</th>
    </tr>";

while ($row = mysqli_fetch_assoc($view_query)) {
    $user_id = $row["id"];
    $fName = $row["fName"];
    $mName = $row["mName"];
    $lName = $row["lName"];
    $section = $row["section"];
    $address = $row["address"];
    $email = $row["email"];
    $contact = $row["contact"];

    echo "<tr>
            <td>$fName</td>
            <td>$mName</td>
            <td>$lName</td>
            <td>$section</td>
            <td>$address</td>
            <td>$email</td>
            <td>$contact</td>
            <td>
                <a class='btn' href='Edit.php?id=$user_id'>Update</a>
                <a class='btn delete' href='ConfirmDelete.php?id=$user_id'>Delete</a>
            </td>
          </tr>";
}
echo "</table>";
?>

<hr>

<?php

$Paul= "Paul";
$Mica= "Mica";
$Kaye= "Kaye";

$names = array("$Kaye","$Paul","$Mica");

    foreach ($names as $display_names) {
        
        echo $display_names . "<br>";
}
?>
<style>
    /* General body styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Navigation styling */
.nav {
    background-color: #333;
    color: #fff;
    padding: 15px;
    text-align: center;
}

.nav a {
    color: #fff;
    text-decoration: none;
    margin: 0 0px;
}

/* Form container styling */
.form-container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.form-container input[type="text"],
.form-container input[type="password"] {
    width: calc(100% - 22px);
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.form-container input[type="submit"] {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
}

.form-container input[type="submit"]:hover {
    background-color: #218838;
}

.error {
    color: #e74c3c;
}
.nav {
    background-color: #333;
    color: #fff;
    padding: 15px;
    text-align: center;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000; /* Ensures it's above other content */
}

/* Table styling */
table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

.btn {
    display: inline-block;
    padding: 5px 10px;
    color: #fff;
    background-color: #007bff;
    text-decoration: none;
    border-radius: 4px;
}

.btn:hover {
    background-color: #0056b3;
}

.delete {
    background-color: #dc3545;
}

.delete:hover {
    background-color: #c82333;
}

</style>