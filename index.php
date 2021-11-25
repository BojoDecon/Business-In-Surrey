<?php
require('header.php');
?>

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
					<input type="button" name="search_type" value="Service" autofocus>
					<input type="button" name="search_type" value="Nearby">
					<div class="col-10"></div>
					<input type="text" name="search_input" class="col-10" placeholder="<?php if($_POST["search_type"] == "Service") { echo "Input keywords. i.e. \"pizza\""; }?>">
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