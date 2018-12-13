<?php
    session_start();
    include 'sqlConnection.php';
    $dbConn = getConnection("cars");
    
    function displayCar(){
        global $dbConn;
        
        $sql = "SELECT *
                  FROM car
                  WHERE carId = ".$_GET['id'];
                 
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $car = $stmt->fetch(PDO::FETCH_ASSOC); 
        
        return $car;
    }

    $dispCars = displayCar();
    
   
   // print_r($petDisp);
   
   //DO NOT DISPLAY ANYTHING OTHER THAN JSON FORMAT IN WEB APIS
    
    echo json_encode($dispCars);
?>

