<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/Constants.php");

$account = new Account($con);



if (isset($_POST["submitButton"])) {
    
    $userName = FormSanitizer::sanitizeFormUsername( $_POST["username"]);
    $password = FormSanitizer::sanitizeFormPassword( $_POST["password"]);
    

    $success = $account->login( $userName, $password );

    if ($success) {
        //Store session
        header("Location:index.php");
        // this is another way to route a page
    }

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
                <h3> Sign In</h3>
                <span> to continue to Neflixanie</span>
                
                </div>

                <div>
                    <form method = "POST">
                        
                        <?php echo $account->getError(Constants::$loginFailed); ?>
                        <input type= "text"  name = "username" placeholder = "Username" required>


                        <input type= "password"  name = "password" placeholder = "Password"required>


                        <input type= "submit"  name = "submitButton" value = "SUBMIT">

                    </form>

                    <a href = "register.php" class = "signInMessage"> Need an account? Sign up here! </a>


                </div>
            </div>
            

        </body>
   
</html>