<?php require_once('../../private/initialize.php'); ?>

<!doctype html>

<?php

$product_set = find_all_products();

?>

<?php include(SHARED_PATH . '/store_header.php'); ?>



<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Admin Portal</title>
</head>

<?php include(SHARED_PATH . '/navigation.php'); ?>
         
<main role="main">
<section class="jumbotron text-center" style="background-image: url('../images/webpage-background-3.jpg')">
    <div class="container">
        <h1 class="jumbotron-heading">Products</h1>
        <br>
        <a class="btn btn-info" onClick = "this.style.visibility= 'hidden'" type="submit" id="submit" role="button">Add Product</a>
        <div id="addproduct" style="display: block; line-height:0; height: 0; overflow: hidden; visibility: hidden;">
        <form method="post" id="addform" action="/public/store/addp.php" enctype="multipart/form-data">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
              </div>
              <input id="pname" name="productname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
            </div>
            
<!--
            <div class="form-group">
                <label for="pname">Product name</label>
                <input name="productname" type="text" class="form-control" id="pname" aria-describedby="emailHelp" placeholder="name" required>
            </div>
-->
            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
                <span class="input-group-text">0.00</span>
              </div>
                <input name="price" type='number' step='0.01' class="form-control" id="prc"  required>
            </div>
<!--
            <div class="form-group">
                <label for="prc">Price</label>
                <input name="price" type='number' step='0.01' value='0.00' placeholder='0.00' class="form-control" id="prc"  required>
            </div>
-->
            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Product Image</span>
              </div>
              <div class="custom-file form-group">
                <label for="pic" class="custom-file-label">Choose Image</label>
                <input id="pic" type="file" class="form-control"  name="image" accept="image/png, image/jpeg" required>
              </div>
            </div>
<!--
            <div class="form-group">
                <label for="pic">Product Picture</label>
                <input id="pic" type="file" class="form-control"  name="image" accept="image/png, image/jpeg" required>
            </div>
-->
            
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Description</span>
              </div>
              <textarea class="form-control" name="description" form="addform" aria-label="With textarea" required></textarea>
            </div>
<br>
        <button type="submit" class="btn btn-info">Create Product</button>
        </form>
        
        
        </div>  
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
                                    <form onsubmit="return confirm('Are sure you want to delete this product?');" method="post" action="<?php echo url_for('public/store/deletep.php');?>">
                                    <input type="hidden" value = <?php echo $product['id']; ?> name="id">
                                    <button type="submit" class="btn btn-danger">Remove Product</button>
                                    </form>
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

<script>
    //This is a quick function to display the add product form
    
    document.getElementById("submit").addEventListener("click", addproduct);
    function addproduct(){
        document.getElementById("addproduct").style =  "visibility: visible";
        document.getElementById("clickme").style = "visibility: hidden";
    }
</script>

<?php include(SHARED_PATH . '/store_footer.php'); ?>

 </main>
