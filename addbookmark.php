<?php
include_once('functions.php');

$businessName = !empty($_POST['businessName']) ? $_POST['businessName'] : "";

// IF LOGGED IN
$usernameID = $_SESSION['valid_user'];
if (isset($_SESSION['callback_url']) && $_SESSION['callback_url'] == 'addbookmark.php') {
	$businessName = $_SESSION['businessName'];
	unset($_SESSION['callback_url'],$_SESSION['businessName']);
}

// ADD BOOKMARK
if (!bookmarks($businessName)) {
  $query = "INSERT INTO bookmarks (usernameID, businessName) VALUES (?,?)";

  $result = $db->prepare($query);
  $result->bind_param('ss', $usernameID, $businessName);
  $result->execute();
}

redirect_to("index.php");
?>
