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
              <h3>Admin login</h3>
                
                
                <form action="inc/loginProsses.php" method="post">
                    
                    Username: <input placeholder="Username (admin)" class="form-control" type="text" name="username"/> <br>
                    Password: <input placeholder="Password (admin)" class="form-control" type="password" name="password"/> <br>
                              <input type="submit" class="btn btn-primary" value="Login"/>
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