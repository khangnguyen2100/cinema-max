<main>
  <div class="container">
    <div class="render">
      <div class="render-header">
        <div class="heading">
          Lịch chiếu
        </div>
        <a <?php echo 'href="./index.php?page=' . $_GET['page'] . '&mode=add"' ?> class="header-icon add-btn">
          Add
          <i class='bx bx-plus'></i>
        </a>
      </div>

      <table class="table" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Id</th>
            <th>Id Phim</th>
            <th>Id Rạp</th>
            <th>Thời gian chiếu</th>
            <th>Ghế đã được mua</th>
            <th>Cập Nhật</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $show_times = action("SELECT * FROM showtimes");
          foreach ($show_times as $key => $show_time) {
            $show_time_id = $show_time['id'];
            $movie_id = $show_time['movie_id'];
            $theater_id = $show_time['theater_id'];
            $start_times = action("SELECT * FROM start_times INNER JOIN seats WHERE start_times.showtimes_id = " . $show_time_id . " AND seats.start_times_id = start_times.id");
            if (count($start_times) > 0) {
              $times = '';
              $seats_solded = '';
              foreach ($start_times as $key => $value) {
                extract($value);
                $times = $times. ' '. $time;

                $comma = ' - ';
                if($key == 0) {
                  $comma = '';
                }
                if($seat_has_solded !== '') {
                  $seats_solded = $seats_solded. $comma . $seat_has_solded;
                } else {
                  $seats_solded = $seats_solded. $comma . 'none';
                }
              }
              echo '
                <tr>
                  <td>'.$show_time_id.'</td>
                  <td>'.$movie_id.'</td>
                  <td>'.$theater_id.'</td>
                  <td>' . $times . '</td>
                  <td>' . $seats_solded . '</td>
                  <td class="td-btn">
                    <a class="update-btn action-btn" href="./index.php?page=' . $_GET['page'] . '&mode=update&rowId=' . $id . '" class="btn" name="update">
                      Update
                    </a>
                  </td>
                  <td class="td-btn">
                    <a class="delete-btn action-btn" href="./index.php?page=' . $_GET['page'] . '&mode=delete&rowId=' . $id . '" class="btn" name="delete">
                      Delete
                    </a>
                  </td>
                </tr>
              ';
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php
if (isset($_GET['mode']) && $_GET['mode'] == 'delete') {
  include '.././module/deleteRow.php';
  deleteRow($_GET['page']);
}
if (isset($_GET['mode']) && $_GET['mode'] == 'add') {
  include './view/sections/showtime.addPopup.php';

  include '.././module/add.showtime.php';
  addRow();
}
if (isset($_GET['mode']) && $_GET['mode'] == 'update') {
  include '.././module/updateRow.php';
  showPopupUpdate();
}
if (isset($_GET['mode']) && $_GET['mode'] == 'updated') {
  include '.././module/updateRow.php';
  updateRow();
}
?>