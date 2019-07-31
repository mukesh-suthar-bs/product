<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up</title>
    <?php include 'header_link.php'; ?>
    <link rel="stylesheet" type="text/css" href="css\login.css">
    <style type="text/css" >
      .errorMsg{border:1px solid red; }
      .message{color: red; font-weight:bold; }
  </style>
</head>
    <?php include 'header.php'; ?>
    <?php 
    if (isset($_SESSION['username'])) {
        
        header('location:home.php');
    }
    
    ?>
<?php 
include 'connection.php';
include 'query.php';
$blogTable = new TableData('users',$conn);
if (isset($_POST['submit'])) {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $uname = trim($_POST['uname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['Comfirm']);
    $phone = trim($_POST['phone']);
    $name = $fname .' '. $lname;
    


    if ($fname =="") {
        echo '<script language="javascript">';
        echo 'alert("You did not enter a first name.")';
        echo '</script>';
        
    }
    elseif (!preg_match("/^[a-zA-Z'-]{3,}+$/", $fname)) {
          echo '<script language="javascript">';
          echo 'alert("You did not enter a valid Firstname.")';
          echo '</script>';
    } 
    elseif ($lname =="") {
        echo '<script language="javascript">';
        echo 'alert("You did not enter a last name.")';
        echo '</script>';
    }
    elseif (!preg_match("/^[a-zA-Z'-]{3,}+$/", $lname)) {
          echo '<script language="javascript">';
          echo 'alert("You did not enter a valid Lastname.")';
          echo '</script>';
    }
    elseif ($uname =="") {
      echo '<script language="javascript">';
      echo 'alert("You did not enter username.")';
      echo '</script>';
  }
  elseif (!preg_match("/^[a-zA-Z0-9]{8,}$/", $uname)) {
          echo '<script language="javascript">';
          echo 'alert("username must have lenght 8 amd it is in alphbate and numbers only ")';
          echo '</script>';
    }
  elseif ($phone == "") {
    echo '<script language="javascript">';
    echo 'alert("Please enter number.")';
    echo '</script>';
}
  //check if the number field is numeric
elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
          echo '<script language="javascript">';
          echo 'alert("invalid phone no.")';
          echo '</script>';
}
elseif ($password == "") {
    echo '<script language="javascript">';
    echo 'alert("Please enter password.")';
    echo '</script>';
    
}
elseif (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $password)) {
          echo '<script language="javascript">';
          echo 'alert("Password must contain 8 characters of letters,at least one uppercase latter, numbers and at least one special character.")';
          echo '</script>';
}
elseif ($confirm_password == "") {
    echo '<script language="javascript">';
    echo 'alert("Please enter confirm password.")';
    echo '</script>';
    
}
elseif ($password != $confirm_password) {
    echo '<script language="javascript">';
    echo 'alert("password not match.")';
    echo '</script>';
    
}
  //check if email field is empty
elseif ($email == "") {
    echo '<script language="javascript">';
    echo 'alert("You did not enter a email.")';
    echo '</script>';
    
} //check for valid email 
elseif (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
  echo '<script language="javascript">';
  echo 'alert("You did not enter a valid email.")';
  echo '</script>';
  
}
else{

    $result1 = $blogTable->select(array(
      'where' => array(
        'username' => $uname
      )
    ));
    $result2 = $blogTable->select(array(
      'where' => array(
        'email' => $email
      )
    ));
    if (mysqli_num_rows($result1)>0) {
        echo '<script language="javascript">';
        echo 'alert("username already taken")';
        echo '</script>';
    }
    elseif (mysqli_num_rows($result2)>0) {
        echo '<script language="javascript">';
        echo 'alert("Email already taken")';
        echo '</script>';
    } else {
        $encrypt_pass = md5($password);
        $result = $blogTable->insertData(array(
          'name' => $name,
          'username' => $uname,
          'email' => $email,
          'password' => $encrypt_pass,
          'phone' => $phone));
        //     $sql = "INSERT INTO users(name, username, email, password, phone)
        // VALUES ('$name', '$uname', '$email', '$encrypt_pass', '$phone')";

        if ($result) {
            echo '<script language="javascript">';
            echo 'alert("message successfully sent")';
            echo '</script>';
            header("location: login.php");
        } else {
            echo "Error: " . "<br>" . mysqli_error($conn);
        }
    }
    
      
}

}
?>
<body>


    <main class="login-form">
        <div class="cotainer" style="margin-top: 60px;">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Sign up</div>
                        <div class="card-body">
                            <form action="signup.php" method="POST">
                                <div class="form-group row">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="first_name" value="<?php if(isset($_POST['submit'])){ echo $fname; } ?>" class="form-control" name="fname" required autofocus >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="last_name" value="<?php if(isset($_POST['submit'])){ echo $lname; } ?>" class="form-control" name="lname"  autofocus required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">User Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="user_name" value="<?php if(isset($_POST['submit'])){ echo $uname ;} ?>" class="form-control" name="uname" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                    <div class="col-md-6">
                                        <input type="email" id="email" value="<?php if(isset($_POST['submit'])){ echo $email; } ?>" class="form-control" name="email" autofocus required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" value="<?php if(isset($_POST['submit'])){ echo $password; } ?>" class="form-control" name="password"autofocus required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="comfirm_password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                    <div class="col-md-6">
                                        <input type="password" value="<?php if(isset($_POST['submit'])){ echo $confirm_password ;} ?>" id="confirm_password" class="form-control" name="Comfirm" required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                                    <div class="col-md-6">
                                        <input type="text" id="phone" value="<?php if(isset($_POST['submit'])){ echo $phone; } ?>" class="form-control" name="phone" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="term" required> I have read and agree to <a href="#"><b>term&condition</b></a>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark" name="submit">
                                        Signup
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

