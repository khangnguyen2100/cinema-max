<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BK Store</title>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,400;0,700;1,900&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../styles/login.css">
</head>

<?php
include_once('../module/function.php');
include '../module/connectDb.php';
include '../module/utils.php';
if (isset($_SESSION['admin'])) {
  unset($_SESSION['admin']);
}
$db = connectDb();
if (isset($_SESSION['user']) || isset($_SESSION['admin'])) {
  header("Location:index.php");
}
if (isset($_POST['login'])) {
  $email = $_POST['mail'];
  $password = $_POST['pass'];
  // handle login user
  $check = "SELECT * FROM user WHERE email = '$email' AND password = '$password' AND active = :active AND permission=:permission";
  $count = $db->prepare($check);
  $count->execute(array(
    'permission' => 0,
    'active' => 1
  ));
  // handle login admin
  $check_admin = "SELECT * FROM user WHERE email = '$email' AND password = '$password' AND permission= :permission AND active = :active ";
  $cout_admin = $db->prepare($check_admin);
  $cout_admin->execute(array(
    ':permission' => 1,
    ':active' => 1
  ));

  if ($cout_admin->rowCount() > 0) {
    $_SESSION['admin'] = $email;
    header("Location:../admin/index.php");
  } elseif ($count->rowCount() > 0) {
    $_SESSION['user'] = $email;
    header("location:../index.php");
  } else {
    $error = "Email hoặc mật khẩu chưa đúng hoặc tài khoản của bạn đã bị khóa!";
  }
}

if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['pass'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $gender = $_POST['gender'];
  $date = $_POST['date'];

  $permission = 0; //user
  $active = 1; //dang hoat dong
  // check duplicate email or phone
  $check_email = "SELECT * FROM user WHERE email = '$email'";
  $check_phone = "SELECT * FROM user WHERE phone_number = '$phone'";
  $cout_mail = $db->prepare($check_email);
  $cout_mail->execute();
  $cout_phone = $db->prepare($check_phone);
  $cout_phone->execute();
  $id = createId();
  if ($cout_mail->rowCount() > 0) {
    $register_error = "Email này đã có người sử dụng. Vui lòng chọn Email khác! ";
  } elseif ($cout_phone->rowCount() > 0) {
    $register_error = "Số điện thoại này đã có người sử dụng. Vui lòng chọn Số khác khác! ";
  } else {
    action("INSERT INTO user (id,full_name,email,password,phone_number	,address, gender, birthday, permission,active)
		 VALUES
		  ('$id','$name','$email','$password','$phone','$address', '$gender' , '$date' ,'$permission','$active')");
    $register_error = "Tạo mới thành công!";
  }
}
?>
<body>
  <div class="container right-panel-active" id="container">
    <!-- Đăng Nhập -->
    <div class="form-container sign-up-container">
      <form class="container-form form" id="login" method="POST">
        <h2>Đăng Nhập</h2>
        <div class="form-group">
          <input type="text" placeholder="Email" id="email" name="mail" required />
          <input type="password" placeholder="Mật khẩu" id="password" name="pass" required />
          <?php if (isset($error)) { ?>
            <p class="alert alert-danger"><?= $error ?></p>
          <?php
          } else {
            echo "<p>Nếu bạn đã có tài khoản vui lòng đăng nhập bên dưới</p>";
          } ?>
          <button type="submit" name="login" class="btn btn-danger">Đăng nhập</button>
        </div>
      </form>
    </div>
    <!-- Đăng kí -->
    <div class="form-container sign-in-container" style="overflow-y: auto;">
      <h2>Đăng kí</h2>
      <form method="POST" id="register">
        <input type="text" name="name" required placeholder="Tên tài khoản" />
        <input type="password" placeholder="Mật khẩu" name="pass" required />

        <input type="email" name="email" placeholder="Email" required>
        <input type="number" name="phone" placeholder="Số điện thoại" required>
        <input type="date" name="date" placeholder="Ngày sinh" required>
        <div class="add-item-input">
          <label class="add-item-label">Giới tính</label>
          <div class="radio-group">
            <input required type="radio" id="nam" value="nam" name="gender">
            <label for="nam">Nam</label><br>
          </div>
          <div class="radio-group">
            <input required type="radio" id="nữ" value="nữ" name="gender">
            <label for="nữ">Nữ</label>
          </div>
        </div>
        <input type="text" name="address" placeholder="Địa chỉ" required>
        <?php
        if (isset($register_error)) { ?>
          <p class="alert alert-danger"><?= $register_error ?></p>
        <?php

        }
        ?>
        <button type="submit" name="register" class="btn">Đăng kí</button>
      </form>
    </div>
    <!-- overlay -->
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Welcome Back!</h1>
          <p>Bạn chưa có tài khoản?</p>
          <button class="ghost sign-in-btn" id="signIn">Đăng kí</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Hello, Friend!</h1>
          <p>Quay lại trang đăng nhập</p>
          <button class="ghost sign-up-btn" id="signUp">Đăng nhập</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<script>
  const container = document.querySelector('.container')
  const btns = document.querySelectorAll('.ghost')
  btns.forEach(btn => {
    btn.addEventListener('click', () => {
      container.classList.toggle('right-panel-active')
    })
  })
</script>