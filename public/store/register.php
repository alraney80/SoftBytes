<?php require_once('../../private/initialize.php'); ?>



<?php
  
    

#ini_set('display_errors', 1);
#ini_set('display_startup_errors', 1);
#error_reporting(E_ALL);
    
    $validated = false;
    
    #if the user is logged in we will redirect to the home page
    # and set the session variables for name, password, and email
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        //echo "I have posted";
       
        $result = try_register($_POST['email'], $_POST['password'], $_POST['first_name'], $_POST['last_name'], $_POST['address_line_one'], $_POST['address_line_two'], $_POST['city'], $_POST['state'], $_POST['zip']);
        
       
        if($result){
            $validated = true;
            $_SESSION['first_name'] = $_POST['first_name'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['role'] = "user";
            $_SESSION['last_name'] = $_POST['last_name'];
            $_SESSION['city'] = $_POST['city'];
            $_SESSION['state'] = $_POST['state'];
            $_SESSION['zip'] = $_POST['zip'];
            #this will redirect to the homepage
            redirect_to("/index.php");
           exit();
        }        

        
    }

?>





<?php include(SHARED_PATH . '/store_header.php'); ?>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../css/album.css" rel="stylesheet">
</head>
<?php include(SHARED_PATH . '/navigation.php'); ?>
<body>

<main role="main">
    <section class="jumbotron text-center" style="background-image: url('../images/webpage-background-3.jpg')">
    <div class = "container">
    <h3>SoftBytes Registration Form</h3>
    <form method="post" action="/public/store/register.php">
  <div class="form-group">
<!--    <label for="exampleInputEmail1">Email address</label>-->
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" required>
<!--    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
  </div>
  <div class="form-group">
<!--    <label for="exampleInputPassword1">Password</label>-->
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
  </div>
  <div class="form-group">
<!--    <label for="firstname">First Name</label>-->
    <input name="first_name" type="text" class="form-control" id="firstname" placeholder="First Name" required>
  </div>
  <div class="form-group">
<!--    <label for="lastname">Last Name</label>-->
    <input name="last_name" type="text" class="form-control" id="lastname" placeholder="Last Name" required>
  </div>
  <div class="form-group">
<!--    <label for="addresslineone">Address Line One</label>-->
    <input name="address_line_one" type="text" class="form-control" id="addresslineone" placeholder="Address Line One" required>
  </div>
  <div class="form-group">
<!--    <label for="addresslinetwo">Address Line Two</label>-->
    <input name="address_line_two" type="text" class="form-control" id="addresslinetwo" placeholder="Address Line Two">
  </div>
  <div class="form-group">
<!--    <label for="City">City</label>-->
    <input name="city" type="text" class="form-control" id="City" placeholder="City" required>
  </div>
  <div class="form-group">
<!--    <label for="State">State</label>-->
    <input name="state" type="text" class="form-control" id="State" placeholder="State">
  </div>
  <div class="form-group">
<!--    <label for="Zip">Zip Code</label>-->
    <input name="zip" type="text" class="form-control" id="Zip" placeholder="Zip Code" required>
  </div>
  <button type="submit" class="btn btn-info">Register</button>
</form>
        
    <?php if($validated == false && $_SERVER["REQUEST_METHOD"] == "POST"){
        echo "<p>ERROR: Please make sure you fill out all fields in the form.</p>";
    }
    ?>
    

<?php include(SHARED_PATH . '/store_footer.php'); ?>
        </div>
    </section>
    </main>