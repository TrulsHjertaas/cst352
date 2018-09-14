<?php 
    function random_colors(){
        echo"rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".rand(0,255).");";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Random Color</title>
        <style>
            body {
                
                <?php
                
                    echo"background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".rand(0,255).");";
                    
                ?>

            }
            
            
            
            h1 {
                text-align: center;
                font-size: 5em;
                
                                <?php
                    echo"background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".rand(0,255).");";
                    echo"color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".rand(0,255).");";
                    
                ?>
            }
            
            h2 {
                color: <?php random_colors() ?>;
                background-color: <?php random_colors() ?>;
            }
            
        </style>
    </head>
    <body>
        <header>
            <h1>Welcome</h1>
        </header>
        <h2>Random Colors</h2>

    </body>
</html>