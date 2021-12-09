<?php
include('functions.php');
require('header.php');
?>

<main>
  <div class="member-page">
    <div class="container">
      <div class="col-6">
        <div class="col-12">
          <h1><?php echo $_SESSION['valid_user']; ?></h1>

          <?php
          $usernameID = $_SESSION['valid_user'];

          $query = "SELECT email from membership WHERE email = '$usernameID'"
          $result = $db->query($query);

          while ($row = $result->fetch_row()) {
            echo $row[0];
          }
          ?>
        </div>
      </div>
      <div class="col-6">
        <div class="col-12">
          <h1>Bookmarks:</h1>
        </div>
      </div>
  </div>
</main>

<?php
require('footer.php');
?>
