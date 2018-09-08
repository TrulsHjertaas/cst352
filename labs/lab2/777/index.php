<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
    </head>
    <body>
        <?php
        
        function victory() {
        
        $random_img = rand(0,3);
        
        if ($random_img == 0) {
            $symbol = "cherry";
        } else if ($random_img == 1) {
            $symbol = "grapes";
        } else if ($random_img == 2) {
            $symbol = "orange";
        } else if ($random_img == 3) {
            $symbol = "lemon";
        }
        
        
        echo "<img src='img/$symbol.png' alt='Cherry' title='Cherry'/>";
        
        };
        
        victory();
        victory();
        victory();
        
        ?>
    </body>
</html>