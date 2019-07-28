<?php require_once('../../private/initialize.php'); ?>
<?php
        session_unset();
        session_destroy();
        redirect_to('/index.php');
?>