<?php 
session_start();
include 'sqlConnection.php';
$dbConn = getConnection("cars");


function displayAllFavorites(){
    global $dbConn;
    $cars = array();
    
    if(empty($_SESSION['favorites'])){
        return false;
    }
        
    foreach($_SESSION['favorites'] as $favorites){
        $sql = "SELECT * FROM car WHERE carId = ". $favorites ." ORDER BY maker";
         
            
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        array_push($cars, $stmt->fetch(PDO::FETCH_ASSOC)); 
    }
    return $cars;
}


?>

