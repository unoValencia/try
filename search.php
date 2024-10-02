<?php

$search = $searchErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["search"])) {
        $searchErr = "Required";
    } else {
        $search = $_POST["search"];
    }
}

if ($search) {
    echo "<script>window.location.href='result.php?search=" . urlencode($search) . "';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
	/* General body styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Form container styling */
.search-form-container {
    max-width: 500px;
    margin: 50px auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    text-align: center;
}

/* Input styling */
.search-form-container input[type="text"] {
    width: calc(100% - 22px);
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

/* Submit button styling */
.search-form-container input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.search-form-container input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Error message styling */
.error {
    color: #dc3545;
    font-size: 14px;
}

</style>
<body>

<div class="search-form-container">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="search" placeholder="Enter your search term" value="<?php echo htmlspecialchars($search); ?>">
        <br>
        <span class="error"><?php echo $searchErr; ?></span>
        <br>
        <input type="submit" value="Search">
    </form>
</div>

</body>
</html>
