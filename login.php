<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/Account.php");

$account = new Account($con);

if(isset($_POST["submitButton"])){

    $userName = FormSanitizer::sanitizeFormUsername($_POST['userName']);
    $password = FormSanitizer::sanitizeFormPassword($_POST['password']);


   $success = $account->login($userName, $password);
 
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
            <h3>Sign In</h3>
            <span>to continue to Netflix</span>
        </div>

            <form method="POST">
              <?php echo $account ->geterror(Constant::$loginFailed); ?>
                <input type="text" name="userName" placeholder='User name' value="<?php getInputValue("userName")?>" required>          
                <input type="password" name="password" placeholder='Password'required>
                <input type="submit" name="submitButton" value="SUBMIT">

            </form>

            <a href="register.php" class="signInMessage">Need an account? Sign up here</a>
        </div>
    </div>
    
        
     </body>

</html>