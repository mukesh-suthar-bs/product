<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile</title>
    <?php include 'header_link.php'; ?>
    <link rel="stylesheet" type="text/css" href="css\login.css">
</head>
<body>

    <?php include 'header.php'; ?>
    <?php 
    if (empty($_SESSION['username'])) {
        
        header('location:login.php');
    }
    include 'connection.php';
    include 'query.php';
    $blogTable = new TableData('users',$conn);
    ?>

    <?php 
    $uid = $_SESSION['user_id'];
    include 'connection.php';
    // $sql = "SELECT * FROM `users` WHERE user_id = $uid";
    $result = $blogTable->select(array(
      'where' => array(
        'user_id' => $uid
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
                                <div class="card-header">Profile</div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-group row">
                                            <label for="first_name" class="col-md-4 col-form-label text-md-right">Name</label>
                                            <div class="col-md-6">
                                                <input type="text" id="first_name" class="form-control" name="name" value="<?php echo $row['name']; ?>" required autofocus >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="user_name" class="col-md-4 col-form-label text-md-right">User Name</label>
                                            <div class="col-md-6">
                                                <input type="text" id="user_name" class="form-control " name="uname" value="<?php echo $row['username']; ?>" required autofocus disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                            <div class="col-md-6">
                                                <input type="email" id="email" class="form-control" value="<?php echo $row['email']; ?>" name="email" required autofocus disabled>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                                            <div class="col-md-6">
                                                <input type="text" id="phone" class="form-control" name="phone" value="<?php echo $row['phone']; ?>" required autofocus pattern="[0-9]{10}" title="Plz enter valid phone no.">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="term"> I have read and agree to <a href="#"><b>term&condition</b></a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 offset-md-4">
                                            <button type="Edit" name="Edit" class="btn btn-dark" name="submit">
                                                Edit
                                            </button>
                                            
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
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);

    
    if ($name =="") {
        echo '<script language="javascript">';
        echo 'alert("You did not enter a first name.")';
        echo '</script>';
        
    }
    elseif (!preg_match("/^[a-zA-Z'-p{L} ]{3,}+$/", $name)) {
          echo '<script language="javascript">';
          echo 'alert("You did not enter a valid name.")';
          echo '</script>';
    } 
  elseif ($phone == "") {
    echo '<script language="javascript">';
    echo 'alert("Please enter number.")';
    echo '</script>';
}
else{
    $result = $blogTable->rowUpdate(array(
                              'name' => $name,
                              'phone' => $phone
                            ),array('user_id' =>$uid));
    if ($result) {
     // echo "New record created successfully";
        $_SESSION['username'] = $name;
        echo '<script language="javascript">';
        echo 'alert("Profile Edit Successfully")';
        echo '</script>';
        header("location:home.php");
    } else {
        echo "Error: " . "<br>" . mysqli_error($conn);
    }
    
}
}


?>
