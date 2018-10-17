<?php
//creating connection to database

include '../../sqlConnection.php';
$dbConn = getConnection("quotes");

function displayAllQuotes() {
    global $dbConn;
    
    $sql = "SELECT * FROM q_quotes";
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    //$records = $statement->fetch(); //returns only ONE record
    $records = $statement->fetchAll(PDO::FETCH_ASSOC); //returns multiple records
    
    //print_r($records);
    
    foreach ($records as $record) {
        
        echo $record['quote'] . "<br>";
        
    }//end Foreach
    
} //endFunction


function displayRandomQuote() {
    global $dbConn;
    
    $randomRecord = rand(0,26);
    $sql = "SELECT * FROM q_quotes 
            NATURAL JOIN q_author  
            LIMIT $randomRecord,1";
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    //$records = $statement->fetch(); //returns only ONE record
    $records = $statement->fetchAll(PDO::FETCH_ASSOC); //returns multiple records
    
    //print_r($records);
    
    foreach ($records as $record) {
        
        echo $record['quote'] . "<br><br>";
        echo "<a target='authorInfo' href='authorInfo.php?authorId=".$record['authorId']."'>";
        echo  $record['firstName'] . "  " . $record['lastName'];
        echo "</a>";
    }
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 5: Random Famous Quote </title>
        <link rel="stylesheet" href="quote.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    </head>
    <body>

        <h1> Random Famous Quote </h1>

         <blockquote class="disQuote">
         <?= displayRandomQuote() ?>
         </blockquote>
         <br><br>
         <div class="line"></div>
         <br><br>
      
        <iframe name="authorInfo" frameborder="0" width="600" height="300" align="center"> </iframe>
   
        <!--
        //find out how many records there eare in the quotes table.
        
        -->

    </body>
</html>