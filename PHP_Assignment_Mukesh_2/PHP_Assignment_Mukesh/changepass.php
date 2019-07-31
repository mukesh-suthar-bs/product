
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Change Password</title>
    <?php include 'header_link.php'; ?>
    <link rel="stylesheet" type="text/css" href="css\login.css">
</head>
<body>

<?php include 'header.php'; ?>
<?php 
ob_start();
if (empty($_SESSION['username'])) {

    header('location:login.php');
}

?>

    <main class="login-form">
        <div class="cotainer" style="margin-top: 60px;">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Change Password</div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Old Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password"  required autofocus >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="new_password"required autofocus >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="comfirm_password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="confirm_password" class="form-control" name="Comfirm_password" required >
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="change" name="change" class="btn btn-dark" >
                                        Change
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
<?php include 'footer.php'; ?>

</body>
</html>

<?php 
include 'connection.php';
include 'query.php';
$blogTable = new TableData('users',$conn);
$uid = $_SESSION['user_id'];
// $sql1 = "SELECT * FROM users Where user_id = '$uid'";
$result = $blogTable->select(array(
      'where' => array(
        'user_id' => $uid
      )
    ));
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $old_password = $row['password'];
}else {
   echo '<script language="javascript">';
   echo 'alert("data not found")';
   echo '</script>';
}

if (isset($_POST['change'])) {
    $opass = md5($_POST['password']);
    $newpass = $_POST['new_password'];
    $confirm_pass = $_POST['Comfirm_password'];
    
    // $old_password="";


    if ($opass == "") {
        echo '<script language="javascript">';
        echo 'alert("Please enter old password.")';
        echo '</script>';

    }
    elseif ($newpass == "") {
        echo '<script language="javascript">';
        echo 'alert("Please enter new password.")';
        echo '</script>';

    }
    elseif (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $newpass)) {
          echo '<script language="javascript">';
          echo 'alert("New password must contain 8 characters of letters,at least one uppercase latter, numbers and at least one special character.")';
          echo '</script>';
}
    elseif ($confirm_pass == "") {
        echo '<script language="javascript">';
        echo 'alert("Please enter confirm password.")';
        echo '</script>';

    }
    elseif ($newpass != $confirm_pass) {
        echo '<script language="javascript">';
        echo 'alert("password not match.")';
        echo '</script>';

    }
    elseif ($old_password == $opass) {

        $crpt_pass = md5($newpass);
        // $sql = "UPDATE `users` SET `password` = '$crpt_pass' WHERE `user_id` = $uid";
        $result = $blogTable->rowUpdate(array(
                              'password' => $crpt_pass
                            ),array('user_id' =>$uid));
        if ($result) {
            echo '<script language="javascript">';
            echo 'alert("Password Change Successfully")';
            echo '</script>';
            // header("location:home.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    else {
        echo '<script language="javascript">';
        echo 'alert("Old Password not match")';
        echo '</script>';
    }

}


?>
