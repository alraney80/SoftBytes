<?php 

    $item_count = sizeof($_SESSION['cart']);
    #checking for the admin role
    if(isset($_SESSION['role']))
    {
        $role = $_SESSION['role'];
    }
    else 
    {
        $role = "user";
    }

	
?>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo url_for('/index.php'); ?>">SoftBytes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo url_for('/public/store/product_list.php'); ?>">Products <span class="sr-only">(current)</span></a>
                </li>

                <?php if($item_count != '0') { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo url_for('public/store/cart.php'); ?>">View Cart   <span class="badge badge-light"><?php echo $item_count ?></span>
                        <span class="sr-only">unread messages</span></a>
                    </li>
                <?php } ?>
                <?php if($role == 'admin') { ?>
                <li class="nav-item active">
                        <a class="nav-link" href="<?php echo url_for('public/store/admin.php'); ?>">Edit Products</a>
                </li>
                <?php } ?>
                

                
                
                <?php if(!isset($_SESSION['first_name'])) {?>
					<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="https://example.com/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login/Register</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						      <a class="dropdown-item" href="<?php echo url_for('public/store/login.php'); ?>">Login</a>
                              <a class="dropdown-item" href="<?php echo url_for('public/store/register.php'); ?>">Register</a>
                        </div>
					</li>
				<?php }else{ ?>
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo url_for('public/store/logout.php'); ?> ">Logout<span class="sr-only">(current)</span></a>
					</li>
				<?php } ?>

            </ul>
            <form class="form-inline my-2 my-lg-0" method="post" action="<?php echo WWW_ROOT . "/public/store/search.php"; ?>">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit" >Search</button>
            </form>
        </div>
    </nav>
	
