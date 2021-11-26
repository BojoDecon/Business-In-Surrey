<?php
require('header.php');
?>

<main>
  <div class="login-page">
    <div class="container">
      <div class="col-6">
        <div class="col-12">
          <h1>Login now</h1>
          <h2>Welcome back to <span>SBD.</span></h2>
        </div>
        <form class="container container" action="login.php" method="post">
          <h3>Username:</h3>
          <input type="text" name="username_input" id="username_input" class="col-12" placholder="">
          <h3>Password:</h3>
          <input type="text" name="password_input" id="password_input" class="col-12" placholder="">
          <input type="submit" name="login_btn" value="Submit" class="col-12">
        </form>
      </div>
      <div class="col-1"></div>
      <div class="col-5">
        <div class="col-12">
          <h1>Not registered?</h1>
          <h2>Create an account <span><a href="register.php">Sign up.</a></span></h2>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
require('footer.php');
?>
