<?php
include 'function.php';
$item = $_GET['item'];
function showData($day) {
  $bills = action("SELECT  * FROM bill");
  $total_price = 0;
  $total_ticket = 0;
  $total_bills = 0;
  $movie_ids = [];
  $theader_ids = [];
  $bills_to_show = [];
  foreach ($bills as $key => $bill) {
    extract($bill);

    if((time()- $day*(60*60*24) ) < strtotime($date)) {
      $total_price += $ticket_price;
      $total_bills+=1;
      $total_ticket += $amount_ticket;
      array_push($movie_ids, $movie_id);
      array_push($theader_ids, $theader_id);
      array_push($bills_to_show, $bill);
      }
  }

  $best_seller_movie_id = getMostId($movie_ids);
  $best_seller_theader_id = getMostId($theader_ids);
  $movie_info = action("SELECT name FROM movie WHERE id = " . $best_seller_movie_id . "");
  $theader_info = action("SELECT name FROM theader WHERE id = " . $best_seller_theader_id . "");

  echo json_encode([
  'content' => 
    '<p>Tổng đơn hàng: <b> ' . $total_bills . '</b> </p>
    <p>Tổng tiền: <b> ' . formatPrice($total_price) . '</b> </p>
    <p>Tổng số vé đã bán:<b> ' . $total_ticket . '</b> </p>
    <p>Phim bán chạy nhất:<b> ' . $movie_info[0]['name'] . '</b> </p> 
    <p>Rạp bán chạy nhất: <b>' . $theader_info[0]['name'] . '</b> </p>',
  'data' => $bills_to_show,
  'time' => $day,
  ]);
}
if($item == '3-days') {
  showData(3);
}
if($item == '10-days') {
  showData(10);
}
if($item == '1-month') {
  showData(30);
}