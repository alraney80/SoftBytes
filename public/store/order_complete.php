<?php require_once('../../private/initialize.php'); ?>

<?php

if(isset($_POST['complete'])) {
    if(isset($_SESSION['first_name'])) {
        $total = $_GET['total'] ?? '1';
        $order_id = makeOrder($total);
        emptyCart();
        redirect_to('order_complete.php?order_id=' . $order_id);
    }
    else{
        redirect_to('login.php?user=0');
    }
}

$order_id = $_GET['order_id'] ?? '1';


?>

<?php include(SHARED_PATH . '/store_header.php'); ?>

<title>Our Store</title>
</head>

<?php include(SHARED_PATH . '/navigation.php'); ?>

<!doctype html>

<main role="main">
    <section class="jumbotron text-center" style="background-image: url('../images/webpage-background-3.jpg')">
        <div class="container">
            <h1 class="jumbotron-heading">Thank you for your order!</h1>
			<h2>Order Number: <?php echo $order_id; ?></h2>
        </div>
    
<?php include(SHARED_PATH . '/store_footer.php'); ?>
</section>
</main>
        