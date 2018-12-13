<?php
session_start();
    $id = $_GET['id'];
    
    if (($key = array_search($id, $_SESSION['favorites'])) !== false) {
    unset($_SESSION['favorites'][$key]);
}

   header('Location: . ../../../favorites.php');

?>