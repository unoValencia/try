<?php

include ("connections.php");
include ("nav.php");

date_default_timezone_set("Asia/Manila");
$date_now = date("m/d/Y");
$time_now = date("h:i a");
$notify = $attempt = $log_time = "";

$end_time = date("h:i A", strtotime("+15 minutes", strtotime($time_now)));

$email = $password = "";

$emailErr = $passwordErr = "";

if (isset($_POST["btnLogin"])) {

    // Check for empty email field
    if (empty($_POST["email"])) {
        $emailErr = "Email is required!";
    } else {
        $email = $_POST["email"];
    }

    // Check for empty password field
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required!";
    } else {
        $password = $_POST["password"];
    }

    // Proceed if both email and password are provided
    if ($email && $password) {

        // Query to check email in the database
        $check_email = mysqli_query($connections, "SELECT * FROM tbl_user WHERE email='$email'");

        $check_row = mysqli_num_rows($check_email);

        if ($check_row > 0) {
            $fetch = mysqli_fetch_assoc($check_email); // Fetch user data
            $db_password = $fetch["password"];
            $db_attempt = $fetch["attempt"];
            $db_log_time = strtotime($fetch["log_time"]);
            $my_log_time = $fetch["log_time"];
            $new_time = strtotime($time_now);

            $account_type = $fetch["account_type"];

            // Check if the user is an admin
            if ($account_type == "1") {
                if ($db_password == $password) {
                    echo "<script>window.location.href='Admin';</script>";
                } else {
                    $passwordErr = "Hi Admin! Your Password is incorrect!";
                }
            } else {
                // If not admin, check login attempts and timing
                if ($db_log_time <= $new_time) {
                    if ($db_password == $password) {
                        echo "<script>window.location.href='User';</script>";
                    } else {
                        $attempt = (int)$db_attempt + 1; // Cast $db_attempt to integer before incrementing
                        if ($attempt >= 3) {
                            $attempt = 3;
                            mysqli_query($connections, "UPDATE tbl_user SET attempt='$attempt', log_time='$end_time' WHERE email='$email'");
                            $notify = "You have reached the maximum login attempts. Please try again after: <b>$end_time</b>";
                        } else {
                            mysqli_query($connections, "UPDATE tbl_user SET attempt='$attempt' WHERE email='$email'");
                            $passwordErr = "Password is incorrect!";
                            $notify = "Login Attempt: <b>$attempt</b>";
                        }
                    }
                } else {
                    $notify = "Sorry, you must wait until: <b>$my_log_time</b> before attempting to login again.";
                }
            }
        } else {
            $emailErr = "Email is not registered!";
        }
    }
}
?>

<center>
<form method="POST">

<h2>Login</h2>

<input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>"><br>
<span class="error"><?php echo $emailErr; ?></span>

<br>

<input type="password" name="password" placeholder="Password" value=""><br>
<span class="error"><?php echo $passwordErr; ?></span>

<br>

<input class="btn-primary" type="submit" name="btnLogin" value="Login">

<br>

<span class="error"><?php echo $notify; ?></span>

<br>

<a href="?forgot=<?php echo md5(rand(1,9)); ?>">Forgot Password?</a>

</form>
</center>
