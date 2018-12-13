<?php

    session_start();
    
    //header("Location: dashboard.php");
    //
    include "api/sqlConnection.php";
    //include "getAllCars.php";

    $dbConn = getConnection("cars");
    
   function getCarInfo() {
    global $dbConn;
    
    $sql = "SELECT * FROM `car` WHERE carId = "  . $_GET['carId'];
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $record;
    
    
}
//if button has been clicked.
if (isset($_GET['updateCar'])) { 
    
    $sql = "UPDATE car 
            SET 
                maker = :maker,
                model = :model,
                price = :price,
                description = :description,
                color = :color,
                weight = :weight,
                year = :year,
                doors = :doors,
                fuelType = :fuelType,
                prevOwners = :prevOwners,
                interColor = :interColor,
                effect = :effect,
                cylinderVolume = :cylinderVolume,
                milage = :milage,
                imgURL = :imgURL,
                imgURL2 = :imgURL2,
                imgURL3 = :imgURL3
            WHERE carId = " . $_GET['carId'];
            //= :carId";
              
              
   // UPDATE car SET maker = 'faildi', model = 'abbbtbt' WHERE carId = 8

              
    $np = array();
    //$np[":carId"] = $_GET['carId'];
    $np[":maker"] = $_GET['maker'];
    $np[":model"] = $_GET['model'];
    $np[":price"] = $_GET['price'];
    $np[":description"] = $_GET['description'];
    $np[":color"] = $_GET['color'];
    $np[":weight"] = $_GET['weight'];
    $np[":year"] = $_GET['year'];
    $np[":doors"] = $_GET['doors'];
    $np[":fuelType"] = $_GET['fuelType'];
    $np[":prevOwners"] = $_GET['prevOwners'];
    $np[":interColor"] = $_GET['interColor'];
    $np[":effect"] = $_GET['effect'];
    $np[":cylinderVolume"] = $_GET['cylinderVolume'];
    $np[":milage"]  = $_GET['milage'];
    $np[":imgURL"]  = $_GET['imgURL'];
    $np[":imgURL2"] = $_GET['imgURL2'];
    $np[":imgURL3"] = $_GET['imgURL3'];


    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    
    
    echo "car info was updated!";
    header("Location: dashboard.php");
   // header("Location: ../dashboard.php");
   

    
    
}

if (isset($_GET['carId'])) {
    
    
    $carId = getCarInfo();
    //print_r($carId);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Updateform</title>
        <?php
        include "inc/headLinks.php";
        ?>
    </head>
    <body>
        <nav class="nav justify-content-end">
            <div class="ccs">
                <a class="btn btn-primary" href="inc/logout.php" id="logoutbtn" role="button"><i class="fas fa-sign-in-alt"></i> <strong>Sign Out</strong></a>
                <a class="nav-link pad" id="link2" href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </div>
        </nav>
        <div class="container">
            <h2 class="headerText">Update the car</h2>
            <form id="updateForm">
                <input type="hidden" name="carId" value="<?= $carId['carId'] ?>"/>
                Model <input class="form-control" type="text" name="model" value="<?= $carId['model'] ?>" required/> <br />
                Maker <input class="form-control" type="text" name="maker" value="<?= $carId['maker'] ?>" required/> <br />
                Price <input class="form-control" type="text" name="price" value="<?= $carId['price'] ?>" required/> <br />
                Description <br><textarea class="form-control" name="description" cols="40" rows="4" required /><?= $carId['description'] ?></textarea><br>
                Color <input class="form-control" type="text" name="color" value="<?= $carId['color'] ?>" required /> <br>
                Weight <input class="form-control" type="text" name="weight" value="<?= $carId['weight'] ?>" required /> <br>
                Year <input class="form-control" type="text" name="year" value="<?= $carId['year'] ?>" required/><br>
                Doors <input class="form-control" type="text" name="doors" value="<?= $carId['doors'] ?>" required/><br>
                fuelType <input class="form-control" type="text" name="fuelType" value="<?= $carId['fuelType'] ?>" required/><br>
                prevOwners <input class="form-control" type="text" name="prevOwners" value="<?= $carId['prevOwners'] ?>" required/><br>
                interColor <input class="form-control" type="text" name="interColor" value="<?= $carId['interColor'] ?>" required/><br>
                Effect <input class="form-control" type="text" name="effect" value="<?= $carId['effect'] ?>" required/><br>
                CylinderVolume <input class="form-control" type="text" name="cylinderVolume" value="<?= $carId['cylinderVolume'] ?>"/><br>
                Milage: <input class="form-control" type="text" name="milage" value="<?= $carId['milage'] ?>" required/><br>
                Image 1 <input class="form-control" type="url" name="imgURL" value="<?= $carId['imgURL'] ?>" required/><br>
                Image 2 <input class="form-control" type="url" name="imgURL2" value="<?= $carId['imgURL2'] ?>" required/><br>
                Image 3 <input class="form-control" type="url" name="imgURL3" value="<?= $carId['imgURL3'] ?>" required/><br>
    
    
                <input type="submit" class="btn btn-outline-primary btn-lg btn-block" id="updateSubmit" name="updateCar" value="Update car"/>
                
    
            </form>
            <a class="btn btn-primary btn-block" style="width:70%; margin: auto; margin-bottom: 2em;" href="dashboard.php" role="button">Cancel</a>
        </div>
    <!--name="updateCar"--> 

    </body>
</html>