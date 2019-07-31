<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Create Blogs</title>
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
    include 'connection.php';
    include 'query.php';
    $blogTable = new TableData('blogs',$conn); 
?>
<!--form-->
<main class="login-form">
    <div class="cotainer" style="margin-top: 60px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Blogs</div>
                    <div class="card-body">
                        <form action="blogcreate.php" method="POST">
                            <div class="form-group row">
                                <label for="Entry Title<" class="col-md-4 col-form-label text-md-right">Entry Title</label>
                                <div class="col-md-6">
                                    <input type="text" id="Entry_Title<" class="form-control" name="title" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Short Description" class="col-md-4 col-form-label text-md-right">Short Description</label>
                                <div class="col-md-6">
                                    <input type="text" id="Description" class="form-control" name="short_desc" required >
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
                                    <select name="cat">
                                        <option>Fitness</option>
                                        <option>Hardwork</option>
                                        <option>Exersice</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Long Description" class="col-md-4 col-form-label text-md-right">Long Description</label>
                                <div class="col-md-6">
                                    <textarea  id="long-desc" class="form-control" name="long_desc" required ></textarea> 
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="submit" class="btn btn-dark">
                                    Save
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
<?php include 'footer.php'; ?>

</body>
</html>

<?php 
if (isset($_POST['submit'])) {
    $title = htmlspecialchars(trim($_POST['title']), ENT_QUOTES);
    $sdec = htmlspecialchars(trim($_POST['short_desc']), ENT_QUOTES);
    $ldec = htmlspecialchars(trim($_POST['long_desc']), ENT_QUOTES);
    $cat = htmlspecialchars(trim($_POST['cat']), ENT_QUOTES);
    $uid = $_SESSION['user_id'];


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
else {
  

    $result = $blogTable->insertData(array(
                              'user_id' => $uid,
                              'title' => $title,
                              'short_des' => $sdec,
                              'category' => $cat,
                              'long_des' => $ldec
                            ));
//     $sql = "INSERT INTO blogs(user_id, title, short_des, category, long_des)
// VALUES ('$uid', '$title', '$sdec', '$cat', '$ldec')";

if ($result) {
                header('location:manageblog.php');
            } else {
                echo  "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
    
}
}

 ?>