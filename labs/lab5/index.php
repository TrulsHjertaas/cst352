<?php 
$host = "localhost";
$dbname = "quotes";
$username = "root";
$password = "";
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function displayAllQuotes() {
    global $dbConn;
    $sql = "SELECT * FROM q_quotes ORDER BY LENGTH(quote) asc";
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    
    foreach($records as $record) {
        echo $record['quote'] . "<br>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <h1>Random fameous quote</h1>
        <?php 
        displayAllQuotes();
        ?>
    </body>
</html>