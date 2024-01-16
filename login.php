<?php
if (isset($_POST["submitButton"])) {
    echo "form was submitted";

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
                <span> to coninue to Neflixanie</span>
                
                </div>

                <div>
                    <form method = "POST">
                        

                        <input type= "text"  name = "username" placeholder = "Username" required>


                        <input type= "password"  name = "password" placeholder = "Password"required>


                        <input type= "submit"  name = "submitButton" value = "SUBMIT">

                    </form>

                    <a href = "register.php" class = "signInMessage"> Need an account? Sign up here! </a>


                </div>
            </div>
            

        </body>
   
</html>