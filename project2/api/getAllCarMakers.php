<?php 
session_start();
include 'sqlConnection.php';
$dbConn = getConnection("cars");

function displayAllCars(){
    global $dbConn;
    
    $sql = "SELECT DISTINCT maker
              FROM car
              ORDER BY maker";
    
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