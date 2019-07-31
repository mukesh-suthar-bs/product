<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Blogs</title>
    <?php include 'header_link.php'; ?>
    <link rel="stylesheet" type="text/css" href="css\login.css">
</style>
</head>
<body>

    <?php include 'header.php'; ?>
    <?php
    if (empty($_SESSION['username'])) {
        
        header('location:login.php');
    }
    include'connection.php';
    include 'query.php';
    $blogTable = new TableData('blogs',$conn);
    ?>
    <!--form-->
    <?php 
    $blogid = $_GET['id'];
    include 'connection.php';
      $result = $blogTable->select(array(
      'where' => array(
        'blog_id' => $blogid
      )
    ));
    if (mysqli_num_rows($result) > 0) {
        
        while($row = mysqli_fetch_assoc($result)) {
            
            ?> 

            <main class="login-form">
                <div class="cotainer" style="margin-top: 60px;">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Blogs</div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-group row">
                                            <label for="Entry Title<" class="col-md-4 col-form-label text-md-right">Entry Title</label>
                                            <div class="col-md-6">
                                                <input type="text" id="Entry_Title<" class="form-control" name="title" value="<?php echo $row['title']; ?> " required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Short Description" class="col-md-4 col-form-label text-md-right">Short Description</label>
                                            <div class="col-md-6">
                                                <input type="text" id="Description" class="form-control" value="<?php echo $row['short_des']; ?>" name="short_desc" required >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Main_Image" class="col-md-4 col-form-label text-md-right">Main Image</label>
                                            <div class="col-md-6">
                                                <input type="file" id="image" name="Main-Image" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Category" class="col-md-4 col-form-label text-md-right">Category</label>
                                            <div class="col-md-6">
                                                <select name="cat" >
                                                    <option>Fitness</option>
                                                    <option>Hardwork</option>
                                                    <option>Exersice</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Long Description" class="col-md-4 col-form-label text-md-right">Long Description</label>
                                            <div class="col-md-6">
                                                <textarea  id="long-desc" class="form-control"  name="long_desc" required ><?php echo $row['long_des']; ?></textarea> 
                                            </div>
                                        </div>

                                        <div class="col-md-6 offset-md-4">
                                            <button type="Edit" name="Edit" class="btn btn-dark">
                                                Edit
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
    <?php
}
} else {
    echo "0 results";
}

mysqli_close($conn);
?>     

<?php include 'footer.php'; ?>

</body>
</html>
<?php 
 include 'connection.php';
if (isset($_POST['Edit'])) {
    $title = htmlspecialchars(trim($_POST['title']), ENT_QUOTES);
    $sdec = htmlspecialchars(trim($_POST['short_desc']), ENT_QUOTES);
    $ldec = htmlspecialchars(trim($_POST['long_desc']), ENT_QUOTES);
    $cat = trim($_POST['cat']);
    
    if ($title =="") {
        echo '<script language="javascript">';
        echo 'alert("You did not enter a Title.")';
        echo '</script>';
        
    }
    elseif ($sdec =="") {
        echo '<script language="javascript">';
        echo 'alert("You did not enter a Short Description.")';
        echo '</script>';
    }
    elseif ($ldec =="") {
      echo '<script language="javascript">';
      echo 'alert("You did not enter Long Description.")';
      echo '</script>';
  }
  elseif ($cat == "") {
    echo '<script language="javascript">';
    echo 'alert("Please enter category.")';
    echo '</script>';
}
else{

    $result = $blogTable->rowUpdate(array(
                              'title' => $title,
                              'short_des' => $sdec,
                              'category' => $cat,
                              'long_des' => $ldec
                            ),array('blog_id' =>$blogid));

    if ($result) {
     // echo "New record created successfully";
        echo '<script language="javascript">';
        echo 'alert("Blog Edit Successfully")';
        echo '</script>';

        header("location:manageblog.php");
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
}
}
?>
