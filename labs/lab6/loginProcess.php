<?php
session_start();  //starts or resumes a session

//verifies that username and password are valid

 include '../../sqlConnection.php';
 $dbConn = getConnection("quotes");

 $username = $_POST['username'];
 $password = sha1($_POST['password']);

//This sql works but allows SQL INJECTION!! (BECAUSE OF THE SINGLE QUOTES)
 $sql = "SELECT * 
         FROM q_admin 
         WHERE username = '$username' 
         AND   password = '$password' ";

//This sql prevents SQL INJECTION!!
 $sql = "SELECT * 
         FROM q_admin 
         WHERE username = :u;
         AND   password = :password ";

 $namedParameters = array();
 $namedParameters[":u"] = $username;
 $namedParameters[":password"] = $password;
         
 //echo $sql;
 $stmt = $dbConn->prepare($sql);
 $stmt->execute($namedParameters);
 $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record
 
 //print_r($record);
 if (empty($record)){
     
     header("location: login.php"); //redirects to another program.
     echo "Error: Wrong Username or Password!!";
     //echo "Welcome" . $_SESSION['adminName'];
     
 } else {

     $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
     
     header("location: main.php"); //redirects to another program.
     
 }
 
 
 
 

?>
  
  

