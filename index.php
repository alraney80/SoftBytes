<?php require_once('private/initialize.php'); ?>

<?php include(SHARED_PATH . '/store_header.php'); ?>

<title>SoftBytes</title>
</head>

<?php include(SHARED_PATH . '/navigation.php'); ?>

<!doctype html>

<main role="main">
    <div class="jumbotron jumbotron-fluid" style="background-image: url('public/images/webpage-background-3.jpg')">
        <div class = "container">

<?php if(isset($_SESSION['first_name'])) { ?>
<!--        	<div class="jumbotron" style="background-image: url('public/images/webpage-background-3.jpg')">-->
      
              <div class="col-md-6 col-lg-7 align-self-center">
                <div class="slider-caption">
                  <h1><?php echo "Thank you, " . $_SESSION['first_name'] . "."; ?></h1>
                 <br> <br> <br><br><br><br><br><br><br><br><br><br><br><br>

<!--                  <a class="btn btn-info btn-lg" href="/public/store/logout.php" role="button">Logout</a>-->
                </div>
              </div>
<!--            </div>-->

<?php } else { ?>
<!--        	<div class="jumbotron" style="background-image: url('public/images/webpage-background-3.jpg')">-->
              <div class="col-md-6 col-lg-7 align-self-center">
                <div class="slider-caption">
                  <h1>Welcome to SoftBytes</h1>
                    <br>
                  <p>Take a look around and browse our fine selection of software products.</p>
                    <br><br><br><br><br><br><br><br><br><br><br>
                </div>
              </div>
<!--            </div>-->

<?php } ?>




<?php include(SHARED_PATH . '/store_footer.php'); ?>
            </div>
    </div>
</main>