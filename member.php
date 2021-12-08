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
          <h2>Address</h2>
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
