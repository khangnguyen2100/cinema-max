<?php
  if (isset($_POST["ticket"])) {
    include './connectDb.php';
    include_once './function.php';
    $db = connectDb();
    $id = createId();
    $seat = $_POST["selected"];
    $amount = count(explode(" ", $seat));
    $price = $_POST["ticket_price"];
    $movie_id = $_GET['movie_id'];
    $start_time_id = $_GET['start_time_id'];
    $theater_id = $_GET['theater_id'];
    $email = getEmail();
    $user = action("SELECT * FROM user WHERE email = '$email'");
    $user_id = $user[0]['id'];
    $sql_seat = "UPDATE seats SET seat_has_solded = '".$seat."' WHERE start_times_id = ". $start_time_id ."" ;
    $stmt_seat = $db->prepare($sql_seat);
    $stmt_seat->execute();
    $sql_bill = "INSERT INTO bill (id, movie_id, start_time_id, theader_id, user_id, ticket_price, amount_ticket )
    VALUES ($id, $movie_id, $start_time_id, $theater_id, $user_id, $price, $amount)";
    echo $sql_bill;
    action($sql_bill);
    // header('Location: index.php?page='.$page);
  }
?>