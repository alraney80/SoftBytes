<?php require_once('../../private/initialize.php'); ?>

<?php
    delete_product($_POST['id']);

   redirect_to('admin.php');
?>

<h1>You here this</h1>