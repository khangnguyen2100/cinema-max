<?php
  function addRow() {

    if(isset($_GET['page']) && isset($_POST['add']) && $_POST['add']) {
      global $db;
      global $keys;
      $page = $_GET['page'];
      $head = '';
      $body = '';
      foreach ($keys as $key => $value) {
        if($key == count($keys) - 1) {
          $head .= $value;
          $body .= "'$_POST[$value]'" ;
        } else {
          $head .= $value.',';
          $body .= "'$_POST[$value]'" .',';
        }
      }
      $sql = "INSERT INTO ".$page." ( $head )
      VALUES ($body)";
      $db->exec($sql);
      header('Location: index.php?page='.$page);
    }
    
    if(isset($_GET['page']) && isset($_POST['close-icon']) && $_POST['close-icon']) {
      $page = $_GET['page'];
      header('Location: index.php?page='.$page);
    }
  }
?>