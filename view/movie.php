<div class="movie-container container">
    <?php
    $id = $_GET['id'];
    $data = action("SELECT * FROM movie WHERE id = $id");
    $ca_id = $data[0]['catefory_id'];
    $category = action("SELECT name FROM category WHERE id = $ca_id");
    foreach ($data as $key => $movie) {
        extract($movie);
        echo '
            <div class="movie-container-in">
                <div>
                <img src="' . $thumbnail . '" width="300px" height="450px" align="left" />
                </div>
                <div class="thanh1">
                    <h1>' . $name . '</h1>
                    <div>
                        <span class="star-icon">★</span>
                        <span class="star-icon">★</span>
                        <span class="star-icon">★</span>
                        <span class="star-icon">★</span>
                    </div>
                    <button class="form-button">' . $label . '</button>&ensp; ' . $time . ' phút
                    <img src="https://cdn.pixabay.com/photo/2017/06/26/00/46/flat-2442462_960_720.png" alt="" width="20px" height="20px">
                    <p style="color:#333">
                        <br>Thể loại:
                        <b>' . $category[0]['name'] . '</b>
                        <br><br>Quốc gia:
                        <b> ' . $nation . ' </b>
                    </p>
                </div>    
            </div>
            <div class="thanh3">
                <h2>NỘI DUNG PHIM</h2>
                ' . $description . '
            </div>
            ';
    }
    ?>

    <div class="thanh4">
        <h2>LỊCH CHIẾU</h2>
    </div>
    <?php
    $movie_id = $_GET['id'];
    $showtimes = action("SELECT * FROM showtimes WHERE movie_id = $movie_id");
    foreach ($showtimes as $key => $value) {
        extract($value);
        $theader = action("SELECT name FROM theader WHERE id = $theater_id");

        $start_times = action("SELECT * FROM start_times WHERE showtimes_id = $id");
        $times_html = '';

        foreach ($start_times as $key => $value) {
            extract($value);

            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $timeLeft = (strtotime($time) - time()) / 60;
            if ($timeLeft > 15) {
                $times_html .= '<a href="index.php?page=seats&movie_id=' . $movie_id . '&start_time_id=' . $id . '&theater_id=' . $theater_id . '">' . $time . '</a>';
            }
        }
        if ($times_html !== '') {

            echo '
            <div class="times-container">
            <div class="theader-name">' . $theader[0]['name'] . '</div>
            <div class="times">
            <p>
            2D - Phụ đề
            </p>
            <div class="times-content">
            ' . $times_html . '
            </div>
            </div>
            </div>
            ';
        } 
    }


    include 'comment.php';
    ?>