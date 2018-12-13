<?php
    session_start();
    //$_SESSION['index'] = 0;
    //$_SESSION['favorites'] = array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "inc/headLinks.php";
    ?>
    <title>Index page</title>
</head>
<body>
    <header>
        <!-- navbar -->
        <?php
            include "inc/header.php";
        ?>
    </header>
    <?php
        include "inc/filter.php";
    ?>

    <!-- card -->
    <div class="container" id="cardHolder">
        <div class="row">
            
        
        <?php 
        // cards created here!
            include "api/getAllCars.php";
            
            $cars = displayAllCars();
            
            //DO NOT CHANGE!!! -W
            foreach($cars as $car){
                echo "<div class='card' style='width: 23rem;'>";
                    echo "<img class='card-img-top' src='". $car["imgURL"] ."' alt='Card image cap'>";
                    echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>" . $car["maker"] . " " . $car["model"] . "</h5>";
                        echo "<hr>";
                        echo"<h6>Price: " . "$" .  $car["price"] . "</h6> <hr>";
                        echo"<h6>Milage: " .$car["milage"]."km</h6>";
                        echo "<hr>";
                        echo "<p class='card-text'>" . $car["description"] . "</p>";
                        echo "<a href='#' class='carLink btn btn-primary' id='". $car["carId"]. "' data-toggle='modal' data-target='#exampleModal'> Check out this car! </a>" . "   ";
                        echo "<span id='valueHolder' value=''></span>";
                        echo "<a href='inc/addFavorites.php?id=". $car["carId"] ."' class='favBtn btn btn-primary' name='favBtn' id='". $car["carId"]. "'> <i class='fas fa-heart'></i> </a>";
                        //<button id="addToFavBtn" type="button" class="btn btn-primary" onclick=""> add to favorites</button>
                    echo"</div>";
                echo"</div>";
            }
            
        ?>
        
     
        
        
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">BMW 520D, 2006mod, automatic++</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Image slider -->
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <!-- first slider -->
                                <img id="caruselImg1" class="d-block w-100" src="" alt="First slide">
                            </div>
                            <!-- second slider-->
                            <div class="carousel-item">
                                <img id="caruselImg2" class="d-block w-100" src="" alt="Second slide">
                            </div>
                            <!-- third slider -->
                            <div class="carousel-item">
                                <img id="caruselImg3" class="d-block w-100" src="" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!-- TABLE -->
                    <hr>
                    <h3 id="price"></h3>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td id="milage"></td>
                                <td id="weight"></td>
                            </tr>
                            <tr>
                              <td id="year"></td>
                              <td id="Cylinder"></td>
                            </tr>
                            <tr>
                                <td id="color"></td>
                                <td id="fuel"></td>
                            </tr>
                            <tr>
                                <td id="doors"></td>
                                <td id="prevOwners"></td>
                            </tr>
                            <tr>
                                <td id="effect"></td>
                                <td id="intColor"></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <!-- description goes here -->
                    <p id="description"></p>
                </div>
                <!-- buttons go here-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    
                </div>
            </div>
        </div>
    </div>

    <?php
       // include "inc/footer.php";
       //print_r($_SESSION['favorites']);
    ?>
    

</body>
</html>