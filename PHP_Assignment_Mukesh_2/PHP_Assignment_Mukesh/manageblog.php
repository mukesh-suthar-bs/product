  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manage Blog</title>

    <?php include 'header_link.php'; ?>
  </head>
  <body>

    <?php include 'header.php'; ?>
    <?php 
    if (empty($_SESSION['username'])) {

      header('location:login.php');
    }
    include 'connection.php';
    include 'query.php';
    $blogTable = new TableData('blogs',$conn);  
    ?>
    <div class="container-fluid" style="margin-top: 90px;">
     <center><h2>Blogs</h2></center>
     <center><h5><b>Manage Blogs</b></h5><br></center><hr>
     <?php 

     if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
    } else {
      $pageno = 1;
    }
    $no_of_records = 3;
    $offset = ($pageno-1) * $no_of_records;

    $uid = $_SESSION['user_id'];
                              // $total_pages_sql = "SELECT COUNT(*) FROM blogs WHERE user_id = $uid";
    $result = $blogTable->rowCount(array(
      'where' => array(
        'user_id' => $uid
      )
    ));
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records);

                              // $sql = "SELECT * FROM `blogs`WHERE user_id = $uid LIMIT $no_of_records OFFSET $offset";

    $result = $blogTable->select(array(
      'limit' => $no_of_records,
      'offset' => $offset,
      'where' => array(
        'user_id' => $uid,
      )
    ));

    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {

        ?>

        <div class="row">
          <div class="col-md-2">
            <img src="image/fit.jpg" style="width: 90px; height: 100px;float: right;">
          </div>
          <div class="col-md-8">
            <h4><?php echo $row['title']; ?></h4>
            <p><b>Category :</b><?php echo $row['category']; ?></p>
            <p><b>Short Description :</b> <?php echo $row['short_des']; ?></p>
          </div>
          <div class="col-md-2">
            <p><a href="editblog.php?id=<?php echo $row['blog_id']; ?>">Edit</a></p>
            <p><a href="delete.php?id=<?php  echo $row['blog_id']; ?>" data-toggle="modal" data-target="#myModal">Delete</a></p>
            <p><a href="blogview.php?id=<?php echo $row['blog_id']; ?>&name=<?php echo $_SESSION['username']; ?>">View</a></p>
          </div>       
        </div><br><hr>

        <!--Model-->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" value="" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">
                <form action="delete.php" method="">
                  <?php echo "Do you want to delete"; ?> 
                </div>
                <div class="modal-footer">
                  <button type="delete" name="delete" value="<?php echo $row['blog_id']; ?>" class="btn btn-default">Yes</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
              </form>
            </div>

          </div>
        </div>

        <?php
      }
    } else {
      echo "0 results";
    }

    mysqli_close($conn);
    ?>       
  </div>
  <div>
    <label>page <?php echo $pageno; ?> of <?php echo $total_pages; ?></label>
  </div>      
  <div class="text-xs-center"> 
    <ul class="pagination justify-content-center">
      <?php if($pageno > 1) : ?>
        <li><a class="page-link" href="?pageno=1">First</a></li>
        <li>
          <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
      <?php endif; ?>
      <?php for($i=$pageno-1;$i<=$pageno+1;$i++){
        if($i>=1 && $i<=$total_pages){ ?>
          <a  class="page-link" href="<?php if($pageno > $total_pages){ echo '#'; } else { echo "?pageno=$i"; } ?>"><?php echo $i; ?></a>
        <?php } 
      } ?>
      <?php if($pageno < $total_pages): ?>
        <li>
          <a class="page-link" href="<?php if($pageno > $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
      <?php endif ?>
    </ul>
  </div>

  <?php include 'footer.php';?>

</body>
</html>
