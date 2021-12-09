<?php
include('functions.php');
require('header.php');
?>

<?php
$bName = trim($_GET['businessName']);
// Query
$query = "SELECT * FROM business_licences_2021 WHERE businessName = ?";
//
$result = $db->prepare($query);
$result->bind_param('s', $bName);
$result->execute();
$result->bind_result($id, $name, $pOrs, $unit, $hNum, $road, $pCode, $phone, $tC, $long, $lat);
?>

<?php
// if ($result->fetch()) {
// 	echo "<h3>$id</h3>";
// 	echo "<h3>$name</h3>";
// 	echo "<h3>$pOrs</h3>";
// 	echo "<h3>$unit</h3>";
// 	echo "<h3>$hNum</h3>";
// 	echo "<h3>$road</h3>";
// 	echo "<h3>$pCode</h3>";
// 	echo "<h3>$phone</h3>";
// 	echo "<h3>$tC</h3>";
// 	echo "<h3>$long</h3>";
// 	echo "<h3>$lat</h3>";
// }
?>

<main>
	<div class="business-page">
		<div class="container">
			<?php
			if ($result->fetch()) {
			?>
			<div class="col-6">
				<?php 
					echo "<h1>$name</h1>";

					echo "<h3>$road";
					if(!empty($unit)) {
						echo ", #" . $unit;
					}

					echo "</h3>";
						
					echo "<h3>$pCode</h3>"; 

					echo "<br>";

					echo "<h3>$pOrs</h3>"; 
				?>

				<br><br><br>
				<div class="col-12">
					<p>A beautiful business within Surrey. Nullam bibendum sed justo sodales faucibus.
						Cras sed libero metus. Cras elit tortor, ornare et ultrices dignissim, elementum
						in lectus. Duis ut hendrerit justo. Suspendisse sit amet ipsum eu odio imperdiet
						viverra. Etiam at mauris placerat lacus mattis tempor. Maecenas finibus enim id
						eros volutpat elementum ac ac lectus.</p>
				</div>
				<br><br>
				<div class="col-12">
					<!-- BOOKMARK -->
					<?php
					// BOOKMARK FEATURE
					$result->free_result();

					@$message = trim($_GET['message']);

					if (!is_logged_in() || !bookmarks($bName)) {
						echo "<form action=\"addbookmark.php\" method=\"post\">\n";
						echo "<input type=\"hidden\" name=\"buisnessName\" value=$bName>\n";
						echo "<input type=\"submit\" value=\"Bookmark\">\n";
						echo "</form>\n";
					} else if (is_logged_in()) {
						echo "TEST.";
					}
					?>
				</div>
			</div>
		</div>
	 <?php } ?>
	</div>

	<div class="comments-section">
		<div class="col-12">
			<h1>Comments:</h1>
		</div>
	</div>
</main>

<?php
require('footer.php');
?>
