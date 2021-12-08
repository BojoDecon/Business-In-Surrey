<?php
require('header.php');
include('functions.php');
require_SSL();
?>

<?php
if (!isset($_POST['login_btn'])) {
  $usernameID = $pass = "";

} else {
  $usernameID = !empty($_POST["usernameID"]) ? trim($_POST["usernameID"]) : "";
  $password = !empty($_POST["password"]) ? trim($_POST["password"]) : "";

  $query = "SELECT usernameID, password FROM membership ";
  $query .= "WHERE usernameID = ?";

  $stmt = $db->prepare($query);
  $stmt->bind_param('s', $usernameID);
  $stmt->execute();
  $stmt->bind_result($usernameID2,$pass2_hash);

  if($stmt->fetch() && password_verify($password,$pass2_hash)) {
      $_SESSION['valid_user'] = $usernameID;
      $callback_url = "index.php";

      if (isset($_SESSION['callback_url']))
        $callback_url = $_SESSION['callback_url'];
      //switch back to non-secure http
      redirect_to($callback_url);
  }
  else $errorMessage = "Incorrect username or password.";
}
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
          <input type="text" name="usernameID" class="col-12" value="<?php $usernameID ?>">
          <h3>Password:</h3>
          <input type="password" name="password" class="col-12" value="">
          <br>
          <input type="submit" name="login_btn" value="Submit" class="col-12">
        </form>
      </div>
      <div class="col-1"></div>
      <div class="col-5">
        <div class="col-12">
          <h1>Not registered?</h1>
          <h2>Create an account <span><a href="register.php">Sign up.</a></span></h2>

          <br>
          <?php if(!empty($errorMessage)) echo '<p>' . $errorMessage . '</p>' ?>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
require('footer.php');
?>
