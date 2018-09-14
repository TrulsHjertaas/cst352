        <?php
        
        function getLuckyNr() {
        
        $random_nr = rand(1,10);
        
        if($random_nr == 4) {
            $random_nr = 11;
        }
        
        echo "$random_nr";
        }
        
            function random_colors(){
        echo"rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".rand(0,255).");";
    }
        
        ?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lucky Number </title>
        <style type="text/css">
            h1 {
                text-align: center;
                font-size: 5em;
                
                                <?php
                    echo"background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".rand(0,255).");";
                    echo"color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".rand(0,255).");";
                    
                ?>
            }
        </style>
        
    </head>
    <body>
    <h1> 
    
    MY LUCKY NUMBER IS 
    
    <?php
    getLuckyNr();
    ?>
    </h1>
    </body>
</html>