<?php require_once('../../private/initialize.php'); ?>

<!doctype html>

<?php

$product_set = find_all_products();

?>

<?php include(SHARED_PATH . '/store_header.php'); ?>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../css/album.css" rel="stylesheet">

<title>Products</title>
</head>

<?php include(SHARED_PATH . '/navigation.php'); ?>
         
<main role="main">
    <section class="jumbotron" style="background-image: url('../images/webpage-background-3.jpg')">
        <div class="container">
            <h1 class="jumbotron-heading text-center">Products</h1>
<!--            <p class="lead text-muted">Check out our products below!</p>-->
        </div>
    </section>

    
    
    <div class="album py-5 bg-light">
        <div class="container">
            
            <div class="row">
                <?php while($product = mysqli_fetch_assoc($product_set)) { ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top " src="<?php echo h($product['image']); ?> " class="img-thumbnail">
                        <div class="card-body">
                            <p class="card-text"><?php echo h($product['name']); ?></p>
<!--                            <p class="card-text"><?php echo h($product['description']); ?></p>-->
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a button class="btn btn-info" href="<?php echo url_for('public/store/product.php?id=' . h(u($product['id']))); ?>">View Product</a>
                                </div>
                                <small> <?php echo "$";echo h($product['price']); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

<?php mysqli_free_result($product_set); ?>

<?php include(SHARED_PATH . '/store_footer.php'); ?>
    
     </main>
