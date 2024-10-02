<?php 

include ("connections.php");

$user_id = $_POST["id"];
$new_fName = $_POST["fName"];
$new_mName = $_POST["mName"];
$new_lName = $_POST["lName"];
$new_section = $_POST["section"];
$new_address = $_POST["address"];
$new_email = $_POST["email"];
$new_contact = $_POST["contact"];


mysqli_query($connections, "UPDATE mytbl SET 
    fName='$new_fName', 
    mName='$new_mName', 
    lName='$new_lName', 
    section='$new_section', 
    address='$new_address', 
    email='$new_email', 
    contact='$new_contact' 
    WHERE id='$user_id'");


echo "<script language='javascript'>alert('Record has been updated!')</script>";
echo "<script>window.location.href='index.php'</script>";

?>
