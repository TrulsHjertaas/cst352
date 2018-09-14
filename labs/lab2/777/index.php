<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        
        <style type="text/css">
            @import url("css/styles.css");
        </style>
        
    </head>
    <body>
        
        <div id="main">
        
        <?php 
        for($i=1; $i<4; $i++){
            ${"random_img" .$i} = rand(0,2);
            victory(${"random_img" .$i}, $i);
        }
        
        displayPoints($random_img1, $random_img2, $random_img3);

        function victory($random_img, $pos) {
        
        switch($random_img) {
            case 0: $symbol = "seven";
            break;
            case 1: $symbol = "cherry";
            break;
            case 2: $symbol = "lemon";
            break;
        }
        echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='".ucfirst($symbol)."' width='70px'>";
        
        }
        
        function displayPoints($random_img1, $random_img2, $random_img3) {
            echo"<div id='output'>";
            if($random_img1 == $random_img2 && $random_img2 == $random_img3) {
                switch($random_img1) {
                    case 0: $totalPoints = 1000;
                            echo "<h1>Jackpot!</h1>";
                            echo '<EMBED SRC="tada.mp3" HIDDEN="TRUE" AUTOSTART="TRUE"></EMBED>';
                            break;
                    case 1: $totalPoints = 500;
                            echo '<EMBED SRC="tada.mp3" HIDDEN="TRUE" AUTOSTART="TRUE"></EMBED>';
                            break;
                    case 2: $totalPoints = 250;
                            echo '<EMBED SRC="tada.mp3" HIDDEN="TRUE" AUTOSTART="TRUE"></EMBED>';
                            break;
                }
                echo "<h2>You won $totalPoints points!</h2>";
            } else {
                echo "<h3>Better luck next time!</h3>";
            }
            echo "</div>";
        }

        ?>
        
        <form>
            <input type="submit" value="Spin!"/>
        </form>
        
        </div>
    </body>
</html>