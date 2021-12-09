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
        <div class="col-1">
          <?php
          if(isset($_SESSION['valid_user'])) {
            echo "<a class=\"login\"  href=\"member.php\">Profile</a>";
          }
          ?>
        </div>
        <div class="col-1">
          <?php
          if(isset($_SESSION['valid_user'])) {
            echo "<a class=\"login\"  href=\"logout.php\">Log Out</a>";
          } else {
            echo "<a class=\"login\"  href=\"login.php\">Log In</a>";
          }
          ?>
        </div>
    </div>
</nav>
