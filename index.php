<!-- header php -->
<?php
// the code set up with sessions and sql databases
include('functions.php');
// the visual banner
require('header.php');
no_SSL();
?>

<!-- javascript functions for the advanced search hide and show -->
<script>
	function showHidden() {
		// gets elements by id and makes them variables
		var advSettings = document.getElementById("advanced-settings");
		// classlist functions remove and add does removes and adds classes respectively to the elements
  		advSettings.classList.remove("hidden");
  		var advSettingsShow = document.getElementById("advanced-settings-show");
  		advSettingsShow.classList.add("hidden");
  		// showHidden shows the advanced form fields and hides the inline link that activates the function
	}

	function hideHidden() {
		var advSettings = document.getElementById("advanced-settings");
  		advSettings.classList.add("hidden");
  		var advSettingsShow = document.getElementById("advanced-settings-show");
  		advSettingsShow.classList.remove("hidden");
  		// hideHidde hides the advanced form fields and shows the inline link again
	}
</script>

<main>
	<!-- wrapper div class that helps with css to individually select elements in sections ("banner") -->
	<div class="banner">
		<!-- container is a class in grid.css that allows us to organize html elements -->
		<div class="container">
			<!-- blank div's to center the logo and subtext as the center 2 column grid -->
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

	<!-- wrapper div "search-bar" -->
	<div class="search-bar">
		<div class="container">
			<div class="col-2"></div>
			<div class="col-8">
				<!-- the action of results.php switches the page and allows that page to be able to post any of the values of the form fields here -->
				<form action="results.php" method="post" class="container">
					<!-- main search bar -->
					<input type="text" name="search_input" class="col-9" placeholder="Enter keywords. i.e. &quot;pizza&quot;">
					<input type="submit" name="search_btn" value="Discover" class="col-3">
					<!-- advanced search inline link, uses onclick to call javascript function -->
					<a href="#" class="col-4 advanced" onclick="showHidden()" id="advanced-settings-show">Advanced Search Settings</a>
					<!-- class gapped changes the gap length between grids -->
					<div class="hidden col-12 container gapped" id="advanced-settings">
						<!-- advanced search form fields -->
						<label class="col-2 advanced">Unit #</label>
						<label class="col-2 advanced">House #</label>
						<label class="col-4 advanced">Road</label>
						<label class="col-2 advanced">Postal Code</label>
						<label class="col-2 advanced">Town Centre</label>
						<!-- input list elements to avoid invalid input -->
						<input list="unit" name="unit" class="col-2">
						<datalist id="unit">
							<?php 
	                            // query to get distinct and ordered rows
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
	                            // query to get distinct and ordered rows
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
	                            // query to get distinct and ordered rows
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
	                            // query to get distinct and ordered rows
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
	                            // query to get distinct and ordered rows
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

						<!-- inline link to hide form fields with onclick to call javascript function -->
						<a href="#" class="col-12 advanced" onclick="hideHidden()" id="advanced-settings-hide">Hide</a>
					</div>
				</form>
			</div>
			<div class="col-2"></div>
		</div>
	</div>

	<!-- business grid of full database section -->
	<div class="business-grid container">
		<h2 class="col-12">Our database</h2>
		<?php
			// grabs full database
			$allQuery = "SELECT business_licences_2021.ID, business_licences_2021.businessName, business_licences_2021.productsOrServices, business_licences_2021.unit, business_licences_2021.houseNumber, business_licences_2021.road, business_licences_2021.postalCode FROM business_licences_2021";

			// creates table from allQuery
			$allResult = $db->query($allQuery);

			// query to be limited to 20 per page
			$paginationQuery = $allQuery;

			// offset changes depending of which page button was last pressed
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
				// set default to first 20 results/page 1
				$paginationQuery .= " LIMIT 20";
			}

			// creates table from paginationQuery
			$paginationResult = $db->query($paginationQuery);

			// makes a business cell per table row
			while($row = $paginationResult->fetch_assoc()) {
				// makes different rows into header, subheaders, and details
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
				// submit button with form action of business.php to show detailed page
				echo "<form method=\"get\" action=\"business.php\"><input type=\"hidden\" name=\"businessName\" value=\"" . $row['businessName'] . "\"><input type=\"submit\" value=\"View Now\"></form>";
				echo "</div>";
			}

			// get row count of the full result
			$pageCount = @$allResult->num_rows;

			// create form of submit buttons/page number buttons
			echo "<form action=\"index.php\" method=\"post\" class=\"col-12 horizontal-centre\">";

			// row count divided by twenty gives how my many pages/page number buttons need to be made
			for($i = 1; $i <= $pageCount/20; $i++) {

				// sets value from 1 to 10, sets name to button$i for $i equals to 1 to 10 for each button
				echo "<input type=\"submit\" name=\"button" . $i . "\" value=\"".$i."\"";
				// add class "active" which highlights the selected button to show which page the user is on
				if(isset($_POST["button" . $i])) {
					echo " class=\"active\"";
				}
				echo ">";
			}
			echo "</form>";
		?>
	</div>
</main>

<!-- footer php -->
<?php
require('footer.php');
$db->close();
?>
