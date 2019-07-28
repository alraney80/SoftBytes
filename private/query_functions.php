<?php

  // login queries
  function try_login($email, $password) {
    global $db;
    $sql = "SELECT first_name, last_name, email, password, city, state, zip, role FROM users WHERE email='";
    $sql .= $email;
    $sql .= "' AND password ='";
    $sql .= $password;
    $sql .= "'";
    echo "\n\n";
    $result = mysqli_query($db, $sql);
    echo $sql;
    return $result;
      
  }

  function try_register($email, $password, $first_name, $last_name, $addone, $addtwo, $city, $state, $zip) {
    global $db;
    $sql = "INSERT INTO users ";
    $sql .= "(email, password, first_name, last_name, address_line_one, address_line_two, city, state, zip, role) ";
    $sql .= "VALUES (";
    $sql .= "'" . $email . "',";
    $sql .= "'" . $password . "',";
    $sql .= "'" . $first_name . "',";
    $sql .= "'" . $last_name . "',";
    $sql .= "'" . $addone . "',";
    $sql .= "'" . $addtwo . "',";
    $sql .= "'" . $city . "',";
    $sql .= "'" . $state . "',";
    $sql .= "'" . $zip . "',";
    $sql .= "'" . "user" . "'";
    $sql .= ")";
    echo $sql;
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      
      exit;
    }
  }
  
  function getUserID() {
	  global $db;
	  $l_name = mysqli_real_escape_string($db, $_SESSION['last_name']);
	   $sql = "SELECT id FROM users WHERE last_name='$l_name'";
	   $result = mysqli_query($db, $sql);
	   $user_id = mysqli_fetch_assoc($result);
	   mysqli_free_result($result);
	   return $user_id;
  }


   // products
   function find_all_products() {
    global $db;
     $sql = "SELECT * FROM products ";
    $sql .= "ORDER BY id";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
   function find_product_by_id($id) {
    global $db;
     $sql = "SELECT * FROM products ";
    $sql .= "WHERE id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $product = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $product; // returns an assoc. array
  }

  function find_product_by_name($name){
    global $db;
     $sql = "SELECT * FROM products ";
    $sql .= "WHERE name='" . $name . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $product = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $product;
  }
   function insert_product($product) {
    global $db;
     $sql = "INSERT INTO products ";
    $sql .= "(name, price, description, image) ";
    $sql .= "VALUES (";
    $sql .= "'" . $product['name'] . "',";
    $sql .= "'" . $product['price'] . "',";
    $sql .= "'" . $product['description'] . "',";
    $sql .= "'" . $product['image'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }
  function insert_product2($name, $price, $description, $image) {
    global $db;
     $sql = "INSERT INTO products ";
    $sql .= "(name, price, description, image) ";
    $sql .= "VALUES (";
    $sql .= "\"" . $name . "\",";
    $sql .= "'" . $price . "',";
    $sql .= "\"" . $description . "\",";
    $sql .= "'../images/" . $image . "'";
    $sql .= ")";
    echo $sql;
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }
   function update_product($product) {
    global $db;
     $sql = "UPDATE products SET ";
    $sql .= "name='" . $product['name'] . "', ";
    $sql .= "price='" . $product['price'] . "', ";
    $sql .= "description='" . $product['description'] . "' ";
    $sql .= "image='" . $product['image'] . "' ";
    $sql .= "WHERE id='" . $product['id'] . "' ";
    $sql .= "LIMIT 1";
     $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
   }
   function delete_product($id) {
    global $db;
     $sql = "DELETE FROM products ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
     // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }
  
     //Orders
    function createOrder($price) {
        global $db;
		$user_id = getUserID();
        $sql = "INSERT INTO orders ";
        $sql .= "(customer_id, total_price, created, modified) ";
        $sql .= "VALUES (";
        $sql .= "'" . $user_id['id'] . "',";
        $sql .= "'" . $price . "',";
        $sql .= "CURDATE(),";
        $sql .= "CURDATE()";
        $sql .= ")";
        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
        if($result) {
            $last_id = $db->insert_id;
          return $last_id;
        } else {
          // INSERT failed
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
        }
    }


    function add_to_final_order($product, $order_id){
		global $db;
		$sql = "INSERT INTO order_items ";
		$sql .= "(order_id, product_id) ";
		$sql .= "VALUES (";
		$sql .= "'" . $order_id . "',";
		$sql .= "'" . $product['id'] . "'";
		$sql .= ")";
		$result = mysqli_query($db, $sql);
		// For INSERT statements, $result is true/false
		if($result) {
		  return true;
		} else {
		  // INSERT failed
		  echo mysqli_error($db);
		  db_disconnect($db);
		  exit;
		}
    }


  
   // cart
	function addtoCart($pid) {
		//$product = find_product_by_id($pid);
		array_push($_SESSION['cart'], $pid);
	}
				   
	function removefromCart($pid){
		foreach($_SESSION['cart'] as $key=>$val) {
			if($val == $pid){
				unset($_SESSION['cart'][$key]);
			}
		}
		$count = sizeof($_SESSION['cart']);
		return $count;
	}

	function makeOrder($total) {
		$order_id = createOrder($total);
		foreach($_SESSION['cart'] as $pid){ 
			$item = find_product_by_id($pid);
			add_to_final_order($item, $order_id);
		}
		return $order_id;
	}
	
	function emptyCart() {
		unset($_SESSION['cart']);
	}

 ?>