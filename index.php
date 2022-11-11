<?php
  include './module/connectDb.php';
  include './module/getAllTableData.php';
  include './module/getTableKeys.php';
  include './module/utils.php';
  $page = '';
  $db = connectDb();

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $keys = getTableKeys();
  }
  // if ($_SESSION['adminLoginState'] == false) {
    // 	$page = 'login';
    // }
    
  include './view/header.php';
  switch ($page) {
    case '':
      include './view/home.php';
      break;
    // case 'category':
    // 	include './view/category.php';
    // 	break;
    case 'login':
      header('Location: ./view/login.php');
      break;
  }
  include './view/footer.php';
?>