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
      foreach ($keys as $key => $value) {
        if($key !== 0) {
          if($key == count($keys) - 1) {
            $body .= "$value = ' $_POST[$value]'" ;
          } else {
            $body .= "$value = ' $_POST[$value]'" .',';
          }
        }
      }
      $sql = "UPDATE $page SET $body WHERE id = '". $rowId ."'" ;
      $stmt = $db->prepare($sql);
      $stmt->execute();
      echo("<script>window.location.assign('index.php?page=$page');</script>");
    }
    // if(isset($_POST['close-icon']) && $_POST['close-icon']) {
    //   header("Location: index.php?page=$page");
    // }
  }
