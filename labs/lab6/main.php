<?php
session_start();

if (!isset($_SESSION['adminName'])) { //validates whether the admin has logged in
    
    header("Location: login.php");
    
}

include '../../sqlConnection.php';
$dbConn = getConnection("quotes");

function displayAllAuthors(){
    global $dbConn;
    
    $sql = "SELECT authorId, firstName, lastName, country
              FROM q_author
              ORDER BY lastName";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $authors = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
    foreach ($authors as $author) {
        
    
        echo "<a   class='btn btn-primary' role='button' href='updateAuthor.php?authorId=".$author['authorId']."'>update</a> ";
        //echo "[<a href='deleteAuthor.php'>delete</a>] ";
        echo "<form action='deleteAuthor.php'  onsubmit='return confirmDelete()'  >";
        echo "  <input type='hidden' name='authorId' value='".$author['authorId']."' >";
        echo "  <button class='btn btn-outline-danger' type='submit'>Delete</button>";
        echo "</form> ";
        echo "<a onclick='openModal()' target='authorModal'  href='authorInfo.php?authorId=".$author['authorId']."'> " . $author['lastName'] . "  " . $author['firstName'] . "</a>  ";
        echo $author['country'] . "<br><br>";
        
        
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section </title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        
        <style>
            
            form {
                display:inline-block;
            }
            
        </style>
        
        <script>
            
                function confirmDelete() {
                   return confirm("Do you really want to delete this author?");
                }            
                
                function openModal() {
                    
                    $('#myModal').modal("show");
                    
                }
                
        </script>
        
    </head>
    <body>

        <h1>  Admin Section</h1>
        Welcome <?= $_SESSION['adminName'] ?>
        
        <br><hr><br>
        <form action="addAuthor.php">
            <input type="submit" name="addAuthor" value="Add New Author"/>
        </form>
        <form action="logout.php">
            <input type="submit" name="logout" value="Logout"/>
        </form>
        <br /> <br />
        
        <?=displayAllAuthors()?>
        
        
        

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Author Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe name="authorModal" width='450'height='200'></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    </body>
</html>