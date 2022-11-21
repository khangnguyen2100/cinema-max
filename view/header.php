<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>trang chủ</title>
  <link rel="stylesheet" href="styles/styles.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="./index.php">Cinema-Max</a>
      </div>
      <div class="navbar-right" style="display: flex; align-items: center;">

        <ul class="nav navbar-nav">
          <li class=""><a href="#">Mua vé</a></li>
          <li><a href="#">Phim</a></li>
          <li><a href="#">Góc Điện Ảnh</a></li>
          <li><a href="#">Thành Viên</a></li>
          <li><a href="./view/login.php">Đăng nhập</a></li>
        </ul>
        <form class="navbar-form" action="/action_page.php">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </nav>