<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Log In</title>
    <?php include 'header_link.php'; ?>
    <link rel="stylesheet" type="text/css" href="css\login.css">
</head>
<body>

    <?php include 'header.php'; ?>
<?php  
include 'connection.php';
include 'query.php';
$blogTable = new TableData('users',$conn);
ob_start();

if (isset($_SESSION['username'])) {
    header('location:home.php');
}
   
if (isset($_POST['login'])) {
 

    $pass =$_POST['password'];
    $user = $_POST['username'];
    $crpt_pass = md5($pass);
    // $sql = "SELECT * FROM users Where username = '$user' AND password = '$pass'";
    // $result = mysqli_query($conn, $sql);

    $result = $blogTable->select(array(
      'where' => array(
        'username' => $user,
        'password' => $crpt_pass
      )
    ));
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        $_SESSION['is_login'] = 1;
        $_SESSION['username'] = $row['name'];
        $_SESSION['user_id'] = $row['user_id'];
        header('location:home.php');
    }
    else{
       echo '<script language="javascript">';
       echo 'alert("username or password invalid")';
       echo '</script>';
   }


}
?>
    
    <!--form-->
    <main class="login-form">
        <div class="cotainer" style="margin-top: 90px;">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Login</div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                                    <div class="col-md-6">
                                        <input type="text" id="username" value="<?php if(isset($_POST['login'])){ echo $user; } ?>" 
                                        class="form-control" name="username" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" value="<?php if(isset($_POST['login'])){ echo $pass; } ?>"
                                        class="form-control" name="password" required >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="login" name="login" class="btn btn-dark">
                                        Login
                                    </button>
                                    <a href="#" class="btn btn-link-dark">
                                        Forgot Your Password?
                                    </a>
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
