<?php require_once('../../private/initialize.php'); ?>

<?php
    $result = find_product_by_name($_POST['search']);
    if($result == NULL){
        echo "<script> alert('product not found');</script>";
        redirect_to("/public/store/product_list.php");
    }
    redirect_to(url_for('public/store/product.php?id=' . $result['id']));




?>