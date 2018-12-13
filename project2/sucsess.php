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
              <h3>Success!</h3>
                <p>
                    Your account was successfully created! Stay put! We are working on an update so you also can sell your cars!<i class="fas fa-car"></i> 
                </p>

                
                
       
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