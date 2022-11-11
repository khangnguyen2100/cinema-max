<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>
    <h2>Sign in/up Form</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="#">
                <h2>Đăng Nhập</h2>
                <span>Điền thông tin của bạn</span>
                <input type="text" placeholder="Tên tài khoản" />
                <input type="password" placeholder="Mật khẩu" />
                <button>Đăng nhập</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#">
                <h2>Đăng kí</h2>
                <span>Điền thông tin của bạn</span>

                <input type="text" placeholder="Tên tài khoản" />
                <input type="password" placeholder="Mật khẩu" />
                <input type="password" placeholder="Nhập lại mật khẩu" />
                <a href="#">Quên mật khẩu?</a>
                <button>Đăng kí</button>
            </form> 
        </div>
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
        btn.addEventListener('click' , () => {
            container.classList.toggle('right-panel-active')
        })
    })
</script>