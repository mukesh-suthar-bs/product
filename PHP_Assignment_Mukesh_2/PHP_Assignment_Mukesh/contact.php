<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact Us</title>
    <?php include 'header_link.php'; ?>
    <link rel="stylesheet" type="text/css" href="css\login.css">
</head>
<body>
    
    <?php include 'header.php'; ?>

    <main class="login-form">
        <div class="cotainer" style="margin-top: 60px;">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Contact us</div>
                        <div class="card-body">
                            <form action="contact.php" method="POST">
                                <div class="form-group row">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="first_name" class="form-control" name="fname" required autofocus >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="last_name" class="form-control" name="lname" required autofocus >
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                    <div class="col-md-6">
                                        <input type="email" id="email" class="form-control" name="email" required autofocus pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                                    <div class="col-md-6">
                                        <input type="text" id="phone" class="form-control" name="phone" required autofocus pattern="[0-9]{10}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="subject" class="col-md-4 col-form-label text-md-right">Subject</label>
                                    <div class="col-md-6">
                                        <textarea type="text" id="subject" class="form-control" name="subject" required autofocus></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" name="submit" class="btn btn-dark">
                                        Save
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
$blogTable = new TableData('contact',$conn);
if (isset($_POST['submit'])) {
 
    $subject = trim($_POST['subject']);
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
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
    elseif ($subject =="") {
        echo '<script language="javascript">';
        echo 'alert("You did not enter a subject.")';
        echo '</script>';
    }
    elseif ($phone == "") {
        echo '<script language="javascript">';
        echo 'alert("Please enter number.")';
        echo '</script>';
    }
    elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
          echo '<script language="javascript">'; 
          echo 'alert("invalid phone no.")';
          echo '</script>';
    }
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
else {

//     $sql = "INSERT INTO contact(name, email, phone, subject)
// VALUES ('$name', '$email', '$phone', '$subject')";
    $result = $blogTable->insertData(array(
      'name' => $name,
      'email' => $email,
      'phone' => $phone,
      'subject' => $subject
  ));
    if ($result) {
       echo '<script language="javascript">';
       echo 'alert("Message sents")';
       echo '</script>';
   } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

}

?>