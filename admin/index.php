<?php
include './view/sections/header.php';

include '../module/connectDb.php';
include '../module/getAllTableData.php';
include '../module/getTableKeys.php';
include '../module/utils.php';
$page = '';
$db = connectDb();

if (isset($_GET['page'])) {
	$page = $_GET['page'];
	$tableData = getAllTableData($page);
	$keys = getTableKeys();
}
// if ($_SESSION['adminLoginState'] == false) {
// 	$page = 'login';
// }
switch ($page) {
	case '':
		include './view/pages/home.php';
		break;
	// case 'category':
	// 	include './view/pages/category.php';
	// 	break;
	// case 'movie':
	// 	include './view/pages/movie.php';
	// 	break;
	// case 'bill':
	// 	include './view/pages/bill.php';
	// 	break;
	// case 'theader':
	// 	include './view/pages/theader.php';
	// 	break;
	// case 'user':
	// 	include './view/pages/user.php';
	// 	break;
	case 'login':
		header('Location: ./view/pages/login.php');
		break;
	default:
		include './view/pages/page.php';
		break;
}
include './view/sections/footer.php';
?>