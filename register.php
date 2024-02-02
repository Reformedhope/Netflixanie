<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/Constants.php");

$account = new Account($con);

if (isset($_POST["submitButton"])) { 

    $firstName = FormSanitizer::sanitizeFormString( $_POST["firstName"]);
    $lastName = FormSanitizer::sanitizeFormString( $_POST["lastName"]);
    $userName = FormSanitizer::sanitizeFormUsername( $_POST["username"]);
    $email = FormSanitizer::sanitizeFormEmail( $_POST["email"]);
    $email2 = FormSanitizer::sanitizeFormEmail( $_POST["email2"]);
    $password = FormSanitizer::sanitizeFormPassword( $_POST["password"]);
    $password2 = FormSanitizer::sanitizeFormPassword( $_POST["password2"]);

    $success = $account->register($firstName, $lastName, $userName, $email, $email2, $password, $password2);

    if ($success) {
        //Store session
        header("Location:index.php");
        // this is another way to route a page
    }

}

// This function allows you to strip the spaces from the beginning and end of a an imput and also lower cases all letters than uppercases the first letter. 
function sanitizeFormString($inputText){
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    $inputText = strtolower($inputText);
    $inputText = ucfirst($inputText);
    return $inputText;
}


?>

<!DOCTYPE html>

<html>
    <head> 
        <title> Welcome to Netflixanie</title>
        <link rel="stylesheet" type = text/css href="assets/style/style.css"/>
        
</head>
        <body>
           
            <div class = "signInContainer">
                <div class="column"> 
                    <div class=" header">
                <img src = "assets/images/netflixanie.png" alt = " logo image"/>
                <h3> Sign Up</h3>
                <span> to continue to Neflixanie</span>
                
                </div>

                <div>
                    <form method = "POST">


                        <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                        <input type= "text"  name = "firstName" placeholder = "First Name" required>
                        <!-- If you type required it will not allow you to submit the page until all boxes are filed.  -->
                        <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                        <input type= "text"  name = "lastName" placeholder = "Last Name" required>

                        <?php echo $account->getError(Constants::$userNameCharacters); ?>
                        <?php echo $account->getError(Constants::$userNameTaken); ?>
                        <input type= "text"  name = "username" placeholder = "Username" required>

                        <?php echo $account->getError(Constants::$emailsDontMatch); ?>
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
                        <?php echo $account->getError(Constants::$emailTaken); ?>
                        <input type= "email"  name = "email" placeholder = "Email" required>

                        <input type= "email"  name = "email2" placeholder = "Confirm Email" required>

                        <?php echo $account->getError(Constants::$passwordDontMatch); ?>
                        <?php echo $account->getError(Constants::$passwordLength); ?>
                        <input type= "password"  name = "password" placeholder = "Password"required>

                        <input type= "password"  name = "password2" placeholder = " Confirm Password" required>

                        <input type= "submit"  name = "submitButton" value = "SUBMIT">

                    </form>

                    <a href = "login.php" class = "signInMessage"> Already have an account? Click here to sign in here! </a>


                </div>
            </div>
            

        </body>
   
</html>