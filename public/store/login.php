<?php require_once('../../private/initialize.php'); ?>



<?php
    #this is were we include our connection class
    #and start our session
    #this is for debugging
    

#ini_set('display_errors', 1);
#ini_set('display_startup_errors', 1);
#error_reporting(E_ALL);
    
    
    #if the user is logged in we will redirect to the home page
    # and set the session variables for name, password, and email
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        //echo "I have posted";
        
        #echo $_POST['email'];
        #echo $_POST['password'];
        $result = try_login($_POST['email'], $_POST['password']);
        
        if($result != NULL){
            while($row = $result->fetch_assoc()) {
                # echo "name: " . $row["name"]. " - email: " . $row["email"]. " password: " . $row["password"]. "<br>";
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['last_name'] = $row['last_name'];
                $_SESSION['city'] = $row['city'];
                $_SESSION['state'] = $row['state'];
                $_SESSION['zip'] = $row['zip'];
            }
            #Now I am setting the session variables

            #this will redirect to the homepage
            redirect_to("/index.php");
           exit();
        }        


        
    }

?>

<?php
$checkout = $_GET['user'] ?? '1';
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
                <?php if($checkout == 0){ ?>
                    <div class="alert alert-danger" role="alert">
                      Please Login to Complete Checkout
                    </div>
                <?php } ?>

            <h3>SoftBytes Login</h3>
            <form method="post" action="/public/store/login.php">
          <div class="form-group">
<!--            <label for="exampleInputEmail1">Email address</label>-->
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" required>
<!--            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
          </div>
          <div class="form-group">
<!--            <label for="exampleInputPassword1">Password</label>-->
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
          </div>

          <button type="submit" class="btn btn-info">Login</button>
        </form>
            <?php if($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                    <p class="container">Invalid username or password</p>
            <?php } ?>
                <br>
            <h3>Not Registered?</h3>
                <br>
            <a class="btn btn-info" href="/public/store/register.php" role="button">Create Account</a>
           

<?php include(SHARED_PATH . '/store_footer.php'); ?>
                 </div>
        </section>
    </main>