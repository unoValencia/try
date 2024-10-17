<div class="navbar">
    <ul>
        <li><a href="index.php" class="nav-link">Home</a> &nbsp;</li>
        <li><a href="search.php" class="nav-link">Search</a> &nbsp;</li>
        <li><a href="login.php" class="nav-link">Login</a></li>
        <li><a href="ViewRecord.php" class="nav-link">Records</a></li>
        <li><a href="SendSMS" class="nav-link">Message</a></li>
    </ul>
</div>

<style>
/* Navbar styling */
.navbar {
    background-color: #333;
    overflow: hidden;
    width: 100%;
    top: 0;
    z-index: 1000; /* Ensures it's above other content */
}

/* Navbar list and link styling */
.navbar ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

.navbar li {
    float: left;
}

.navbar a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
    font-size: 16px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.navbar a:hover {
    background-color: #575757;
    color: #fff;
}

/* Reset margin and padding to remove the white gap */
body {
    margin: 0;
    padding: 0;
}

/* Responsive design */
@media screen and (max-width: 600px) {
    .navbar li {
        float: none;
        width: 100%;
    }
}

</style>