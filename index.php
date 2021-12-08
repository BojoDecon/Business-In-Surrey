<?php
require('header.php');
include('functions.php');
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
						<label class="col-3 advanced">Town Centre Code</label>
						<label class="col-3 advanced">Road</label>
						<div class="col-6"></div>
						<input list="town-centers" name="town-center" class="col-3">
						<datalist id="town-centers">
							<option value="">
						</datalist>
						<input list="roads" name="road" class="col-3">
						<datalist id="roads">
							<option value="">
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
			$allQuery = "SELECT business_licences_2021.ID, business_licences_2021.businessName, business_licences_2021.productsOrServices, business_licences_2021.unit, business_licences_2021.houseNumber, business_licences_2021.road, business_licences_2021.postalCode FROM business_licences_2021";

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
				echo "<form method=\"post\" action=\"business.php\"><input type=\"hidden\" name=\"businessName\" value=\"" . $row['businessName'] . "\"><input type=\"submit\" value=\"View Now\"></form>";
				echo "</div>";
			}

			$pageCount = @$allResult->num_rows;

			if($pageCount != 0) {
				echo "<form action=\"index.php\" method=\"post\" class=\"col-12 horizontal-centre\">";
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
