<?php
include_once './function.php';
$user = getUserInfo();
$day_since = $_GET['since'];
$day_to = $_GET['to'];
$sql = "SELECT *, movie.name AS movie_name, bill.id AS bill_id
FROM bill
INNER JOIN movie 
on bill.movie_id = movie.id

INNER JOIN theader 
on bill.theader_id = theader.id

INNER JOIN start_times
on bill.start_time_id = start_times.id

WHERE user_id = ". $user['id'] ." 
and date between '".$day_since."' and '".$day_to." 23:59:59.999'
";
$result = action($sql);
echo json_encode([
  'data' => $result,
  ]);
?>