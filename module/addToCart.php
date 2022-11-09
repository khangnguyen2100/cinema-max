<?php
    include './connectDb.php';
    include './getAllTableData.php';
    $db = connectDb();
    $carts = getAllTableData('cart');
    $productsTable = getAllTableData('product');
    var_dump( $carts);
    if(isset($_POST['add'])) {
      // products first innit
      $products;

      // check isset idCart if not create one
      if(!isset($_SESSION['idCart'])) {
        $_SESSION['idCart'] = uniqid();
        $products = array(
          array('idProduct'=> $_POST['add'], 'amount'=>1)
        );
      } else {
        // get prev products
        // session_destroy();
        $prevProducts;
        foreach ($carts as $key => $value) {
          if($value['id'] == $_SESSION['idCart']) {
            $prevProducts = $value['products'];
          }
        }
        // add new products + prev
        $prevProducts = json_decode($prevProducts, true);
        $isMatch = true;
        $indexPrevMatch;
        foreach ($prevProducts as $key => $prev) {
          if($prev['idProduct'] == $_POST['add']) {
            $prev['amount']++;
            $isMatch = false;
            $indexPrevMatch = $key;
          }
        }
        if($isMatch) {
          $products = array(
            ...$prevProducts,
            array('idProduct'=> $_POST['add'], 'amount'=>1),
          );  
        } else {
          $prevProducts[$indexPrevMatch]['amount']++;
          $products = $prevProducts;
        }
      }

      $id = $_SESSION['idCart'];
      $idProduct = $_POST['add'];
      
      $totalPrice = 0;
      $amountProduct = 0;
      // get totalPrice,amountProduct
      foreach ($products as $key => $product) {
        $totalPrice += $productsTable[ $product['idProduct'] - 1]['specialPrice']*$product['amount'];
        $amountProduct += $product['amount'];
      }
      $isMatch = false;
      foreach ($carts as $key => $cart) {
        if($cart['id'] == $_SESSION['idCart']) {
          $isMatch = true;
        }
      }
      
      if($isMatch) {
        $json =  json_encode($products);
        $sql = "UPDATE cart SET 
        products = '$json', totalPrice = '$totalPrice', amountProduct = '$amountProduct'
        WHERE id = '$id'";
        $db->exec($sql);
      } else {
        $json =  json_encode($products);
        $sql = "INSERT INTO cart (id, idProduct, products, totalPrice, amountProduct)
        VALUES ('$id', '$idProduct', '$json', '$totalPrice', '$amountProduct')";
        $db->exec($sql);
      }
      header('Location: ../index.php?page=cart');
    }
?>