<?php  
ob_start();
include 'connection.php';
if (isset($_GET['delete'])) {
    
  $bid = $_GET['delete'];
  
    $sql = "DELETE FROM blogs Where blog_id = $bid";
   
    if (mysqli_query($conn, $sql)) {
          

    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


}
header("location:manageblog.php");
?>