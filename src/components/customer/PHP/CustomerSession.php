<?php
include('./connectSession.php');
if(isset($_SESSION['username']) && $_SESSION['UserRole'] == 'Customer'){
            include('./HomePage.php');
        }
    
    else
        {
            header('Location:./CustomerLogin.php?error=Invalid Credentials');
            if(isset($_SESSION['error']))
                {
                    echo("<br>" .$_SESSION['error']);
                }
        }
?>