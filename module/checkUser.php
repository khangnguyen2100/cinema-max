<?php
  include '../module/connectDb.php';
  $db = connectDb();
  function getUser($db) {
    $stmt = $db->prepare("SELECT * FROM " . 'user');
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;
  }

  $userData = getUser($db);
  function checkUser($user, $pass) {
    global $userData;
    foreach ($userData as $key => $value) {
      extract($value);
      if($username == $user && $password == $pass) {
        // if match 
        $_SESSION['idUser'] = $id;
        $_SESSION['username'] = $user;
        $_SESSION['password'] = $pass;
        return true;
      }
    }
  }
?>