<?php require_once('../../private/initialize.php'); ?>

<!doctype html>

<?php

$count = sizeof($_SESSION['cart']);
$subtotal = 0;
$tax = 0;
$total = 0;

if(isset($_POST['remove'])) {
    $id = $_GET['id'] ?? '1';
	$result = removefromCart($id);
    
	if($result == 0) {
		redirect_to('/public/store/product_list.php');
	}
	else {
		redirect_to('/public/store/cart.php');
	}
}

?>
 
<?php include(SHARED_PATH . '/store_header.php'); ?>

<title>Cart</title>
</head>

<?php include(SHARED_PATH . '/navigation.php'); ?>

<main role="main">
    <section class="jumbotron text-center" style="background-image: url('../images/webpage-background-3.jpg')">
        <div class="container">
            <h1 class="jumbotron-heading">Shopping Cart</h1>
<!--
        </div>
                </section>
-->
<!--        <div class="container">-->
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col"></th>
                      <th scope="col">Product ID</th>
                      <th scope="col">Item</th>
                      <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($_SESSION['cart'] as $pid) { 
						$item = find_product_by_id($pid); ?>
                    <tr>
                      <td>
                          <form action="<?php echo url_for('public/store/cart.php?id=' . h(u($item['id']))); ?>" method="post">
                            <button class="btn btn-outline-secondary" name="remove">X</button>
                          </form>
                      </td>
                      <td><?php echo h($item['id']); ?></td>
                      <td><?php echo h($item['name']); ?></td>
                      <td><?php echo h($item['price']); ?></td>
                    </tr>
                    <?php    
                        $subtotal = $subtotal+h($item['price']);
                    } ?>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>Subtotal</td>
                        <td>
                            <?php 
                            $subtotal = number_format($subtotal, 2);
                            echo $subtotal; 
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>Tax (8.25%)</td>
                        <td>
                            <?php 
                            $tax = number_format(($subtotal*0.0825), 2);
                            echo $tax; 
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td>Total</td>
                        <td>
                            <?php 
                            $total = number_format(($subtotal+$tax), 2);
                            echo $total; 
                            ?>
                        </td>
                    </tr>
					<tr><td></td><td></td><td></td>
                        <td>
                            <form action="<?php echo url_for('public/store/order_complete.php?total=' . $total); ?>" method="post">
                                <button class="btn btn-info" name="complete">Complete Purchase</button>
                            </form>
                        </td></tr>
                </tbody>
            </table>
     

<?php include(SHARED_PATH . '/store_footer.php'); ?>
</div> 
            </section>
</main>