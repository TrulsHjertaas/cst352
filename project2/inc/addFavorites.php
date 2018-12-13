<?php
session_start();
    $id = $_GET['id'];
    $controller = true;
    
    for($i = 0; $i < 200; $i++)
    {
        if($_SESSION['favorites'][$i] == $id)
        {
            $controller = false;
            break;
        }
    }
    
    if($controller == true)
    {
        //array_push($_SESSION['favorites'], $id);
        $_SESSION['favorites'][$_SESSION['index']] = $id;
        //print_r($_SESSION['favorites']);
        $_SESSION['index']++;
    }
    
    
    
    print_r($_SESSION['favorites']);
    echo "<br>";
    echo $_SESSION['index'];
    
    
    
    
   header('Location: . ../../../index.php');

?>