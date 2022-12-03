<?php
include_once './function.php';
$user = getUserInfo();
if (isset($_POST['change']) && $_POST['change']) {
  $full_name = $_POST['full_name'];
  $phone_number = $_POST['phone_number'];
  $birthday = $_POST['birthday'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $old_password = $_POST['old_password'];
  $new_pass = $_POST['new_password'];
  action("UPDATE user SET 
    full_name = '" . $full_name . "', 
    phone_number = '" . $phone_number . "', 
    birthday = '" . $birthday . "', 
    gender = '" . $gender . "', 
    address = '" . $address . "' 
    WHERE id = " . $user['id'] . " ");
  if(strlen($new_pass) > 5) {
    if ($old_password == $user['password']) {
      $sql = "UPDATE user SET password = '" . $new_pass . "' WHERE id = " . $user['id'] . " ";
      action($sql);
    } else {
      echo "
      <script type='text/javascript'>
        setTimeout(alertFunc, 200);
        function alertFunc() {
          alert('Sai thông tin!')
        }
      </script>
      ";
    }
  }
  header('Location: ../index.php');
}
?>