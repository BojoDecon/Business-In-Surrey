<?php
// SECURITY
function no_SSL() {
	if(isset($_SERVER['HTTPS']) &&  $_SERVER['HTTPS']== "on") {
		header("Location: http://" . $_SERVER['HTTP_HOST'] .
			$_SERVER['REQUEST_URI']);
		exit();
	}
}
function require_SSL() {
	if($_SERVER['HTTPS'] != "on") {
		header("Location: https://" . $_SERVER['HTTP_HOST'] .
			$_SERVER['REQUEST_URI']);
		exit();
	}
}

// CREATE SESSION
session_start();
$db = connect('localhost', 'root', '', 'business_in_surrey');

if(!empty($_SESSION['valid_user']))  {
    $current_user = $_SESSION['valid_user'];
}

function is_logged_in() {
	return isset($_SESSION['valid_user']);
}

// REDIRECT
function redirect_to($url) {
    header('Location: ' . $url);
    exit;
}

// CONNECT TO DB
function connect($dbhost, $dbuser, $dbpass, $dbname) {
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Test connection
  if(mysqli_connect_errno()) {
      die("Database connection failed: " .
      mysqli_connect_error() . " (" .
      mysqli_connect_errno() . ")"
      );
  }
  return $connection;
}
?>
