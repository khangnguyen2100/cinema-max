<div class="movie-container container">
    <?php
    $id = $_GET['id'];
    $data = action("SELECT * FROM movie WHERE id = $id");
    $ca_id = $data[0]['catefory_id'];
    $category = action("SELECT name FROM category WHERE id = $ca_id");
    foreach ($data as $key => $movie) {
        extract($movie);
        echo '
            <img src="' . $thumbnail . '" width="300px" height="450px" align="left" />
            <div class="thanh1">
                <h2> PHIM ĐANG CHIẾU </h2>
                </div>
                
                <div class="">
                <h1>' . $name . '</h1>
                &ensp;&ensp;
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <button class="form-button">Đánh Giá</button>
                <br><br> &ensp;&ensp;
                <button class="form-button">' . $label . '</button>&ensp; ' . $time . ' phút
                <img src="https://cdn.pixabay.com/photo/2017/06/26/00/46/flat-2442462_960_720.png" alt="" width="20px" height="20px">
                <br>
                <br>
                <p style="color:#fff">
                    <br><br>&ensp; &ensp; Thể loại:
                    <b>' . $category[0]['name'] . '</b>

                    <br><br>&ensp; &ensp; Quốc gia:
                    <b> ' . $nation . ' </b>
                </p>
            </div>
            <br>
            <div class="thanh3">
                <h2>NỘI DUNG PHIM</h2>
                <hr width="5%" size="2px" align="left" color="red" />
                ' . $description . '
            </div>
            ';
    }
    ?>

    <div class="thanh4">
        <h2>LỊCH CHIẾU</h2>
        <hr width="5%" size="3px" align="left" color="red" />
        <div class="form-group">
            <select name="cả nước">
                <option value="0">Chọn tỉnh </option>
                <option value="1">TPHCM</option>
                <option value="2">Hà nội</option>
                <option value="3">Cần Thơ</option>
            </select>
            <input type="date" name="ngày">
            <select name="Tất cả rạp">
                <option value="0">Tất cả rạp </option>
                <option value="1">TPHCM</option>
                <option value="2">Hà nội</option>
                <option value="3">Cần Thơ</option>
            </select>
        </div>
    </div>
    <?php
    $id = $_GET['id'];
    $showtimes = action("SELECT * FROM showtimes WHERE movie_id = $id");
    foreach ($showtimes as $key => $value) {
        extract($value);
        $theader = action("SELECT name FROM theader WHERE id = $theater_id");
        
        $start_times = action("SELECT * FROM start_times WHERE showtimes_id = $id");
        $times_html = '';

        foreach ($start_times as $key => $value) {
            extract($value);
            $times_html .= '<a href="index.php?page=seats&movie_id=1&start_time_id='.$id.'&theater_id='.$theater_id.'">'.$time.'</a>'; 
        }
        echo '
            <div class="times-container">
            <div class="theader-name">' . $theader[0]['name'] . '</div>
            <div class="times">
                <p>
                    2D - Phụ đề
                </p>
                <div class="times-content">
                '.$times_html.'
                </div>
            </div>
        </div>
        ';
    }
    ?>