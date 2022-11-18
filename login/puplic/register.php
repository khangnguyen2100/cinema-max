<?php include('header.php'); ?>
<?php
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
	$cout_mail = $conn->prepare($check_email);
	$cout_mail->execute();
	$cout_phone = $conn->prepare($check_phone);
	$cout_phone->execute();
	if ($cout_mail->rowCount() > 0) {
		$error = "Email này đã có người sử dụng. Vui lòng chọn Email khác! ";
	} elseif ($cout_phone->rowCount() > 0) {
		$error = "Số điện thoại này đã có người sử dụng. Vui lòng chọn Số khác khác! ";
	} else {
		action("INSERT INTO user (full_name,email,password,phone_number	,address, gender, birthday, permission,active)
		 VALUES
		  ('$name','$email','$password','$phone','$address', '$gender' , '$date' ,'$permission','$active')");
		$error = "Tạo mới thành công!";
	}
}


?>
<div class="container">

	<div class="register">
		<form method="POST" id="register">
			<div class="register-top-grid">
				<h3>Tạo mới tài khoản ngay bây giờ</h3>
				<?php
				if (isset($error)) { ?>
					<p class="alert alert-danger"><?= $error ?></p>
				<?php

				}
				?>
				<div class="mation">
					<span>Họ tên<label>*</label></span>
					<input type="text" name="name" required>

					<span>Email<label>*</label></span>
					<input type="email" name="email" required>

					<span>Password<label>*</label></span>
					<input type="password" name="pass" required>

					<span>Số điện thoại<label>*</label></span>
					<input type="number" name="phone" required>

					<span>Ngày sinh<label>*</label></span>
					<input type="date" name="date" required>
					<div class="add-item-input">
						<span>Giới tính<label>*</label></span>
						<div class="radio-group">
							<input required type="radio" id="nam" value="nam" name="gender">
							<label for="nam">Nam</label><br>
						</div>
						<div class="radio-group">
							<input required type="radio" id="nữ" value="nữ" name="gender">
							<label for="nữ">Nữ</label>
						</div>
					</div>

					<span>Địa chỉ<label>*</label></span>
					<input type="text" name="address" required>
				</div>
			</div>
			<button type="submit" name="register" class="btn" style="background-color:salmon">Đăng ký</button>
			<a href="login.php" class="btn btn-danger">Đăng nhập</a>
		</form>
	</div>
</div>
<?php include('footer.php') ?>