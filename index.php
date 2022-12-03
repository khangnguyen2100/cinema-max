<?php
  include_once './module/connectDb.php';
  include './module/getAllTableData.php';
  include './module/getTableKeys.php';
  include_once './module/function.php';
  $page = '';
  $db = connectDb();
  
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }
  
  include './view/header.php';
  switch ($page) {
    case '':
      include './view/home.php';
      break;
    case 'movie':
    	include './view/movie.php';
    	break;
    case 'seats':
    	include './view/seats.php';
    	break;
    case 'rap':
    	include './view/rap.php';
    	break;
    case 'bill_confirm':
    	include './view/bill_confirm.php';
    	break;
    case 'user':
    	include './view/user.php';
    	break;
    case 'successful':
    	include './view/successful.php';
    	break;
    case 'login':
      header('Location: ./view/login.php');
      break;
  }
  include './view/footer.php';
?>