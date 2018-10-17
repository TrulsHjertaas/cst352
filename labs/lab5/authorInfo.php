<?php

include '../../sqlConnection.php';
$dbConn = getConnection("quotes");

function displayAuthorInfo(){
  global $dbConn;
  
  $authorId = $_GET['authorId'];
  
  $sql = "SELECT * FROM q_author WHERE authorId = $authorId";
  
  $stmt = $dbConn->prepare($sql);
  $stmt->execute();
  $record = $stmt->fetch(PDO::FETCH_ASSOC); //We expect only ONE record
  $imageURL = $record['picture'];
  $imageData = base64_encode(file_get_contents($imageURL));
 
  //print_r($record);
  
  echo "<span class='info'> Bio: </span>" . $record['bio'] . "<br>";
  echo "<span class='info'> Day of Birth </span>" . $record['dob'] . "<br>";
  echo "<span class='info'> Day of Dead: </span>". $record['dod'] . "<br>";
  echo '<img src="data:image/jpeg;base64,'.$imageData.'">';
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Author Info </title>
         <link rel="stylesheet" href="quote.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    </head>
    <body>

        <h2> Author Info </h2>

        <br>
        
        <?=displayAuthorInfo()?>
        
    </body>
</html>