<?php
require('header.php');
include('functions.php');
no_SSL();
?>

<main>
	<div class="business-details">
		<div class="container">
			<?php
				if(!empty($_POST['search_input'])) {
					echo "<h2 class=\"col-12\">Results for \"" . $_POST['search_input'] . "\"</h2>";
					$query = "SELECT business_licences_2021.ID, business_licences_2021.businessName, business_licences_2021.productsOrServices, business_licences_2021.unit, business_licences_2021.houseNumber, business_licences_2021.road, business_licences_2021.postalCode FROM business_licences_2021 WHERE business_licences_2021.businessName LIKE \"%" . $_POST['search_input'] . "%\" || business_licences_2021.productsOrServices LIKE \"%" . $_POST['search_input'] . "%\"";

					$result = $db->query($query);

					while($row = $result->fetch_assoc()) {
						echo "<div class=\"business-cell col-5\">";
						echo "<h2>" . $row["businessName"] . "</h2>";
						if(!empty($row["houseNumber"])) {
							echo "<h3>" . $row["houseNumber"] . " - ";
						} else {
							echo "<h3>";
						}
						echo $row["road"];
						if(!empty($row["unit"])) {
							echo ", #" . $row["unit"] . "</h3>";
						} else {
							echo "</h3>";
						}
						echo "<h3>" . $row["postalCode"] . "</h3>";
						echo "<form method=\"get\" action=\"business.php\"><input type=\"hidden\" name=\"businessName\" value=\"" . $row['businessName'] . "\"><input type=\"submit\" value=\"View Now\"></form>";
						echo "</div>";
					}

				} else { ?>
					<div class="col-6">
						<br><br><br><br><br><br><br>
						<h1>No results found.</h1>
					</div>
				<?php } ?>
		</div>
	</div>
</main>

<?php
require('footer.php');
?>
