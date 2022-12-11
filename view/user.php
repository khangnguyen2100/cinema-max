<div class="container">
  <div class="heading-block">
    <div class="user-nav">
      <li class="user-nav-item">
        <a href="?page=user&status=tab_info" class="user-nav-link">
          Thông tin khách hàng
        </a>
      </li>
      <li class="user-nav-item">
        <a href="?page=user&status=tab_exchange" class="user-nav-link">
          Lịch sử mua vé
        </a>
      </li>
    </div>
    <a href="./module/logout.php" class="btn">
      Đăng xuất
    </a>
  </div>
  <?php
  $status = 'tab_info';
  if (isset($_GET['status'])) {
    $status = $_GET['status'];
  }
  switch ($status) {
    case 'tab_exchange':
      include './view/tab_exchange.user.php';
      break;
      default:
    include './view/tab_info.user.php';
  }
  ?>

</div>