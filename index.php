<?php
  include './module/connectDb.php';
  include './module/getAllTableData.php';
  include './module/getTableKeys.php';
  include './module/utils.php';
  $page = '';
  $db = connectDb();
  
  include './module/function.php';
  
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $keys = getTableKeys();
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
    case 'login':
      header('Location: ./view/login.php');
      break;
  }
  include './view/footer.php';
?>