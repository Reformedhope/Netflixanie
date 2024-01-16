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
                <img src = "assets/images/netflixanie.png"/>
                <h3> Sign Up</h3>
                <span> to coninue to Neflixanie</span>
                
                </div>

                <div>
                    <form method = "POST">
                        <input type= "text"  name = "firstName" placeholder = "First Name" required>
                        <!-- If you type required it will not allow you to submit the page until all boxes are filed.  -->

                        <input type= "text"  name = "lastName" placeholder = "Last Name" required>

                        <input type= "text"  name = "username" placeholder = "Username" required>

                        <input type= "email"  name = "email" placeholder = "Email" required>

                        <input type= "email"  name = "email2" placeholder = "Confirm Email" required>

                        <input type= "password"  name = "password" placeholder = "Password"required>

                        <input type= "password"  name = "password2" placeholder = " Confirm Password" required>

                        <input type= "submit"  name = "submitButton" value = "SUBMIT">

                    </form>


                </div>
            </div>
            

        </body>
   
</html>