
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Browse Blogs</title>
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
    <div class="row">
        <div class="col-md-9">
            <?php 



                        if (isset($_GET['pageno'])) {
                            $pageno = $_GET['pageno'];
                        } else {
                            $pageno = 1;
                        }
                        $no_of_records = 3;
                        $offset = ($pageno-1) * $no_of_records;

                        if (isset($_GET['search'])) {

                            $pattern = $_GET['title'];
                            $type = $_GET['type'];

                            $total_pages_sql = "SELECT COUNT(*) FROM `blogs` INNER JOIN users ON blogs.user_id = users.user_id WHERE $type like '%$pattern%'";
                            $result = mysqli_query($conn,$total_pages_sql);
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records);
                            $sql = "SELECT blogs.title,blogs.blog_id, blogs.category, blogs.short_des, users.name FROM `blogs` INNER JOIN users ON blogs.user_id = users.user_id WHERE $type like '%$pattern%' LIMIT $no_of_records OFFSET $offset";

                        }
                        else {
                            $result = $blogTable->rowCount(array());
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records);

                            $sql = "SELECT blogs.title,blogs.blog_id, blogs.category, blogs.short_des, users.name FROM `blogs` INNER JOIN users ON blogs.user_id = users.user_id LIMIT $no_of_records OFFSET $offset";
                        }

                    
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            
                            ?>
                    <div class="row">
                        <div class="col-md-2">
                            <img src="image/fit.jpg" style="width: 90px; height: 100px;float: right;">
                        </div>
                        <div class="col-md-8">
                            <a href="blogview.php?id=<?php echo $row['blog_id']; ?>&name=<?php echo $row['name']; ?>"><h4><?php echo $row['title']; ?></h4></a>
                            <p><b>Category :</b><?php echo $row['category']; ?></p>
                            <p><b>Create By:</b><?php echo $row['name']; ?></p>
                            <p><b>Short Description :</b> <?php echo mb_strimwidth($row['short_des'], 0, 100, "..."); ?></p><hr>
                        </div>
                    </div><br>

            <?php
                           }
                            
            } else {
                echo "0 results";
            }

            mysqli_close($conn);

            ?> 
        </div>
        <div class="col-md-3">
            <main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Blogs</div>
                    <div class="card-body">
                        <form action="" method="">
                            <div class="form-group row">
                                <label for="category" class="col-form-label text-md-right">Search By-</label>
                            </div><div class="form-group row">
                                <div>
                                    <select name="type" value="<?php echo $_GET['type']; ?>" >
                                        <option value="title">Title</option>
                                        <option value="short_des">short description</option>
                                        <option value="long_des">long description</option>
                                        <option value="category">category</option>
                                        <option value="name">Author name</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Category<" class="col-form-label text-md-right"></label>
                            </div>
                            <div class="form-group row">
                                <div>
                                        <input type="text" id="title" class="form-control" name="title" value="<?php if (isset($_GET['title'])) { echo $_GET['title'];} ?>" required autofocus>
                                </div>
                            </div>
                            
                            <div class="col-md-6 offset-md-4">
                                <button type="search" name="search" class="btn btn-dark">
                                    Search
                                </button>
                            
                            </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
        </div>
    </div>
    
</div>
<div>
      <label>page <?php echo $pageno; ?> of <?php echo $total_pages; ?></label>
</div>
<div class="text-xs-center"> 
  <ul class="pagination justify-content-center">
    <?php if($pageno > 1) : ?>
    <li><a class="page-link" href="<?php if(isset($_GET['search'])) {

                            $pattern = $_GET['title'];
                            $type = $_GET['type'];
                            if($pageno <= 1){ echo '#'; } else { echo "?type=$type&title=$pattern&search=&pageno=1"; }} elseif($pageno <= 1){ echo '#'; } else { echo "?pageno=1"; } ?>">First</a></li>
        <li>
            <a class="page-link" href="<?php if(isset($_GET['search'])) {

                            $pattern = $_GET['title'];
                            $type = $_GET['type'];
                            if($pageno <= 1){ echo '#'; } else { echo "?type=$type&title=$pattern&search=&pageno=".($pageno - 1); }} elseif($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
    <?php endif; ?>
       <?php for($i=$pageno-1;$i<=$pageno+1;$i++){
        if($i>=1 && $i<=$total_pages){ ?>
        <a  class="page-link" href="<?php if(isset($_GET['title'])) {

                            $pattern = $_GET['title'];
                            $type = $_GET['type'];
                            if($pageno >= $total_pages){ echo '#'; } else { echo "?type=$type&search=&title=$pattern&pageno=$i"; }} elseif($pageno > $total_pages){ echo '#'; } else { echo "?pageno=$i"; } ?>"><?php echo $i; ?></a>
    <?php 
                }
            }
     ?>
    <?php if ($pageno < $total_pages): ?>
        <li>
            <a class="page-link" href="<?php if(isset($_GET['title'])) {

                            $pattern = $_GET['title'];
                            $type = $_GET['type'];
                            if($pageno >= $total_pages){ echo '#'; } else { echo "?type=$type&search=&title=$pattern&pageno=".($pageno + 1); }} elseif($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a class="page-link" href="<?php if(isset($_GET['search'])) {

                            $pattern = $_GET['title'];
                            $type = $_GET['type'];
                            if($pageno >= $total_pages){ echo '#'; } else { echo "?type=$type&title=$pattern&search=&pageno=$total_pages"; }} elseif($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=$total_pages"; } ?>">Last</a></li>
        <?php endif ?>
  </ul>
</div>
<?php include 'footer.php'; ?>

</body>
</html>
