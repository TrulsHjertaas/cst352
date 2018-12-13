<?php
    session_start();
    
    if(!isset($_SESSION['adminName'])){
        header("Location: login.php");
    }
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
        <nav class="nav justify-content-end">
            <div class="ccs">
                <a class="btn btn-primary" href="inc/logout.php" id="logoutbtn" role="button"><i class="fas fa-sign-in-alt"></i> <strong>Sign Out</strong></a>
                <a class="nav-link pad" id="link2" href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </div>
            
        </nav>
    </header>
    
    <!-- maincontent -->
    
    <div class="container ">
        <div class="row">
            <div class="col-sm-3"></div>
        
            <div class="col-sm-6" id="loginbox">
              <h3>Data</h3>
              <br>
              <strong>
              <p>Total cars in database: 
              </strong>
              <span id="countTxt"></span></p>
              <br>
              <strong>
              <p>Average car price: 
              </strong>
              <span id="averageTxt"></span></p>
                
                <span> 
            <?php 
                echo $_SESSION['error'];
            ?> 
        </span>
            </div>
            <div class="col-sm-3"></div>
        </div>
        
        
    </div>
</body>
</html>