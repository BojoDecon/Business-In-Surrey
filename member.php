<?php
include('functions.php');
require('header.php');
no_SSL();
?>

<main>
  <div class="member-page">
    <div class="container">
      <div class="col-6">
        <div class="col-12">
          <h1><?php echo $_SESSION['valid_user']; ?></h1>
        </div>
      </div>
      <div class="col-6">
        <div class="col-12">
          <h1>Bookmarks:</h1>
          <!-- SHOW BOOKMARKS DEPENDING ON SPECIFIC USER SESSION -->
          <!-- FORMAT BOOKMARKS AS LINK -> BACK TO THE BUSINESS PAGE -->
          <?php
          $usernameID = $_SESSION['valid_user'];
          if (isset($_SESSION['callback_url']) && $_SESSION['callback_url'] == 'member.php') {
          	unset($_SESSION['callback_url']);
          }

          $query = "SELECT business_licences_2021.businessName FROM business_licences_2021 INNER JOIN bookmarks ON business_licences_2021.businessName = bookmarks.businessName WHERE bookmarks.usernameID = '$usernameID'";
          $result = $db->query($query);

          function format_model_name_as_link($bNameID, $URL) {
          	echo "<a href=\"$URL?businessName=$bNameID\">$bNameID</a>\n";
          	}
          function format_watchlist_action_link($bNameID, $URL) {
          	echo "<a href=\"$URL?businessName=$bNameID\">$bNameIDe</a>\n";
          	}

            while ($row = $result->fetch_row()) {
            	format_model_name_as_link($row[0],"business.php");
            }
          ?>
        </div>
      </div>
  </div>
</main>

<?php
require('footer.php');
?>
