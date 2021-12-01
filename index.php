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
				<h2>Support local and <span>Discover.</span></h2>

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
					<input type="text" name="search_input" id="search_input" class="col-10" placholder="">
					<input type="submit" name="search_btn" value="Discover" class="col-2">
					<a href="#" class="col-3 advanced" onclick="showHidden()" id="advanced-settings-show">Advanced Search Settings</a>
					<div class="hidden col-12 container gapped" id="advanced-settings">
						<div class="col-3 advanced">
							<label>Town Centre Code</label>
							<input list="town-centers" name="town-center">
							<datalist id="town-centers">
								<option value="">
							</datalist>
						</div>
						<div class="col-3 advanced">
							<label>Road</label>
							<input list="roads" name="road">
							<datalist id="roads">
								<option value="">
							</datalist>
						</div>

						<a href="#" class="col-12 advanced" onclick="hideHidden()" id="advanced-settings-hide">Hide</a>
					</div>
				</form>
			</div>
			<div class="col-2"></div>
		</div>
	</div>

	<div class="business-grid">
		<div class="container">
			<?php
				echo "<h2>Results</h2>";
			?>
		</div>
	</div>
</main>

<?php
require('footer.php');
?>