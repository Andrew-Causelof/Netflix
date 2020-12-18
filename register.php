<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");

$account = new Account($con);


if(isset($_POST["submitButton"])){
    
   $firstName = FormSanitizer::sanitizeFormString($_POST['firstName']);
   $lastName = FormSanitizer::sanitizeFormString($_POST['lastName']);
   $userName = FormSanitizer::sanitizeFormUsername($_POST['userName']);
   $email = FormSanitizer::sanitizeFormEmail($_POST['email']);
   $email2 = FormSanitizer::sanitizeFormEmail($_POST['email2']);
   $password = FormSanitizer::sanitizeFormPassword($_POST['password']);
   $password2 = FormSanitizer::sanitizeFormPassword($_POST['password2']);

  $success = $account->register($firstName, $lastName, $userName, $email, $email2, $password, $password2);

  if($success == true) {
      $_SESSION["userLoggedIn"] = $userName;
      header("Location: index.php");
  } 
}

function getInputValue($name){
    if(isset($_POST[$name])){
        echo $_POST[$name];
    }
}


?>

<!DOCTYPE html>
<html>
    <head>
    <title>Добро пожаловать на Netflix </title>
    <link rel="stylesheet" type="text/css"href="assets/style/style.css"/>
    </head>

    <body>
    <div class="signInContainer">
        <div class="column">
        <div class="header">
            <img src="assets/images/netflix-2015-logo.svg" alt="Netflix Logo" title="logo">
            <h3>Sign Up</h3>
            <span>to continue to Netflix</span>
        </div>

            <form method="POST">

                <?php echo $account ->geterror(Constant::$firstNameCharacters); ?>
                <input type="text" name="firstName" placeholder='First name' value="<?php getInputValue("firstName")?>" required>

                <?php echo $account ->geterror(Constant::$lastNameCharacters); ?>
                <input type="text" name="lastName" placeholder='Last name' value="<?php getInputValue("lastName")?>" required>

                <?php echo $account ->geterror(Constant::$userNameCharacters); ?>
                <?php echo $account ->geterror(Constant::$userNameTaken); ?>
                <input type="text" name="userName" placeholder='User name' value="<?php getInputValue("userName")?>" required >

                
                <?php echo $account ->geterror(Constant::$emailInvalid); ?>
                <?php echo $account ->geterror(Constant::$emailTaken); ?>
                <input type="email" name="email" placeholder='Email' value="<?php getInputValue("email")?>" required>
                <?php echo $account ->geterror(Constant::$emailDontMatch); ?>
                <input type="email" name="email2" placeholder='Confirm email' value="<?php getInputValue("email2")?>" required>


                <?php echo $account ->geterror(Constant::$passowrdDontMatch); ?>
                <?php echo $account ->geterror(Constant::$passwordWrongLenth); ?>
                <input type="password" name="password" placeholder='Password'required>
                <input type="password" name="password2" placeholder='Confirm Password'required>

                <input type="submit" name="submitButton" value="SUBMIT">

            </form>

            <a href="login.php" class="signInMessage">Already have an account? Sign in here!</a>
        </div>
    </div>
    
        
     </body>

</html>