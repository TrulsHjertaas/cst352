<?php
    session_start();
    
    if(!isset($_SESSION['adminName'])){
        header("Location: login.php");
    }
    
    include "inc/sqlConnection.php";
    $dbConn = getConnection("cars");
    
    if(isset($_GET['addCarForm'])){
        
        $maker = $_GET['addCarMaker'];
        $model = $_GET['addCarModel'];
        $doors = $_GET['addCarDoors'];
        $fuel = $_GET['addCarFuelType'];
        $weight = $_GET['addCarFuelWeight'];
        $power = $_GET['addCarPower'];
        $volume = $_GET['addCarCylinderVolume'];
        $milage = $_GET['addCarMilage'];
        $year = $_GET['addCarYear'];
        $owners = $_GET['addCarOwner'];
        $color = $_GET['addCarColor'];
        $intColor = $_GET['addCarIntColor'];
        $price = $_GET['addCarPrice'];
        $img1 = $_GET['addCarImg1'];
        $img2 = $_GET['addCarImg2'];
        $img3 = $_GET['addCarImg3'];
        $description = $_GET['addCarDescription'];
        
        $sql = "INSERT INTO car (maker, model, price, description, color, weight, year, doors, fuelType, prevOwners, InterColor, effect, cylinderVolume, milage, imgURL, imgURL2, imgURL3)
                VALUES ( :carMaker, :carModel, :carPrice, :carDescription, :carColor, :carWeight, :carYear, :carDoors, :carFuel, :carOwners, :carIntColor, :carEffect, :carVolume, :carMilage, :carImg1, :carImg2, :carImg3);";
                
        $car = array();
        $car[':carMaker'] = $maker;
        $car[':carModel'] = $model;
        $car[':carPrice'] = $price;
        $car[':carDescription'] = $description;
        $car[':carColor'] = $color;
        $car[':carWeight'] = $weight;
        $car[':carYear'] = $year;
        $car[':carDoors'] = $doors;
        $car[':carFuel'] = $fuel;
        $car[':carOwners'] = $owners;
        $car[':carIntColor'] = $intColor;
        $car[':carEffect'] = $power;
        $car[':carVolume'] = $volume;
        $car[':carMilage'] = $milage;
        $car[':carImg1'] = $img1;
        $car[':carImg2'] = $img2;
        $car[':carImg3'] = $img3;
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($car);
        
        //echo "Car added!";
        header("location: dashboard.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "inc/headLinks.php";
    ?>
    <title>Add new car</title>
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

    <!-- card -->
    <div class="container">
        <h1 class="headerText">Add new car!</h1>
        <div class="row">
            <form id="addCarForm">
                <label class="addCar-label" for="addCarMaker">Car maker:</label>
                <input type="text" class="form-control" id="addCarMaker" name="addCarMaker" placeholder="Audi, BMW, etc" required>
                
                <label class="addCar-label" for="addCarModel">Car model:</label>
                <input type="text" class="form-control" id="addCarModel" name="addCarModel" placeholder="A3, 320I, etc" required>
                
                <label class="addCar-label" for="addCarDoors">Doors:</label>
                <input type="text" class="form-control" id="addCarDoors" name="addCarDoors" placeholder="Amount of doors" required>
                
                <label class="addCar-label" for="addCarFuelType">Fuel type:</label>
                <input type="text" class="form-control" id="addCarFuelType" name="addCarFuelType" placeholder="Diesel, gasolie, etc" required>
                
                <label class="addCar-label" for="addCarFuelWeight">Weight:</label>
                <input type="text" class="form-control" id="addCarFuelWeight" name="addCarFuelWeight" placeholder="Weight in KG" required>
                
                <label class="addCar-label" for="addCarPower">Horse power:</label>
                <input type="text" class="form-control" id="addCarPower" name="addCarPower" placeholder="Horse power" required>
                
                <label class="addCar-label" for="addCarCylinderVolume">Cylinder volume:</label>
                <input type="text" class="form-control" id="addCarCylinderVolume" name="addCarCylinderVolume" placeholder="Cylinder volume in Liters" required>
                
                <label class="addCar-label" for="addCarMilage">Milage:</label>
                <input type="text" class="form-control" id="addCarMilage" name="addCarMilage" placeholder="Milage in KM" required>
                
                <label class="addCar-label" for="addCarYear">Model year:</label>
                <input type="text" class="form-control" id="addCarYear" name="addCarYear" placeholder="Model year" required>
                
                <label class="addCar-label" for="addCarOwner">Number of previous owners:</label>
                <input type="text" class="form-control" id="addCarOwner" name="addCarOwner" placeholder="Number of previous owners" required>
                
                <label class="addCar-label" for="addCarColor">Color:</label>
                <input type="text" class="form-control" id="addCarColor" name="addCarColor" placeholder="Car color" required>
                
                <label class="addCar-label" for="addCarIntColor">Interior color:</label>
                <input type="text" class="form-control" id="addCarIntColor" name="addCarIntColor" placeholder="Interior color" required>
        
                <label class="addCar-label" for="addCarPrice">Price in dollars:</label>
                <input type="text" class="form-control" id="addCarPrice" name="addCarPrice" placeholder="$" required>
                
                <label class="addCar-label" for="addCarImg1">Image 1</label>
                <input type="text" class="form-control" id="addCarImg1" name="addCarImg1" placeholder="Image URL" required>
                
                <label class="addCar-label" for="addCarImg2">Image 2</label>
                <input type="text" class="form-control" id="addCarImg2" name="addCarImg2" placeholder="Image URL" required>
                
                <label class="addCar-label" for="addCarImg3">Image 3</label>
                <input type="text" class="form-control" id="addCarImg3" name="addCarImg3" placeholder="Image URL" required>
                
                <label class="addCar-label" for="addCarDescription">Description</label>
                <textarea class="form-control" id="addCarDescription" name="addCarDescription" rows="3" required></textarea>
                <br>
                <button name="addCarForm" type="submit" class="btn btn-outline-primary btn-lg btn-block" id="addRecord"><i class="fas fa-plus"></i> Add new vehicle </button>
            </form>
                 
            <a class="btn btn-primary btn-block" style="width:70%; margin: auto; margin-bottom: 2em;" href="dashboard.php" role="button">Cancel</a>
            
        </div>
    </div>
</body>
</html>