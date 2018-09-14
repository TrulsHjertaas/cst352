<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
    </head>
    <body>
        <? php 
        
        $random_img1 = rand(0,2);
        victory($random_img1);
        $random_img2 = rand(0,2);
        victory($random_img2);
        $random_img3 = rand(0,2);
        victory($random_img3);
        
        /*for($i=1; $i<4; $i++){
            ${"random_img" .$i} = rand(0,2);
            victory(${"random_img" .$i});
        }*/
        
        displayPoints($random_img1, $random_img2, $random_img3);

        function victory($random_img) {
        
        switch($random_img) {
            case 0: $symbol = "cherry";
            break;
            case 1: $symbol = "seven";
            break;
            case 2: $symbol = "lemon";
            break;
        }
        echo "<img src=img/$symbol.png' alt='$symbol' title=\"".ucfirst($symbol)."\"/>";
        
        
        }
        
        function displayPoints($random_img1, $random_img2, $random_img3) {
            echo"<section id='output'>";
            if($random_img1 == $random_img2 && $random_img2 == $random_img3) {
                switch($random_img1) {
                    case 0: $totalPoints = 1000;
                            echo "<h1>Jackpot!</h1>";
                            break;
                    case 1: $totalPoints = 500;
                            break;
                    case 2: $totalPoints = 250;
                            break;
                }
                echo "<h2> You won'$totalPoints  points!</h2>";
            } else {
                echo "<h3>Better luck next time!</h3>";
            }
            echo "</section>";
        }

?>
    </body>
</html>