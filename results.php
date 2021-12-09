<?php
require('header.php');
include('functions.php');
no_SSL();
?>

<main>
	<div class="business-details">
		<div class="container">
			<?php
				echo "<h2 class=\"col-12\">Results for \"" . $_POST['search_input'] . "\"</h2>";

				if(empty($_POST['search_input']) && empty($_POST['unit']) && empty($_POST['house']) && empty($_POST['road']) && empty($_POST['postal-code']) && empty($_POST['town-centre'])) {

				} else {
					$query = "SELECT businessName, productsOrServices, unit, houseNumber, road, postalCode FROM business_licences_2021 WHERE ";

					if(!empty($_POST['search_input'])) {
						$query .= "(businessName LIKE \"%" . $_POST['search_input'] . "%\" || business_licences_2021.productsOrServices LIKE \"%" . $_POST['search_input'] . "%\")";
					}

					if(!empty($_POST['search_input']) && !empty($_POST['unit'])) {
						$query .= " && ";
					}

					if(!empty($_POST['unit'])) {
						$query .= "unit=\"" . $_POST['unit'] . "\""; 
					}

					if((!empty($_POST['search_input']) || !empty($_POST['unit'])) && !empty($_POST['house']))  {
						$query .= " && ";
					}

					if(!empty($_POST['house'])) {
						$query .= "houseNumber=\"" . $_POST['house'] . "\""; 
					}

					if((!empty($_POST['search_input']) || !empty($_POST['unit']) || !empty($_POST['house'])) && !empty($_POST['road'])) {
						$query .= " && ";
					}

					if(!empty($_POST['road'])) {
						$query .= "road=\"" . $_POST['road'] . "\""; 
					}

					if((!empty($_POST['search_input']) || !empty($_POST['unit']) || !empty($_POST['house']) || !empty($_POST['road'])) && !empty($_POST['postal-code'])) {
						$query .= " && ";
					}

					if(!empty($_POST['postal-code'])) {
						$query .= "postalCode=\"" . $_POST['postal-code'] . "\""; 
					}

					if((!empty($_POST['search_input']) || !empty($_POST['unit']) || !empty($_POST['house']) || !empty($_POST['road']) || !empty($_POST['postal-code'])) && !empty($_POST['town-centre'])) {
						$query .= " && ";
					}

					if(!empty($_POST['town-centre'])) {
						$query .= "townCentre=\"" . $_POST['town-centre'] . "\""; 
					}

					$result = $db->query($query);

					$rowCount = @$result->num_rows;

					if($rowCount != 0) {
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
					} else {
						echo "<h2 class=\"col-12\">No Results</h2>";
					}
				}
			?>
		</div>
	</div>
</main>

<?php
require('footer.php');
?>
