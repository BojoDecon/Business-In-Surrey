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
					<div class="col-2" class="search-input">
						<input type="radio" value="Service" name="search_type" id="service" onfocus="serviceFocused()" autofocus>
						<label for="service">Service</label>
					</div>
					<div class="col-2" class="search-input">
						<input type="radio" value="Nearby" name="search_type" id="nearby" onfocus="nearbyFocused()">
						<label for="nearby">Nearby</label>
					</div>
					<div class="col-10"></div>
					<input type="text" name="search_input" id="search_input" class="col-10" placholder="">
					<input type="submit" name="search_btn" value="Discover" class="col-2">
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