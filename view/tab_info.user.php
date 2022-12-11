<form action="./module/changeUserInfo.php" method="POST" class="form-user">
  <?php
  $user = getUserInfo();
  ?>
  <div class="form-col">
    <div>
      <div class="form-group-container">
        <div class="form-group">
          <label for="name">Họ & Tên</label>
          <input type="text" class="form-input" name="full_name" <?php echo "value='" . $user['full_name'] . "'" ?>>
        </div>
        <div class="form-group">
          <label for="name">Số điện thoại</label>
          <input type="number" class="form-input" name="phone_number" <?php echo "value='" . $user['phone_number'] . "'" ?>>
        </div>
      </div>
      <div class="form-group">
        <label for="name">Email</label>
        <input disabled type="email" class="form-input" name="email" <?php echo "value='" . $user['email'] . "'" ?>>
      </div>
      <div class="form-group-container">
        <div class="form-group">
          <label for="name">Ngày sinh</label>
          <input type="date" class="form-input" name="birthday" <?php echo "value='" . $user['birthday'] . "'" ?>>
        </div>
        <div class="form-group">
          <label for="name">Giới tính</label>
          <input type="text" class="form-input" name="gender" <?php echo "value='" . $user['gender'] . "'" ?>>
        </div>
      </div>
      <div class="form-group">
        <label for="name">Địa chỉ</label>
        <input type="text" class="form-input" name="address" <?php echo "value='" . $user['address'] . "'" ?>>
      </div>
      <input type='submit' name="change" class="btn" value="Cập nhật" />
    </div>
  </div>
  <div class="form-col" style="min-width: 350px">
    <h3 class="heading">
      Đổi mật khẩu
    </h3>
    <input type="checkbox" name="changePass" class="changePass">
    <div class="change_pass">
      <div class="form-group">
        <label for="name">Mật khẩu cũ</label>
        <input type="text" name="old_password" class="form-input">
      </div>
      <div class="form-group">
        <label for="name">Mật khẩu mới</label>
        <input type="text" name="new_password" class="form-input">
      </div>
    </div>
  </div>
</form>