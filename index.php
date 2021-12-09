<?php
include('functions.php');
require('header.php');
no_SSL();
?>

<script>
	function showHidden() {
		var advSettings = document.getElementById("advanced-settings");
  		advSettings.classList.remove("hidden");
  		var advSettingsShow = document.getElementById("advanced-settings-show");
  		advSettingsShow.classList.add("hidden");
	}

	function hideHidden() {
		var advSettings = document.getElementById("advanced-settings");
  		advSettings.classList.add("hidden");
  		var advSettingsShow = document.getElementById("advanced-settings-show");
  		advSettingsShow.classList.remove("hidden");
	}
</script>

<main>
	<div class="banner">
		<div class="container">
			<div class="col-2"></div>
			<div class="col-2">
				<img src="img/logo.png" width="10">
			</div>
			<div class="col-6">
				<h1>Surrey's business depository of all things local.</h1>
				<h3>Support local and <span>Discover.</span></h3>
			</div>
			<div class="col-2"></div>
		</div>
	</div>

	<div class="search-bar">
		<div class="container">
			<div class="col-2"></div>
			<div class="col-8">
				<form action="results.php" method="post" class="container">
					<input type="text" name="search_input" id="search_input" class="col-9" placeholder="Enter keywords. i.e. &quot;pizza&quot;" value="<?php if(isset($_POST['search_input'])) echo $_POST['search_input'] ?>">
					<input type="submit" name="search_btn" value="Discover" class="col-3">
					<a href="#" class="col-4 advanced" onclick="showHidden()" id="advanced-settings-show">Advanced Search Settings</a>
					<div class="hidden col-12 container gapped" id="advanced-settings">
						<label class="col-2 advanced">Unit #</label>
						<label class="col-2 advanced">House #</label>
						<label class="col-4 advanced">Road</label>
						<label class="col-2 advanced">Postal Code</label>
						<label class="col-2 advanced">Town Centre</label>
						<input list="unit" name="unit" class="col-2">
						<datalist id="unit">
							<?php 
	                            // query to get order numbers
	                            $unit_number_query = "SELECT DISTINCT unit FROM business_licences_2021 ORDER BY unit ASC";
	                            // get table values
	                            $unit_number_result = mysqli_query($db, $unit_number_query);

	                            // test if there was a query error
	                            if (!$unit_number_result) {
	                                die("Database query failed.");
	                            }

	                            
	                            //creates an option element for select for each table cell
	                            while($row= mysqli_fetch_assoc($unit_number_result)) {
	                            	$err_free_unit = preg_replace("/[a-zA-Z]/", "", $row['unit']);
	                                echo "<option value=\"" . $err_free_unit . "\">" . $err_free_unit ."</option>";
	                            }

	                            mysqli_free_result($unit_number_result);
                        	?>
						</datalist>
						<input list="house" name="house" class="col-2">
						<datalist id="house">
							<?php 
	                            // query to get order numbers
	                            $house_number_query = "SELECT DISTINCT houseNumber FROM business_licences_2021 ORDER BY houseNumber ASC";
	                            // get table values
	                            $house_number_result = mysqli_query($db, $house_number_query);

	                            // test if there was a query error
	                            if (!$house_number_result) {
	                                die("Database query failed.");
	                            }

	                            
	                            //creates an option element for select for each table cell
	                            while($row= mysqli_fetch_assoc($house_number_result)) {
	                                echo "<option value=\"" . $row["houseNumber"] . "\">" . $row["houseNumber"] ."</option>";
	                            }

	                            mysqli_free_result($house_number_result);
                        	?>
						</datalist>
						<input list="roads" name="road" class="col-4">
						<datalist id="roads">
							<?php 
	                            // query to get order numbers
	                            $road_query = "SELECT DISTINCT road FROM business_licences_2021 ORDER BY road ASC";
	                            // get table values
	                            $road_result = mysqli_query($db, $road_query);

	                            // test if there was a query error
	                            if (!$road_result) {
	                                die("Database query failed.");
	                            }

	                            
	                            //creates an option element for select for each table cell
	                            while($row= mysqli_fetch_assoc($road_result)) {
	                                echo "<option value=\"" . $row["road"] . "\">" . $row["road"] ."</option>";
	                            }

	                            mysqli_free_result($road_result);
                        	?>
						</datalist>
						<input list="postal-code" name="postal-code" class="col-2">
						<datalist id="postal-code">
							<?php 
	                            // query to get order numbers
	                            $postal_code_query = "SELECT DISTINCT postalCode FROM business_licences_2021 ORDER BY postalCode ASC";
	                            // get table values
	                            $postal_code_result = mysqli_query($db, $postal_code_query);

	                            // test if there was a query error
	                            if (!$postal_code_result) {
	                                die("Database query failed.");
	                            }

	                            
	                            //creates an option element for select for each table cell
	                            while($row= mysqli_fetch_assoc($postal_code_result)) {
	                                echo "<option value=\"" . $row["postalCode"] . "\">" . $row["postalCode"] ."</option>";
	                            }

	                            mysqli_free_result($postal_code_result);
                        	?>
						</datalist>
						<input list="town-centre" name="town-centre" class="col-2">
						<datalist id="town-centre">
							<?php 
	                            // query to get order numbers
	                            $town_centre_query = "SELECT DISTINCT townCentre FROM business_licences_2021 ORDER BY townCentre ASC";
	                            // get table values
	                            $town_centre_result = mysqli_query($db, $town_centre_query);

	                            // test if there was a query error
	                            if (!$postal_code_result) {
	                                die("Database query failed.");
	                            }

	                            
	                            //creates an option element for select for each table cell
	                            while($row= mysqli_fetch_assoc($town_centre_result)) {
	                                echo "<option value=\"" . $row["townCentre"] . "\">" . $row["townCentre"] ."</option>";
	                            }

	                            mysqli_free_result($town_centre_result);
                        	?>
						</datalist>

						<a href="#" class="col-12 advanced" onclick="hideHidden()" id="advanced-settings-hide">Hide</a>
					</div>
				</form>
			</div>
			<div class="col-2"></div>
		</div>
	</div>

	<div class="business-grid container">
		<h2 class="col-12">Our database</h2>
		<?php
			$allQuery = "SELECT business_licences_2021.ID, business_licences_2021.businessName, business_licences_2021.productsOrServices, business_licences_2021.unit, business_licences_2021.houseNumber, business_licences_2021.road, business_licences_2021.postalCode FROM business_licences_2021 LIMIT 200";

			$allResult = $db->query($allQuery);

			$paginationQuery = "SELECT business_licences_2021.ID, business_licences_2021.businessName, business_licences_2021.productsOrServices, business_licences_2021.unit, business_licences_2021.houseNumber, business_licences_2021.road, business_licences_2021.postalCode FROM business_licences_2021";

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

			$paginationResult = $db->query($paginationQuery);

			while($row = $paginationResult->fetch_assoc()) {
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

			$pageCount = @$allResult->num_rows;

			if($pageCount != 0) {
				echo "<form action=\"index.php\" method=\"get\" class=\"col-12 horizontal-centre\">";
				for($i = 1; $i <= $pageCount/20; $i++) {

					echo "<input type=\"submit\" name=\"button" . $i . "\" value=\"".$i."\"";
					if(isset($_POST["button" . $i])) {
						echo " class=\"active\"";
					}
					echo ">";
				}
				echo "</form>";
			}
		?>
	</div>
</main>

<?php
require('footer.php');
$db->close();
?>
