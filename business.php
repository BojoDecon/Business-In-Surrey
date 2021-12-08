<?php
require('header.php');
?>

<main>
	<div class="business-details">
		<div class="container">
			<?php
				if(!empty($_POST['businessName'])) {
					echo $_POST['businessName'];
				} else {
					echo "No results found.";
				}
			?>
		</div>
	</div>
</main>

<?php
require('footer.php');
?>