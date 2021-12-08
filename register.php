<?php
require('header.php');
?>

<?php
include('functions.php');
require_SSL();

if (isset($_POST['register_btn'])) {

  $usernameID = !empty($_POST["usernameID"]) ? trim($_POST["usernameID"]) : "";
  $email = !empty($_POST["email"]) ? trim($_POST["email"]) : "";
  $password = !empty($_POST["password"]) ? $_POST["password"] : "";

  // VALIDATION CHECKS
  if (!$usernameID || !$email || !$password) {
    $errorMessage = "All fields mandatory.";
  } else {
    $encrypt = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO membership (usernameID, email, password) VALUES (?, ?, ?)";

    $stmt = $db->prepare($query);
    $stmt->bind_param('sss', $usernameID, $email, $encrypt);
    $stmt->execute();
    echo $query;
    redirect_to('index.php');
  }
} else {
  $email = "";
  $usernameID = "";
}
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
          <h3>Email:</h3>
          <input type="email" name="email" class="col-12" value="<?php $email ?>">
          <h3>Username:</h3>
          <input type="text" name="usernameID" class="col-12" value="<?php $usernameID ?>">
          <h3>Password:</h3>
          <input type="password" name="password" class="col-12" value="">

          <br>
          <input type="submit" name="register_btn" value="Register" class="col-12">
        </form>
      </div>
      <div class="col-1"></div>
      <div class="col-5">
        <h2>Appreciate you joining us today!</h2>
        <p>Gain access to personalized bookmarks and a diverse community. Comment and Rate.</p>

        <br>
        <?php if(!empty($errorMessage)) echo '<p>' . $errorMessage . '</p>' ?>
      </div>
    </div>
  </div>
</main>

<?php
require('footer.php');
$db->close();
?>
