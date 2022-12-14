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
include_once '../module/connectDb.php';

$db = connectDb();
if (isset($_SESSION['user'])) {
  header("Location: ../index.php");
}
if (isset($_SESSION['admin'])) {
  header("Location: ../admin/index.php");
}
if (isset($_POST['login'])) {
  $email = validString($_POST['mail']);
  $password = validString($_POST['pass']);
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
    $user_id = action("SELECT id FROM user WHERE email = '".$email."'");
    $_SESSION['admin'] = $email;
    $_SESSION['user_id'] = $user_id[0]['id'];
    header("Location:../admin/index.php");
  } elseif ($count->rowCount() > 0) {
    $user_id = action("SELECT id FROM user WHERE email = '".$email."'");
    $_SESSION['user_id'] = $user_id[0]['id'];
    $_SESSION['user'] = $email;
    header("location:../index.php");
  } else {
    $error = "Email ho???c m???t kh???u ch??a ????ng ho???c t??i kho???n c???a b???n ???? b??? kh??a!";
  }
}

if (isset($_POST['register'])) {
  $name = validString($_POST['name']);
  $email = validString($_POST['email']);
  $password = validString($_POST['pass']);
  $phone = validString($_POST['phone']);
  $address = validString($_POST['address']);
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
    $register_error = "Email n??y ???? c?? ng?????i s??? d???ng. Vui l??ng ch???n Email kh??c! ";
  } elseif ($cout_phone->rowCount() > 0) {
    $register_error = "S??? ??i???n tho???i n??y ???? c?? ng?????i s??? d???ng. Vui l??ng ch???n S??? kh??c kh??c! ";
  } else {
    action("INSERT INTO user (id,full_name,email,password,phone_number	,address, gender, birthday, permission,active)
		 VALUES
		  ('$id','$name','$email','$password','$phone','$address', '$gender' , '$date' ,'$permission','$active')");
    $register_error = "T???o m???i th??nh c??ng!";
  }
}
?>
<body>
  <div class="container right-panel-active" id="container">
    <!-- ????ng Nh???p -->
    <div class="form-container sign-up-container">
      <form class="container-form form" id="login" method="POST">
        <h2>????ng Nh???p</h2>
        <div class="form-group">
          <input type="text" placeholder="Email" id="email" name="mail" required />
          <input type="password" placeholder="M???t kh???u" id="password" name="pass" required />
          <?php if (isset($error)) { ?>
            <p class="alert alert-danger"><?= $error ?></p>
          <?php
          }?>
          <a class="forgor_link" href="./forgotPassword.php">Qu??n m???t kh???u?</a>
          <button type="submit" name="login" class="btn btn-danger">????ng nh???p</button>
        </div>
      </form>
    </div>
    <!-- ????ng k?? -->
    <div class="form-container sign-in-container" style="overflow-y: auto;">
      <h2>????ng k??</h2>
      <form method="POST" id="register">
        <input type="text" name="name" required placeholder="T??n t??i kho???n" />
        <input type="password" placeholder="M???t kh???u" name="pass" required />

        <input type="email" name="email" placeholder="Email" required>
        <input type="number" name="phone" placeholder="S??? ??i???n tho???i" required>
        <input type="date" name="date" placeholder="Ng??y sinh" required>
        <div class="add-item-input">
          <label class="add-item-label">Gi???i t??nh</label>
          <div class="radio-group">
            <input required type="radio" id="nam" value="nam" name="gender">
            <label for="nam">Nam</label><br>
          </div>
          <div class="radio-group">
            <input required type="radio" id="n???" value="n???" name="gender">
            <label for="n???">N???</label>
          </div>
        </div>
        <input type="text" name="address" placeholder="?????a ch???" required>
        <?php
        if (isset($register_error)) { ?>
          <p class="alert alert-danger"><?= $register_error ?></p>
        <?php

        }
        ?>
        <button type="submit" name="register" class="btn">????ng k??</button>
      </form>
    </div>
    <!-- overlay -->
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Welcome Back!</h1>
          <p>B???n ch??a c?? t??i kho???n?</p>
          <button class="ghost sign-in-btn" id="signIn">????ng k??</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Hello, Friend!</h1>
          <p>Quay l???i trang ????ng nh???p</p>
          <button class="ghost sign-up-btn" id="signUp">????ng nh???p</button>
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