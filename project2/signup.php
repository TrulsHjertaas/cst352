<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "inc/headLinks.php";
    ?>
</head>
<body>
    
    <header>
        <!-- navbar -->
        <?php
            include "inc/header.php";
        ?>
    </header>
    
    <!-- maincontent -->
    
    <div class="container ">
        <div class="row">
            <div class="col-sm-3"></div>
        
            <div class="col-sm-6" id="loginbox">
              <h3>Sign Up</h3>
                
                <form action="inc/signupProsses.php" method="post">
                    
                    Username: <input placeholder="Username" class="form-control" type="text" name="username_signup" required/> <br>
                    Password: <input placeholder="Password" class="form-control" type="password" name="password_signup" required id="password1"/> <br>
                  <!--  Confirm:  <input placeholder="Confirm password" class="form-control" type="password" name="password" required id="password2"/> <br>-->
                              <input type="submit" class="btn btn-primary" value="Sign Up"/>
                </form>
                
                <span> 
            <?php 
                echo $_SESSION['error'];
            ?> 
        </span>
            </div>
            <div class="col-sm-3"></div>
        </div>
        
        
    </div>
    
    
    
    <!--footer-->
    
    <?php
       // include "inc/footer.php";
    ?>
    
    
</body>
</html>