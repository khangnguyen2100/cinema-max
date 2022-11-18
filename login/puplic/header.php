<?php session_start();
include("function.php")
?>
<!DOCTYPE html>
<html>

<head>
	<title>Big shope A Ecommerce Category Flat Bootstarp Resposive Website Template | Home :: w3layouts</title>
	<link href="public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="public/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'> -->
	<script src="public/js/jquery.min.js"></script>
	<style>
		#register input,
		#login input {
			width: 100%;
			height: 35px;
			border: 1px solid #cdcdcd;
			border-radius: 5px;
		}

		.profile {
			position: relative;
			overflow: hidden;
		}

		.profile:hover {
			overflow: inherit;
		}

		.profiles {
			position: absolute;
			width: 150px;
			top: 20px;
			display: block;
			background-color: #fff;

		}

		.profiles li a {
			color: white;
		}
	</style>
</head>

<body>
	<div class="header">
		<div class="bottom-header">
			<div class="container">
				<div class="header-bottom-left">
					<div class="logo">
						<!-- <a href="index.php"><img src="public/images/logo.png" alt=" " /></a> -->
						<?php
						foreach (selectDb("SELECT * FROM user LIMIT 1") as $row) {
						?>
							<a href="index.php"><img src="public/images/logo-black.png" alt=" " /></a>
						<?php
						}
						?>
					</div>
				</div>
				<div class="header-bottom-right">
					<ul class="login">
						<?php
						if (isset($_SESSION['admin'])) { ?>
							<li class="profile"><a href="#"><?= $_SESSION['admin'] ?></a>
								<ul class=" profiles">
									<li><a href="profile.php?email=<?= $_SESSION['admin'] ?>">Thông tin</a></li> <br>
									<li><a href="logout.php" onclick="return alert('Bạn chắc chắn muốn đăng xuất chứ ?')">Đăng xuất</a></li>
								</ul>

							</li>
						<?php
						
						} elseif (isset($_SESSION['user'])) { ?>
							<li class="profile"><a href="#"><?= $_SESSION['user'] ?></a>
								<ul class="profiles">
									<li><a href="profile.php?email=<?= $_SESSION['user'] ?>">Thông tin</a></li> <br>
									<li><a href="logout.php" onclick="return alert('Bạn chắc chắn muốn đăng xuấ chứ ?')">Đăng xuất</a></li>
								</ul>
							</li>
						<?php
						} else { ?>
							<li><a href="register.php">Đăng ký</a></li> |
							<li><a href="login.php">Đăng nhập</a></li>
						<?php

						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>