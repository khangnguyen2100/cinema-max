<?php
  include './connectDb.php';
  session_start();
  ob_start();
  $db = connectDb();
  if(isset($_POST['submit']) && $_POST['submit']) {
    $input_value = $_POST['search_value'];
    $stmt = $db->prepare("SELECT * FROM product WHERE name LIKE '%$input_value%'");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    $_SESSION['search_data'] = $result;
    header('Location: ../index.php');

  }
?>