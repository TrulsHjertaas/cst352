<?php 

function displayNumbers($startYear, $endYear) {

$images = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");

$sum = 0;
$arrayIndex = 0;

for($i = $startYear; $i <= $endYear; $i++) {
    
    echo "<li> <strong> Year </strong> $i ";
    
    if($i == 1776) {
        echo"<strong>USA INDEPENDENCE</strong>";
        $sum += $i;
    }
    if($i%100 == 0) {
         echo"<strong>Happy New Century</strong>";
         $sum += $i;
    }
    if($i >= 1900 && $i < 2000) {
        //echo"<li> <span class='bold'> Year </span>$i </li>";
     echo "<img src='img/".$images[$arrayIndex].".png' >";
        //echo"<li> <span class='bold'> Year </span>$i <img src='img/$images[$arrayIndex].png'/>";
       // echo"<img src='img/$images[$arrayIndex].png'/>";
    }
    
    echo"</li>";
    
    $arrayIndex++;
    if ($arrayIndex == 12) {
            $arrayIndex = 0;
        }
    
}
//return $sum;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            li {
                list-style-type: none;
                text-align: center;
                margin: 0 auto;
                line-height: 1.5em;
            }
            
            h1 {
                text-align: center;
            }
            
            .bold {
                font-weight: 600;
            }
            
            p {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>Chinese Zodiac Numbers</h1>
        <!--<form>
            <input type="text" name="startYear" id="startYear"/>
            <input type="text" name="endYear" id="endYear"/>
            <input type="submit" value="Submit" value="
        </form>-->
        <ul>
        <?php 
        displayNumbers(1900, 2000);
        ?>
        </ul>
        
    </body>
</html>