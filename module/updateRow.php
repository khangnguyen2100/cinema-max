<?php
  function showPopupUpdate() {
    global $tableData;
    foreach ($tableData as $value) {
      extract($value);
      if($id == $_GET['rowId']) {
        include './view/sections/updatePopup.php';
        break;
      }
    }
  }
  function updateRow() {
    $page = $_GET['page'];
    if(isset($_POST['update']) && $_POST['update']) {
      global $db;
      global $keys;
      $rowId = $_GET['rowId'];
      $body = '';
      $check = true;
      if($page == 'category') {
        $check = checkDuplicate($page, 'name',$rowId);
      }
      if($page == 'theader') {
        $check = checkDuplicate($page, 'name address', $rowId);
      }
      if($page == 'user') {
        $check = checkDuplicate($page, 'phone_number email', $rowId);
      }
      foreach ($keys as $key => $value) {
        if($key !== 0) {
          $key_value = trim($_POST[$value]);
          if($key == count($keys) - 1) {
            $body .= "$value = '$key_value'" ;
          } else {
            $body .= "$value = '$key_value'" .',';
          }
        }
      }
      if($check) {
        $sql = "UPDATE $page SET $body WHERE id = '". $rowId ."'" ;
        $stmt = $db->prepare($sql);
        $stmt->execute();
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
