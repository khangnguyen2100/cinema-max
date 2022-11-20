<?php
  function addRow() {
    if(isset($_GET['page']) && isset($_POST['add'])) {
      global $db;
      global $keys;
      $page = $_GET['page'];
      $head = '';
      $body = '';
      foreach ($keys as $key => $keyName) {
        if($key === 0 && $_POST[$keyName] == '') {
          $head .= $keyName.',';
          $body .= createId() .',';
        } else {
          if($_POST[$keyName] !== '') {
            $value = trim($_POST[$keyName]);
            if($key == count($keys) - 1) {
              $head .= $keyName;
              $body .= "$value" ;
            } else {
              $head .= $keyName.',';
              $body .= "$value" .',';
            }
          }
        }
      }
      $sql = "INSERT INTO ".$page." ( $head )
      VALUES ($body)";
      $db->exec($sql);
      header('Location: index.php?page='.$page);
    }
    // if(isset($_GET['page']) && isset($_POST['close-icon']) && $_POST['close-icon']) {
    //   $page = $_GET['page'];
    //   header('Location: index.php?page='.$page);
    // }
  }
?>