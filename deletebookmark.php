<?php
include_once('included_functions.php');

// FUNCTIONS TO DELETE BOOKMARK
// IF BUISNESSNAME AND VALID USERS ARE NOT EMPTY -> THUS EXECUTE DELETE VALUE FROM DB
if (!empty($_GET['businessName']) && !empty($_SESSION['valid_user'])) {
	$query = "DELETE FROM bookmarks WHERE usernameID=? AND businessName =?";

	$result = $db->prepare($query);
	$result->bind_param('ss',$_SESSION['valid_user'],$_GET['businessName']);
	$result->execute();
}
//fetch the watchlist for the user
redirect_to("member.php");
?>
