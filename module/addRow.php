<?php
function addRow() {
  if (isset($_GET['page']) && isset($_POST['add'])) {
    global $db;
    global $keys;
    $page = $_GET['page'];
    $head = '';
    $body = '';
    $check = true;
    if($page == 'category') {
      $check = checkDuplicate($page, 'name');
    }
    if($page == 'theader') {
      $check = checkDuplicate($page, 'name address');
    }
    foreach ($keys as $key => $keyName) {
      $id = createId();
      if ($key === 0) {
        $head .= 'id,';
        $body .=  $id. ' ,';
      } else {
        if($keyName !== 'date') {
          $value = trim($_POST[$keyName]);
          if ($key == count($keys) - 1) {
            $head .= $keyName;
            $body .= "'$value'";
          } else {
            $head .= $keyName . ',';
            $body .= "'$value'" . ',';
          }
        }
      }
    }
    if($check) {
      $sql = "INSERT INTO " . $page . " ( $head )
      VALUES ($body)";
      action($sql);
      header('Location: index.php?page=' . $page);
    } else {  
      echo "
      <script type='text/javascript'>
        setTimeout(alertFunc, 200);
        function alertFunc() {
          alert('Thông tin bạn nhập trùng với dữ liệu đã có')
        }
      </script>
      ";
    }
  }
}
