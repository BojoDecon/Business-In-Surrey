<?php
    $connection = @mysqli_connect("localhost", "root", "", "business_in_surrey");
    // Test if connection succeeded
    if(mysqli_connect_errno()) {
        die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
        );
    }
?>

<!DOCTYPE html>
<html>

<body>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
</head>

<nav>
    <div class="container">
        <div class="col-10">
            <a href="index.php">SBD</a>
        </div>
        <div class="col-2">
            <a href="login.php" class="login">Log In/Register</a>
        </div>
    </div>
</nav>

