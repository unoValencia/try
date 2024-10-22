<!-- <?php

$email = $password = "";


$emailErr = $passwordErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST["email"])) {

        $emailErr = "Email is required";

    }else{

        $email = $_POST["email"];
    }

    if(empty($_POST["password"])) {

        $passwordErr = "Password is required";

    }else{

        $password = $_POST["password"];
    }

    if($email && $password){

            include("connections.php");

        $check_email = mysqli_query($connections, "SELECT * FROM mytbl WHERE email='$email' ");
        $check_email_row = mysqli_num_rows($check_email);

        if($check_email_row > 0) {
            
            while($row = mysqli_fetch_assoc($check_email)){

                $user_id =$row["id"];

                $db_password = $row ["password"];
                $db_account_type= $row ["account_type"];

                    if($password == $db_password){

                        session_start();

                        $_SESSION["id"] = $user_id;

                            if($db_account_type == "1"){

                                echo "<script> window.location.href='admin'; </script>";
                           
                            }else{

                                echo "<script> window.location.href='user'</script>";

                            }

                    }


            }

        }else{

            $emailErr = "Email is not registered!";


        }



    }

}

?>

<style>
    body {
        display: center;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        background-color: #e9ecef;
    }

    .form-container, .data-display {
        width: 300px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #f9f9f9;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .error {
        color: red;
        font-size: 12px;
    }

    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto;
        font-size: 14px;
        text-align: left;
    }

    th, td {
        padding: 8px;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .btn {
        display: inline-block;
        padding: 5px 10px;
        margin: 0 5px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #45a049;
    }

    .btn.delete {
        background-color: #ff4d4d;
    }

    .btn.delete:hover {
        background-color: #ff1a1a;
    }

    .error {
        color:Red;
    }
</style>


<div class="form-container">
<form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

Email:   <input type="text" name="email" value="<?php echo $email; ?>"> <br>
         <span class="error"><?php echo $emailErr; ?></span> <br>

Password:<input type="password" name="password" value=""> <br>
         <span class="error"><?php echo $passwordErr; ?></span> <br>

<input type="submit" value="Login">
</form>
</div> -->

<?php
include("connections.php");
include("nav.php");

date_default_timezone_set ("Asia/Manila");
$date_now = date("m/d/Y");
$time_now = date("h:i a");
$notify = $attempt = $log_time = "";

$end_time = date("h:i A", strtotime("+15 minutes", strtotime($time_now)));

$email = $password = "";
$emailErr = $passwordErr = "";

if(isset($_POST["btnLogin"])){
    if(empty($_POST["email"])){
        $emailErr = "Email is required!";
    }else{
        $email = $_POST["email"];
    }

    if(empty($_POST["password"])){
        $passwordErr = "Password is required!";
    }else{
        $password = $_POST["password"];
    }

    if($email AND $password){
        
        $check_email = mysqli_query($connections, "SELECT * FROM tbl_user WHERE email='$email'");
        $check_row = mysqli_num_rows($check_email);

        if($check_row > 0){
            $fetch = mysqli_fetch_assoc($check_email);
            $db_password = $fetch["password"];
            $db_attempt = $fetch["attempt"];
            $db_log_time = strtotime($fetch["log_time"]);
            $my_log_time = $fetch["log_time"];
            $new_time = strtotime($time_now);

            $account_type = $fetch["account_type"];

            if($account_type == "1"){

            }else{

                if($db_log_time <= $new_time){

                    if($db_password == $password){

                    }else{

                        $attempt = $db_attempt + 1;

                        if($attempt >= 3){

                            $attempt = 3;

                        }else{

                            mysqli_query($connections, "UPDATE tbl_user SET attempt='$attempt' WHERE email='$email'");
                            $passwordErr = "Password is incorrect! ";
                            $notify = "Login Attempt: <b>$attempt</b>";

                        }

                    }

                }else{
                    $notify = "I'm Sorry, You have to wait until: <b>$my_log_time</b> before login";
                }

            }

        }else{

            $emailErr = "Email is not registered!";

        }
    }
}

?>

<br>
<br>

<center>
    <form method = "POST">

        <h2>Login</h2>

        <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>" ><br>
        <span class="error"><?php echo $emailErr ?></span>

        <br>

        <input type="text" name="password" placeholder="Password" value="<?php echo $password; ?>" ><br>
        <span class="error"><?php echo $passwordErr ?></span>
        <br>

        <input class="btn-primary" type="submit" name="btnLogin" value="Login">

        <br>

        <span class="error"><?php echo $notify; ?></span>

        <br>

        <a href="?forgot=<?php echo md5(rand(1,9)); ?>">Forgot Password?</a>




    
    </form>
    
</center>