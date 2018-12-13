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
            <h1 class="headerText">Dashboard</h1>
                <button type="button" class="btn btn-outline-primary btn-lg btn-block" id="btnAddRecord"><i class="fas fa-plus"></i> Add new vehicle </button>
                <button type="button" class="btn btn-outline-primary btn-lg btn-block" id="btnAggregate"><i class="far fa-file"></i> Generate Report </button>
        </div>
           
        
        
        <div class="row">
            <!--card-->
            
            <?php 
        // cards created here!
            include "api/getAllCars.php";
            
            $cars = displayAllCars();
            //DO NOT CHANGE!!! -W
            foreach($cars as $car){
                echo "<div class='card' style='width: 23rem;'>";
                    echo "<img class='card-img-top' src='". $car["imgURL"] ."' alt='Card image cap'>";
                    echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>" . $car["maker"] . " " . $car["model"] . "</h5>";
                        echo "<hr>";
                        echo"<h6>Price: " . "$" .  $car["price"] . "</h6> <hr>";
                        echo"<h6>Milage: " .$car["milage"]."km</h6>";
                        echo "<hr>";
                        echo "<p class='card-text'>" . $car["description"] . "</p>";
                      //  echo "<a href='#' class='carLink btn btn-primary' id='". $car["carId"]. "' data-toggle='modal' data-target='#exampleModal'><i class='fas fa-edit'></i> Edit</a>" . "   ";
                        
                        /*echo "<a class='carLink btn btn-primary' role='button' href='api/updateCar.php?carId=".$carId['carId']."'>Edit</a*/
                        echo "<form name='updateCar' action='updateCar.php'>";  //
                        echo "  <input type='hidden' name='carId' value='".$car['carId']."' >";
                        echo "  <button class='carLink btn btn-primary' type='submit'><i class='fas fa-pencil-alt'></i> Edit</button>";
                        echo "</form> <br>";
                        
                        echo "<form action='api/deleteCar.php' onsubmit='return confirmDeletion()'>";  //
                        echo "  <input type='hidden' name='carId' value='".$car['carId']."' >";
                        echo "  <button class='btn deleteBtn btn-outline-danger' type='submit'><i class='fas fa-trash-alt'></i> Delete</button>";
                        echo "</form>";
                        //williams class ... btn btn-secondary deleteBtn //zaks class btn btn-outline-danger
                        //<button id="addToFavBtn" type="button" class="btn btn-primary" onclick=""> add to favorites</button>
                    echo"</div>";
                echo"</div>";
            }
            
            
        ?>
        <script>
            function confirmDeletion() {
                    return confirm("Are you sure you want to delete the car?");
                }     
        </script>
        
        <!--
        Williams
        //echo "<a class='btn btn-secondary deleteBtn' name='deleteBtn' id='". $car["carId"]. "'><i class='fas fa-trash-alt'></i> Delete</a>";
        -->
        </div>
        
    </div>
</body>
</html>