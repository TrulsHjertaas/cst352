<?php

    function displayName() {
        
    //$RapNameFirst = array("Capitol", "Baby", "Dawg", "Big", 
    //"Spooky", "Bad Boy", "King Size", "Rich", "Gucci", "50", "lil", "Snoopy");
    $RapNameFirst1 = array();
    
    $file = fopen("rap.txt", "rb");
        
        //While file not empty/has next line
        while (!feof($file) ) {
            $text = fgets($file);
            array_push($RapNameFirst1, $text);

        }

        fclose($file);
        
    $count;
    foreach ($RapNameFirst1 as $value) {
    //echo "$value <br>";
    $count ++;
    }
    $randomIndex = rand(0,$count);
    //print_r($RapNameFirst1);
    
    array_push($RapNameFirst1, "Curious");
    $name = $_POST['FirstName'];
    
    if(empty($name)) {
        echo"<h2>Please fill in your name</h2>";
    }
    
    else {
        echo "<h2> $RapNameFirst1[$randomIndex] $name[0]</h2>";
    
        if($RapNameFirst1[$randomIndex] == $RapNameFirst1[7]) {
            echo "<img src='rich.jpg' alt='Rich Brian' title='".ucfirst('Rich Brian')."' width='150px'>";
        }
        else if($RapNameFirst1[$randomIndex] == $RapNameFirst1[8]) {
            echo "<img src='gucci.jpg' alt='Gucci Mane' title='".ucfirst('Gucci Mane')."' width='150px'>";
        }
        else if($RapNameFirst1[$randomIndex] == $RapNameFirst1[9]) {
            echo "<img src='50.jpg' alt='50 Cent' title='".ucfirst('50 Cent')."' width='150px'>";
        }
    }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Rap Name Generator</title>
        <link rel="stylesheet" href="rapname.css" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">
    </head>
    <body>
        <h1>Rap Name Generator</h1>
        <p>Submit your first name</p>
        <form method='POST'>
            <input type="text" name="FirstName"/>
            <input type="submit" value="Submit"/>
        </form>
        
        <footer>
            <p>Copyright by Truls Hjertaas</p>
        </footer>
        
        <?php
        displayName();
        ?>
        
    </body>
</html>