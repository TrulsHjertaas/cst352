<?php
    session_start();
        
    // Get aggregate functions 
    include 'sqlConnection.php';
    $dbConn = getConnection("cars");
    
    function displayAllCars(){
        global $dbConn;
        
        $sql = "SELECT COUNT(carId) AS countCars
                  FROM car;";
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $cars = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        
        return $cars;
    }
    
        $dispCars = displayAllCars();
        
       
       // print_r($petDisp);
       
       //DO NOT DISPLAY ANYTHING OTHER THAN JSON FORMAT IN WEB APIS
        
        echo json_encode($dispCars);
    
?>