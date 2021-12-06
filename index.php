<?php
require('header.php');
?>

<script>
	function serviceFocused() {
		var service = document.getElementById("service");
		service.classList.add("active");
		var nearby = document.getElementById("nearby");
		nearby.classList.remove("active");
		document.getElementById("search_input").placeholder = "Service - input keywords. i.e. \"pizza\"";
		
		var advSettingsShow = document.getElementById("advanced-settings-show");
  		advSettingsShow.classList.remove("hidden");
	}

	function nearbyFocused() {
		var service = document.getElementById("service");
		service.classList.remove("active");
		var nearby = document.getElementById("nearby");
		nearby.classList.add("active");
		var advSettings = document.getElementById("advanced-settings");
		document.getElementById("search_input").placeholder = "Nearby - input address.";
		
		var advSettings = document.getElementById("advanced-settings");
  		advSettings.classList.add("hidden");
  		var advSettingsShow = document.getElementById("advanced-settings-show");
  		advSettingsShow.classList.add("hidden");
	}

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
				<form action="index.php" method="post" class="container">
					<input type="button" value="Service" id="service" onfocus="serviceFocused()" autofocus>
					<input type="button" value="Nearby" id="nearby" onfocus="nearbyFocused()">
					<div class="col-10"></div>
					<input type="text" name="search_input" id="search_input" class="col-10" placholder="" value="<?php if(isset($_POST['search_input'])) echo $_POST['search_input'] ?>">
					<input type="submit" name="search_btn" value="Discover" class="col-2">
					<a href="#" class="col-3 advanced" onclick="showHidden()" id="advanced-settings-show">Advanced Search Settings</a>
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
		<?php
			if(isset($_POST['search_btn'])) {
				echo "<h2 class=\"col-12\">Results</h2>";
				if(empty($_POST['search_input'])) {
					echo "<p class=\"col-12\">No results found.</p>";
				} else {
					echo "<h3 class=\"col-12\">for \"" . $_POST['search_input'] . "\"</h3>";
					$query = "SELECT business_licences_2021.ID, business_licences_2021.businessName, business_licences_2021.productsOrServices, business_licences_2021.unit, business_licences_2021.houseNumber, business_licences_2021.road, business_licences_2021.postalCode FROM business_licences_2021 WHERE business_licences_2021.businessName LIKE \"%" . $_POST['search_input'] . "%\" || business_licences_2021.productsOrServices LIKE \"%" . $_POST['search_input'] . "%\"";

					$result = $connection->query($query);

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
						echo "<a href=\"results.php\"><input type=\"button\" value=\"View Now\"></a>";
						echo "</div>";
					}

					$pageCount = @$result->num_rows;

					echo "<div class=\"col-12 parent\"><div class=\"horizontal-centre\">";
					if($pageCount != 0) {
						for($i = 1; $i <= $pageCount/20; $i++) {
							echo "<input type=\"button\" name=\"button" . $i . "\" value=\"".$i."\">";
						}
					}
					echo "</div></div>";


				}
			}
		?>
	</div>
</main>

<?php
require('footer.php');
?>