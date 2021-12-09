<?php
// CREATE SESSION
session_start();
$db = connect('localhost', 'root', '', 'business_in_surrey');

// IF USER IS LOGGED IN
function is_logged_in() {
	return isset($_SESSION['valid_user']);
}

if (!empty($_SESSION['valid_user'])) {
	$active_user = $_SESSION['valid_user'];
}

// BOOKMARKS
function bookmarks($bName) {
	global $db;
	if (isset($_SESSION['valid_user'])) {
		$query = "SELECT COUNT(*) FROM bookmarks WHERE businessName=? AND usernameID=?";

		$result = $db->prepare($query);
		$result->bind_param('ss', $bName, $_SESSION['valid_user']);
		$result->execute();
		$result->bind_result($counter);
		return ($result->fetch() && $counter > 0);
	} return false;
}


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

function sanitizeInput($var) {
    $var = mysqli_real_escape_string($_SESSION['connection'], $var);
    $var = htmlentities($var);
    $var = strip_tags($var);
    return $var;
}
?>
