<?php 

$value1;
$value2;
$value3;

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Quiz - HW3</title>
        <meta charset="UTF-8">
        <meta name="author" content="Truls Hjertaas">
        <link rel="stylesheet" href="quiz.css" type="text/css" />
    </head>
    <body>
        <header>
            <h1>This is a Quiz</h1>
        </header>
        
        <main>
            <section class="form_container">
                <h3>Question 1</h3>
                <p>What is the capital of Norway?</p>
               <form action="" method="get">
                   Answer:<br>
                  <input id="q1" type="text" name="q1" value="<?=$_GET["q1"]?>">
                  <?php 
                    $q1 = $_GET['q1'];
                    if (isset($_GET['submit'])) {  
                    global $q1;
                        if($q1 === 'Oslo' || $q1 === 'oslo') {
                            echo"Correct";
                            $value1 = $_GET['submit'];
                        }   
                        else {
                            echo"Wrong";
                        }
                    }
                    ?>

            </section>
            <section class="form_container">
                <h3>Question 2</h3>
                <p>Pick a swedish car brand</p>
                    <select name="cars">
                        <optgroup label="Cars">
                        <option value=""><?=$_GET["cars"]?></option>
                        <option>BMW</option>
                        <option>SAAB</option>
                        <option>AUDI</option>
                        <option>SUBARU</option>
                        </optgroup>
                    </select>
                <?php 
                    if (isset($_GET['submit']) ) { 
            
                    $select = $_GET['cars'];

                    switch ($select) {
                    case SAAB: echo"Correct";
                    break;
                    case BMW: echo"Wrong";
                    break;
                    case AUDI: echo"Wrong";
                    break;
                    case SUBARU: echo"Wrong";
                    break;
                    }
                }
                ?>
            </section>
            
            <section class="form_container">
                <h3>Question 3</h3>
                <p>Cows can’t walk down stairs?</p>
                    <input id ="true" type="radio" name="cow" value="true">
                    <label for="true">True</label>
                    <input id="false" type="radio" name="cow" value="false">
                    <label for="false">False</label>
                    <input type="submit" value="Submit" name="submit">
                
                    <?php 
                        if($_GET['cow'] == 'true') {
                            echo"Wrong";
                        }
                        else if($_GET['cow'] == 'false') {
                            echo"Correct";
                        }
                    ?>
            </section>
            </form>
        </main>
        
        <footer>
            
        </footer>
    </body>
</html>