<?php
require('header.php');
?>

<script>
	function serviceFocused() {
		document.getElementById("search_input").placeholder = "Service - input keywords. i.e. \"pizza\"";
	}

	function nearbyFocused() {
		document.getElementById("search_input").placeholder = "Nearby - input address.";
	}

	function showHidden() {
		var advSettings = document.getElementById("advanced-settings");
  		advSettings.classList.remove("hidden");
  		var advSettingsShow = document.getElementById("advanced-settings-show");
  		advSettingsShow.classList.add("hidden");
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
					<div class="hidden col-12" id="advanced-settings">
						<a href="#" class="col-12 advanced" onclick="showHidden()" id="advanced-settings-hide">Advanced Search Settings</a>
						<label>Town Centre</label>
						<select>
							
						</select>
					</div>
				</form>
			</div>
			<div class="col-2"></div>
		</div>
	</div>

	<div class="search_results">
		
	</div>
</main>

<?php
require('footer.php');
?>