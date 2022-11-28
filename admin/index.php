<?php
include './view/sections/header.php';

include '../module/connectDb.php';
include '../module/getAllTableData.php';
include '../module/getTableKeys.php';
include '../module/function.php';
$page = '';
$db = connectDb();


if (isset($_GET['page'])) {
	$page = $_GET['page'];
	if($_GET['page'] !== 'lich_chieu') {
		$tableData = getAllTableData($page);
		$keys = getTableKeys();
	}
}
if (!isset($_SESSION['admin'])) {
	$page = 'login';
}
switch ($page) {
	case '':
		include './view/pages/home.php';
		break;
	case 'lich_chieu':
		include './view/pages/lich_chieu.php';
		break;
	case 'login':
		header('Location: ../view/login.php');
		break;
	default:
		include './view/pages/page.php';
		break;
}
include './view/sections/footer.php';
?>