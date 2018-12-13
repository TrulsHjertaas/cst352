<?php 
session_start();
include 'sqlConnection.php';
$dbConn = getConnection("cars");


function displayAllCars(){
    global $dbConn;
    
    if (isset($_GET["from"]) && isset($_GET["to"]) && isset($_GET["carMaker"]) && isset($_GET["carModel"])) {
        
        $from = $_GET["from"];
        $to = $_GET["to"];
        $fromMilage = $_GET["fromMilage"];
        $toMilage = $_GET["toMilage"];
        $carMaker = $_GET["carMaker"];
        $carModel = $_GET["carModel"];
        
        
        if ($to == null) {
            $to = 99999999999;
        }
        
        if ($from == null) {
            $from = 0;
        }
        
        if ($fromMilage == null) {
            $fromMilage = 0;
        }
        
        if ($toMilage == null) {
            $toMilage = 999999999;
        }
        if($carMaker == null) {
            $carMaker = 'Subaru';
        }
        if($carModel == null) {
            $carModel = 'BRZ';
        }
    
             $sql = "SELECT *
                      FROM car
                      WHERE maker ='". $carMaker ."' AND model ='".$carModel."' 
                      AND price BETWEEN ".$from." AND " .$to. "
                      AND milage BETWEEN ".$fromMilage." AND " .$toMilage. "
                      ORDER BY price DESC";
                      
    } else 
    {  //Display all cars, by maker name
    
             $sql = "SELECT *
                      FROM car
                      ORDER BY maker
                      ASC";
        }
        
        
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
    if ($cars == null ) {
    echo '<div class="jumbotron">
            <h1 class="display-4">No cars matching your criteria!</h1>
            <p class="lead">You can reset by clicking the reset button in the filter menu</p>
        </div>';
    }
    
    return $cars;
}


?>

