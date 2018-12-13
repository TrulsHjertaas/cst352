<?php
session_start();



if (!isset($_SESSION['adminName'])) { //validates whether the admin has logged in
    
    header("Location: index.php");
    
}


    include "sqlConnection.php";
    $dbConn = getConnection("cars");

    $sql = "DELETE FROM car WHERE carId = " . $_GET['carId'];
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();


//go back to dashboard

header("Location: ../dashboard.php");

?>