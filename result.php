<?php 

include("connections.php");

if(empty($_GET["search"])) {
    echo "<p class='error'>Get doesn't contain any value</p>";
} else {
    $check = $_GET["search"];
    $terms = explode(" ", $check);
    $q = "SELECT * FROM mytbl WHERE ";
    $i = 0;

    foreach($terms as $each) {
        $i++;

        if($i == 1) {
            $q .= "(fName LIKE '%$each%' OR mName LIKE '%$each%' OR lName LIKE '%$each%')";
        } else {
            $q .= " OR (fName LIKE '%$each%' OR mName LIKE '%$each%')";
        }
    }

    $query = mysqli_query($connections, $q);
    $c_q = mysqli_num_rows($query);

    if($c_q > 0 && $check != "") {
        echo "<form class='results-form'>";
        while ($row = mysqli_fetch_assoc($query)) {
            echo "<div class='result'>";
            echo "<label>First Name: </label><input type='text' value='" . $row["fName"] . "' readonly><br>";
            echo "<label>Middle Name: </label><input type='text' value='" . $row["mName"] . "' readonly><br>";
            echo "<label>Last Name: </label><input type='text' value='" . $row["lName"] . "' readonly><br>";
            echo "</div>";
        }
        echo "</form>";
    } else {
        echo "<p class='error'>No result found.</p>";
    }
}
?>

<style>
/* Styling for the results form */
.results-form {
    background-color: #f9f9f9;
    padding: 15px;
    margin-top: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: 0 auto; /* Center the form */
}

/* Styling each result */
.result {
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid #ddd;
}

/* Styling the form labels */
.results-form label {
    display: inline-block;
    width: 120px;
    font-weight: bold;
    margin-bottom: 10px;
}

/* Styling the input fields */
.results-form input[type="text"] {
    border: 1px solid #ddd;
    padding: 8px;
    width: calc(100% - 150px);
    margin-bottom: 10px;
    border-radius: 4px;
    background-color: #f5f5f5;
}

/* Error message styling */
.error {
    color: #e74c3c;
    font-size: 16px;
    padding: 10px;
    background-color: #f8d7da;
    border-radius: 5px;
    width: fit-content;
    margin: 20px auto;
}
</style>
