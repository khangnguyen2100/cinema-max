<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="./assets/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
  <header class="header">
    <nav class="container nav">
      <div class="logo">
        <a href="./index.php">
          Cinema-max
        </a>
      </div>
      <ul class="nav-list">
        <li class="nav-item">
          <a href="./index.php" class="nav-link">Trang Chủ</a>
        </li>
        <li class="nav-item">
          <a href="./index.php?page=category" class="nav-link">Thể loại</a>
        </li>
        <li class="nav-item">
          <a href="./index.php?page=movie" class="nav-link">Phim</a>
        </li>
        <li class="nav-item">
          <a href="./index.php?page=lich_chieu" class="nav-link">Lịch Chiếu</a>
        </li>
        <li class="nav-item">
          <a href="./index.php?page=comment" class="nav-link">Bình luận</a>
        </li>
        <li class="nav-item">
          <a href="./index.php?page=theader" class="nav-link">Rạp phim</a>
        </li>
        <li class="nav-item">
          <a href="./index.php?page=bill" class="nav-link">Đơn hàng</a>
        </li>
        <li class="nav-item">
          <a href="./index.php?page=user" class="nav-link">Khách hàng</a>
        </li>
      </ul>
      <li class="nav-item">
        <a href="../view/login.php" class="nav-link">Đăng xuất</a>
      </li>
    </nav>
  </header>