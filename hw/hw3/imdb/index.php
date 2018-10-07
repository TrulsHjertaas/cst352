<?php 

include('IMDbapi.php');
$imdb = new IMDbapi('8l1u84gbh7DOispMogst8VuolCasnZ');
$data = $imdb->title('batman','json');

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Homework 3 - Truls </title>
        <link rel="stylesheet" href="hw3.css" type="text/css" />
        <meta charset="UTF-8">
        <meta name="author" content="Truls Hjertaas">
    </head>
    
    <body>
        <header class="topContainer">
            <h1>IMDB Search Movie</h1>
        </header>
        <main>
            <section class="mainContainer">
                <article class="info">
                    <p>Some text ...</p>
                    <?php 
                    echo $data;
                    ?>
                </article>
                <figure class="imgHolder">
                    
                </figure>
            </section>
        </main>
    </body>
    
</html>