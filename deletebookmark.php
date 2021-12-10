<?php
include_once('included_functions.php');

$message = "";
if (!empty($_GET['businessName']) && !empty($_SESSION['valid_user'])) {
	$query = "DELETE FROM bookmarks WHERE usernameID=? AND businessName =?";

	$result = $db->prepare($query);
	$result->bind_param('ss',$_SESSION['valid_user'],$_GET['businessName']);
	$result->execute();

	$message = urlencode("The model has been removed from to your <a href=\"showwatchlist.php\">watchlist</a>.");
}
//fetch the watchlist for the user
redirect_to("member.php");
?>
