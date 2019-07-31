<?php 
session_start();
ob_start();
?>
	<!--navbar-->
<div class="bs-example"  style="width:100%">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a href="home.php" class="navbar-brand"><img src="image\akhada.png" alt="logo"></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ml-auto">
                <a href="home.php" class="nav-item nav-link text-light">Home</a>
                <a href="about.php" class="nav-item nav-link text-light">About us</a>
               <?php if (!empty($_SESSION['is_login'])) : ?>
                <div class="dropdown">
				  <a href="#" class="nav-item nav-link dropdown-toggle text-light"id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Blogs
				  </a>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				    <a class="dropdown-item" href="blogcreate.php">Create blog</a>
				    <a class="dropdown-item" href="manageblog.php">Manage blog</a>
				    <a class="dropdown-item" href="browseblog.php">Browse blog</a>
				  </div>
				</div>
                <?php endif; ?>
                <a href="contact.php" class="nav-item nav-link text-light">Contact us</a>
                 <?php if (empty($_SESSION['is_login'])) : ?>
                <a href="login.php" class="nav-item nav-link text-light">Login</a>
                <a href="signup.php" class="nav-item nav-link text-light">Sign up</a>
                  <?php else: ?>
                <div class="dropdown">
                      <a href="#" class="nav-item nav-link dropdown-toggle text-light"id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hi, <?php echo $_SESSION['username']; ?>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <a class="dropdown-item" href="changepass.php" >Change Password</a>
                        <a class="dropdown-item" href="logout.php" >Logout</a>
                      </div>
                </div>
                <?php endif; ?>
            </div>
          
        </div>
    </nav>
</div>
<!--navbar end-->
