<?php
include_once('functions.php');

// IF THE VARIABLE BUSINESSNAME IS NOT EMPTY, THEN THE VALUE IS A SPECIFIC STRING ""
$businessName = !empty($_POST['businessName']) ? $_POST['businessName'] : "";

// IF LOGGED IN
$usernameID = $_SESSION['valid_user'];
// IF THE SPECIFIC SESSION IS ADDBOOKMARK.PHP -> THEREFORE THE SPECIFIC BUSINESS IS NOW THE SESSION (TO BE RETRIEVED LATER)
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
