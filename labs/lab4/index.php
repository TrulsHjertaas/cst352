<?php 
$backgroundImage = "img/sea.jpg";

if(isset($_GET['keyword'])) {
    //echo"You searched for: " .$_GET['keyword'];
    include 'api/pixabayAPI.php';
    $imageURLs = getImageURLs($_GET['keyword']);
    $backgroundImage = $imageURLs[array_rand($imageURLs)];
    //print_r($imageURLs);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style type="text/css">
            @import url("css/style/css");
            body{
                background-image: url('<?=$backgroundImage?>');
            }
        </style>
    </head>
    
    <body>
        
        <?php 
            if(!isset($imageURLs)) {
                echo "<h2> Please enter a keyword or elect a category first </h2>";
            }
            else {
                // Display slide-show
                for($i = 0; $i < 5; $i++) {
                    do{
                        $randomIndex = rand(0,count($imageURLs));
                        
                    }
                    while (!isset($imageURLs[$randomIndex]));
                    echo"<img src='" . $imageURLs[$randomIndex] ."' width='200' >";
                    unset($imageURLs[$randomIndex]);   
                }
            }
        ?>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- INDICATORES -->
            <ol class="carousel-indicatores">
                <?php 
                for($i = 0; $i < 5; $i++) {
                    echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                    echo ($i == 0)? "class='active'" : "";
                    echo "></li>";
                }
                ?>
            </ol>
        </div>
        
        <form>
            <input type="text" name="keyword" size="15" placeholder="keyword"/>
            <input type="submit" name="submitBtn" value="Go!"/>
        </form>
        
        <h1>Type a keyword or select a category</h1>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>