<?php
require('header.php');
?>

<main>
  <div class="register-page">
   <div class="container">
      <div class="col-6">
        <div class="col-12">
          <h1>Create an account</h1>
          <h2>Please fill in the <span>blanks.</span></h2>
        </div>
        <form class="container container" action="register.php" method="post">
          <h3>Username:</h3>
          <input type="text" name="username_input" id="username_input" class="col-12" placholder="">
          <h3>Password:</h3>
          <input type="text" name="password_input" id="password_input" class="col-12" placholder="">
          <input type="submit" name="register_btn" value="Submit" class="col-12">
        </form>
      </div>
      <div class="col-1"></div>
      <div class="col-5">
        <h2>Appreciate you joining us today!</h2>
        <p>Gain access to personalized bookmarks and a diverse community. Comment and Rate.</p>
      </div>
    </div>
  </div>
</main>

<?php
require('footer.php');
?>
