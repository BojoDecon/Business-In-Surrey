<?php
include('functions.php');
require('header.php');
?>

<?php
$bName = trim($_GET['businessName']);
// QUERY TO DISPLAY DATA FROM business_licences_2021 WHERE BUSINESS NAME IS ""
$query = "SELECT * FROM business_licences_2021 WHERE businessName = ?";
$result = $db->prepare($query);
$result->bind_param('s', $bName);
$result->execute();
$result->bind_result($id, $name, $pOrs, $unit, $hNum, $road, $pCode, $phone, $tC, $long, $lat);
?>

<main>
	<div class="business-page">
		<div class="container">
			<!-- RETRIEVE RESULTS AND DISPLAY -->
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

					// IF THERE IS A CURRENT USER LOGGED ON AND NO BOOKMARK -> THERFORE DISPLAY FORM
					if (is_logged_in() && !bookmarks($bName)) {
						echo "<form action=\"addbookmark.php\" method=\"post\">\n";
						echo "<input type=\"hidden\" name=\"businessName\" value='$bName'>\n";
						echo "<input type=\"submit\" value=\"Bookmark\">\n";
						echo "</form>\n";
					}
					?>
				</div>
			</div>
		</div>
	 <?php } ?>
	</div>
</main>

<?php
require('footer.php');
?>
