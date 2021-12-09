<?php
include('functions.php');
require('header.php');
?>

<main>
	<div class="business-details">
		<div class="container">
			<?php
			$bName = trim($_GET['businessName']);
			// Query
			$query = "SELECT * FROM business_licences_2021 WHERE businessName = ?";
			//
			$result = $db->prepare($query);
			$result->bind_param('s', $bName);
			$result->execute();
			$result->bind_result($id, $name, $pOrs, $unit, $hNum, $road, $pCode, $phone, $tC, $long, $lat);

			if ($result->fetch()) {
				echo "<h3>$id</h3>";
				echo "<h3>$name</h3>";
				echo "<h3>$pOrs</h3>";
				echo "<h3>$unit</h3>";
				echo "<h3>$hNum</h3>";
				echo "<h3>$road</h3>";
				echo "<h3>$pCode</h3>";
				echo "<h3>$phone</h3>";
				echo "<h3>$tC</h3>";
				echo "<h3>$long</h3>";
				echo "<h3>$lat</h3>";
			}

			$result->free_result();

			// BOOKMARK FEATURE
			@$message = trim($_GET['message']);

			if (!is_logged_in() || !bookmarks($bName)) {
				// echo "<form action=\"addbookmark.php\" method=\"post\">\n";
				// echo "<input type=\"hidden\" name=\"productCode\" value=$bName>\n";
				// echo "<input type=\"submit\" value=\"addbookmark\">\n";
				// echo "</form>\n";
			}
			?>
		</div>
	</div>
</main>

<?php
require('footer.php');
?>
