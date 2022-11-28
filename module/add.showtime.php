<?php
function addRow() {
  if (isset($_GET['page']) && isset($_POST['add'])) {
    global $db;
    
    $movie_id = validString($_POST['movie_id']);
    $theader_id = validString($_POST['theader_id']);

    $times = validString($_POST['time']);
    $times_arr = explode(' ', $times);
    $seat_has_solded = validString($_POST['seat_has_solded']);
    $seats_arr = explode(' - ', $seat_has_solded);
    $showtimes_id = createId();
    action("INSERT INTO showtimes (id, movie_id, theater_id) VALUES ('$showtimes_id', '$movie_id' ,'$theader_id')");
    
    foreach ($times_arr as $key => $time) {
      $start_times_id = createId();
      $seats_id = createId();
      $seats_value = $seats_arr[$key];
      action("INSERT INTO start_times (id, time, showtimes_id) VALUES ('$start_times_id', '$time', '$showtimes_id')");
      action("INSERT INTO seats (id, seat_has_solded, start_times_id) VALUES ('$seats_id', '$seats_value', '$start_times_id')");
    }
    header('Location: index.php?page=lich_chieu');
  }
}
