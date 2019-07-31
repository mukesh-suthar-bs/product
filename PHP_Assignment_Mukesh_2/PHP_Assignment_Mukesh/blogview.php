<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>View Blogs</title>
<?php include 'header_link.php'; ?>
<link rel="stylesheet" type="text/css" href="css\blogs.css">
</style>
</head>
<body>
    
<?php include 'header.php'; ?>
<?php 

if (empty($_SESSION['username'])) {
    
    header('location:login.php');
}
include 'connection.php';
 ?>
<div class="container-fluid mr-0" style="margin-top: 90px;">
    <center><h2>Blogs</h2></center>
    <div class="row">
        <div class="col-md-8">
            <?php 
                    $name = $_GET['name'];
                    $blogid = $_GET['id'];
                    $sql = "SELECT * FROM `blogs` WHERE blog_id = $blogid";
                    $result = mysqli_query($conn, $sql);

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
                            <p><b>Created by :</b><?php echo $name; ?></p>
                            <p><b>Short Description :</b> <?php echo $row['short_des']; ?></p><br>
                            <p><b>Long Description :</b><br> <?php echo $row['long_des']; ?></p>
                            <hr>
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
        <div class="col-md-3 card" style="border: 1px solid black; margin: 8px;">
            <h4>RECENT BLOGS</h4>
            <h5>Fitness</h5>
            <p class="overflow">Talk about the ultimate trendy fitness blog that discusses all kind of problems – and Blogilates it is! Cassey Ho</p>
            <h5>Fitness</h5>
            <p class="overflow">Talk about the ultimate trendy fitness blog that discusses all kind of problems – and Blogilates it is! Cassey Ho</p>
            <h5>Fitness</h5>
            <p class="overflow">Talk about the ultimate trendy fitness blog that discusses all kind of problems – and Blogilates it is! Cassey Ho</p><br>

            <h4>POPULAR BLOGS</h4>
            <h5>Hardwork</h5>
            <p class="overflow">If you are a mommy and find it extremely difficult to squeeze in time for a workout, this blog is for you.</p>
            <h5>Hardwork</h5>
            <p class="overflow">If you are a mommy and find it extremely difficult to squeeze in time for a workout, this blog is for you.</p>
            <h5>Hardwork</h5>
            <p class="overflow">If you are a mommy and find it extremely difficult to squeeze in time for a workout, this blog is for you.</p><br>

            <h4>RANDOM BLOGS</h4>
            <h5>Gym</h5>
            <p class="overflow">Fitness is one of the best fitness blogs out there. Steve Kamb is the founder of Nerd Fitness,</p>
            <h5>Gym</h5>
            <p class="overflow">Fitness is one of the best fitness blogs out there. Steve Kamb is the founder of Nerd Fitness,</p>
            <h5>Gym</h5>
            <p class="overflow">Fitness is one of the best fitness blogs out there. Steve Kamb is the founder of Nerd Fitness,</p><br>
        </div>
    </div>
    
</div>
<?php include 'footer.php';?>

</body>
</html>
