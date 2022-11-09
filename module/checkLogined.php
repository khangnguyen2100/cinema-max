<?php
  session_start();
    if(isset($_SESSION['idUser']) && $_SESSION['idUser'] !== '') {
        echo "
          <script type='text/javascript'>
            window.location.assign('../index.php?page=billConfirm')
          </script>
        ";
    } else {
        echo "
            <script type='text/javascript'>
              setTimeout(() => {
              alert('Bạn chưa đăng nhập vui lòng đăng nhập')
              window.location.assign('../view/login.php?page=login')
              }, 500);
            </script>
        ";
    }
?>