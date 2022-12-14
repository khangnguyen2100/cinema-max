<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BK Store</title>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,400;0,700;1,900&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/styles/style.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
      height: 100vh;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container-form {
      width: 400px;
      display: flex;
      align-items: center;
      row-gap: 25px;
      flex-direction: column;
      box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
      padding: 25px;
      border-radius: 15px;
    }

    .heading-form {
      font-weight: 700;
      font-size: 36px;
      color: orangered;
      text-transform: capitalize;
    }

    .form-group {
      width: 100%;
      display: flex;
      justify-content: center;
      flex-direction: column;
    }

    .form-group input {
      font-size: 24px;
      margin-top: 5px;
      border: 0;
      border-bottom: 1px solid orangered;
      outline: none;
    }

    .btn-form {
      width: 100%;
      padding: 10px 15px;
      border-radius: 5px;
      border: 0;
      background-color: #444;
      color: #fff;
      margin-top: 50px;
    }
  </style>
</head>

<body>
  <div class="container">
    <form class="container-form" action="changePassword.php" method="POST" class="form">
      <h2 class="heading-form">
        ?????i m???t kh???u
      </h2>
      <!-- email -->
      <div class="form-group">
        <label for="old_password">
          M???t kh???u c??
        </label>
        <input type="text" id="old_password" name="old_password">
      </div>
      <div class="form-group">
        <label for="password">
          M???t kh???u m???i
        </label>
        <input type="text" id="password" name="new_password">
      </div>
      <div class="form-group">
        <input type="submit" name="login" value='X??c nh???n' class="btn-bg-form btn-form" style="cursor: pointer;" />
      </div>
    </form>
  </div>
</body>

</html>
<?php
include_once('../module/function.php');

$user = getUserInfo();
if (isset($_POST['login']) && $_POST['login'] && $_POST['new_password'] !== '') {
  $old_password = $_POST['old_password'];
  $new_pass = $_POST['new_password'];
  if ($old_password == $user['password']) {
    $sql = "UPDATE user SET password = '" . $new_pass . "' WHERE id = " . $user['id'] . " ";
    action($sql);
    header('Location: ../index.php');
  } else {
    echo "
    <script type='text/javascript'>
      setTimeout(alertFunc, 200);
      function alertFunc() {
        alert('Sai th??ng tin!')
      }
    </script>
    ";
  }
}

?>