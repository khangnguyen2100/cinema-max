<?php
  if (isset($_POST["ticket"])) {
    include './connectDb.php';
    include './function.php';
    $id = createId();
    $db = connectDb();
    $seat = $_POST["selected"];
    $amount = count(explode(" ", $seat));
    $price = $_POST["ticket_price"];
    $movie_id = $_GET['movie_id'];
    $start_time_id = $_GET['start_time_id'];
    $theater_id = $_GET['theater_id'];
    $email = $_SESSION['admin'];
    $user = action("SELECT * FROM user WHERE email = '$email'");
    $user_id = $user[0]['id'];
    $sql = "UPDATE seats SET seat_has_solded = '".$seat."' WHERE start_times_id = ". $start_time_id ."" ;
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "INSERT INTO bill (id, movie_id, start_time_id, theader_id, user_id, ticket_price, amount_ticket )
    VALUES ($id, $movie_id, $start_time_id, $theater_id, $user_id, $price, $amount)";
    $db->exec($sql);
    // header('Location: index.php?page='.$page);
  }
?>