<?php 
if (!empty($_GET['location'])) {
    $maps_url = 'https://' .
        'maps.googleapis.com/' .
        'maps/api/geocode/json' .
        '?address=' . urlencode($_GET['location']) . '&key=AIzaSyDJz8e-2UsSHLvY5mQfoR9ivg1hi1idpic';
    
    //$maps_json = file_get_contents($maps_url);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch,CURLOPT_URL, $map_url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
    $maps_json = curl_exec($ch);
    
    
    $map_array = json_decode($maps_json, true);
    
    $lat = $maps_array['results'] [0] ['geometry'] ['location'] ['lat'];
    $lng = $maps_array['results'] [0] ['geometry'] ['location'] ['lng'];
    curl_close($ch);
    $instagram_url = 'https://' .
        'api.instagram.com/v1/media/search' .
        '?lat=' . $lat .
        '&lng=' . $lng .
        '&client_id=ba3dcb7b27cc4488969b72b831b149ea';
        
    //$instagram_json = file_get_contents($instagram_url);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch,CURLOPT_URL, $instagram_url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
    $instagram_json = curl_exec($ch);
    
    
    $instagram_array = json_decode($instagram_json, true);
    
    curl_close($ch);
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Homework 3 - Truls </title>
        <script src="jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="geo.css" type="text/css" />
        <meta charset="UTF-8">
        <meta name="author" content="Truls Hjertaas">
    </head>
    
    <body>
        <header class="topContainer">
            <h1>Image Location</h1>
        </header>
        <section>
            <form action="" method="get">
                <input type="text" name="location"/>
                <input type="submit" value="Submit"/>
            </form>
        </section>
        <main>
            <section class="mainContainer">
                <article class="info">
                    <p>Some text ...</p>
                    <?php 
                    echo $data;
                    ?>
                </article>
                <figure class="imgHolder">
                    <div id="results" data-url="<?php if (!empty($instagram_url)) echo $instagram_url ?>">
                    <?php
                     echo $lat . ' and ' . $lang;
                    if (!empty($instagram_array)) {
                        foreach ($instagram_array['data'] as $image) {
                            echo '<img src="' . $image['images']['low_resolution']['url'] . '" alt=""/><br/>';
                        }
                    }
                    else {
                        echo "dosent work";
                    }
                    ?>
                    </div>
                </figure>
            </section>
        </main>
    </body>
    
</html>