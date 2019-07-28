<?php require_once('../../private/initialize.php');?>

<?php

$id = $_GET['id'] ?? '1';
$product = find_product_by_id($id);

?>

<!doctype html>

<?php include(SHARED_PATH . '/store_header.php'); ?>

<title><?php echo h($product['name']); ?></title>
</head>

<?php

if(isset($_POST['addtocart'])) {
    $return = addtoCart($id); 
?>
<div class="jumbotron jumbotron" style="background-image: url('../images/webpage-background-3.jpg')">
    <div class="container">
        <h2 class="display-4">Added to Cart!</h2>        
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
            <a button class="btn btn-info" href="<?php echo url_for('public/store/product_list.php'); ?>"> Continue Shopping</a>
            <a button class="btn btn-info" href="<?php echo url_for('public/store/cart.php'); ?>">View Cart</a>
            </div>
        </div>
    </div>
</div>
<?php }

?>

<?php include(SHARED_PATH . '/navigation.php'); ?>

<main role="main">
    <section class="jumbotron text-center" style="background-image: url('../images/webpage-background-3.jpg')">
    <div class = "container">

<h1><?php echo h($product['name']); ?></h1>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="text-center">
                <img src="<?php echo h($product['image']); ?> " class="img-fluid" alt="Responsive image">
            </div>
        </div>
        <div class="col">
            <table class="table table-borderless">
                
                <tbody>
                    <tr>
                        <td><?php echo h($product['description']); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo "$";echo h($product['price']); ?></td>
                    </tr>
                    <tr>
                        <form method="post">
                            <td><button class="btn btn-info" name="addtocart">Add to Cart</button></td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include(SHARED_PATH . '/store_footer.php'); ?>

        </div>
    </section>
</main>
</body>

</html> 