<!-- header php -->
<?php
// the code set up with sessions and sql databases
include('functions.php');
// the visual banner
require('header.php');
no_SSL();
?>

<main>
	<!-- wrapper class results -->
	<div class="results">
		<div class="container">
			<?php
				echo "<div class=\"col-12\">";
				echo "<h2>Results for \"" . $_POST['search_input'] . "\"</h2>";
				echo "<a href=\"index.php\">Return to search</a>";
				echo "</div>";

				if(empty($_POST['search_input']) && empty($_POST['unit']) && empty($_POST['house']) && empty($_POST['road']) && empty($_POST['postal-code']) && empty($_POST['town-centre'])) {
					echo "<h2 class=\"col-12\">No Results</h2>";
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

					$allResult = $db->query($query);

					$paginationQuery = $query;

					if(isset($_POST['button1'])) {
						$paginationQuery .= " LIMIT 20";
					} else if(isset($_POST['button2'])) {
						$paginationQuery .= " LIMIT 20,20";
					} else if(isset($_POST['button3'])) {
						$paginationQuery .= " LIMIT 40,20";
					} else if(isset($_POST['button4'])) {
						$paginationQuery .= " LIMIT 60,20";
					} else if(isset($_POST['button5'])) {
						$paginationQuery .= " LIMIT 80,20";
					} else {
						$paginationQuery .= " LIMIT 20";
					}

					$result = $db->query($paginationQuery);

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

					$pageCount = @$allResult->num_rows;

					if($pageCount != 0) {
						echo "<form action=\"results.php\" method=\"post\" class=\"col-12 horizontal-centre\">";
						echo "<input type=\"text\" name=\"search_input\" class=\"hidden\" value=\"" . $_POST['search_input'] . "\">";
						for($i = 1; $i <= $pageCount/20; $i++) {

							echo "<input type=\"submit\" name=\"button" . $i . "\" value=\"".$i."\"";
							if(isset($_POST["button" . $i])) {
								echo " class=\"active\"";
							}
							echo ">";
						}
						echo "</form>";
					}
				}
			?>
		</div>
	</div>
</main>

<?php
require('footer.php');
?>
