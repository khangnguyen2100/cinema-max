  <br>
  <!-- slide-->
  <div class="headWrap">
    <div class="slideshow">
      <img src="https://cdn.popsww.com/blog-kids/sites/3/2021/08/raya-va-rong-than-cuoi-cung.jpg">
      <img src="https://simg.zalopay.com.vn/zlp-website/assets/Phim_hoat_hinh_hay_nhat_Brave_2fb8790a05.jpg">
      <img src="https://toplist.vn/images/800px/hiep-tham-gian-bat-tri-634948.jpg">
      <img src="https://cdn.tgdd.vn/Files/2021/05/28/1355596/top-10-bo-phim-kiem-hiep-trung-quoc-hay-nhat-tu-truoc-den-nay-202105282248309718.jpg">
      <img src="https://cdn.popsww.com/blog-kids/sites/3/2021/08/raya-va-rong-than-cuoi-cung.jpg">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAkhvJBAllRq4xlvHWJVlUo80qgMaWMOpWeOPCebOPAUcUDUPBgamaDpsZ63L8GobhVdo&usqp=CAU">
      <img src="https://cdn.popsww.com/blog-kids/sites/3/2021/08/raya-va-rong-than-cuoi-cung.jpg">
      <img src="https://simg.zalopay.com.vn/zlp-website/assets/Phim_hoat_hinh_hay_nhat_Brave_2fb8790a05.jpg">
      <img src="https://toplist.vn/images/800px/hiep-tham-gian-bat-tri-634948.jpg">
      <img src="https://cdn.tgdd.vn/Files/2021/05/28/1355596/top-10-bo-phim-kiem-hiep-trung-quoc-hay-nhat-tu-truoc-den-nay-202105282248309718.jpg">
      <img src="https://cdn.popsww.com/blog-kids/sites/3/2021/08/raya-va-rong-than-cuoi-cung.jpg">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAkhvJBAllRq4xlvHWJVlUo80qgMaWMOpWeOPCebOPAUcUDUPBgamaDpsZ63L8GobhVdo&usqp=CAU">
      <img src="https://cdn.popsww.com/blog-kids/sites/3/2021/08/raya-va-rong-than-cuoi-cung.jpg">
      <img src="https://simg.zalopay.com.vn/zlp-website/assets/Phim_hoat_hinh_hay_nhat_Brave_2fb8790a05.jpg">
      <img src="https://toplist.vn/images/800px/hiep-tham-gian-bat-tri-634948.jpg">
      <img src="https://cdn.tgdd.vn/Files/2021/05/28/1355596/top-10-bo-phim-kiem-hiep-trung-quoc-hay-nhat-tu-truoc-den-nay-202105282248309718.jpg">
      <img src="https://cdn.popsww.com/blog-kids/sites/3/2021/08/raya-va-rong-than-cuoi-cung.jpg">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAkhvJBAllRq4xlvHWJVlUo80qgMaWMOpWeOPCebOPAUcUDUPBgamaDpsZ63L8GobhVdo&usqp=CAU">
      <img src="https://cdn.popsww.com/blog-kids/sites/3/2021/08/raya-va-rong-than-cuoi-cung.jpg">
      <img src="https://simg.zalopay.com.vn/zlp-website/assets/Phim_hoat_hinh_hay_nhat_Brave_2fb8790a05.jpg">
      <img src="https://toplist.vn/images/800px/hiep-tham-gian-bat-tri-634948.jpg">
      <img src="https://cdn.tgdd.vn/Files/2021/05/28/1355596/top-10-bo-phim-kiem-hiep-trung-quoc-hay-nhat-tu-truoc-den-nay-202105282248309718.jpg">
      <img src="https://cdn.popsww.com/blog-kids/sites/3/2021/08/raya-va-rong-than-cuoi-cung.jpg">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAkhvJBAllRq4xlvHWJVlUo80qgMaWMOpWeOPCebOPAUcUDUPBgamaDpsZ63L8GobhVdo&usqp=CAU">
    </div>
  </div>

  <style>
    .headWrap {
      position: relative;
      max-width: 2500px;
      margin: none;
      overflow: hidden;
    }

    .slideshow {
      width: 1000%;
      overflow: auto;
      -webkit-animation: slide-show 550s linear infinite;
      -moz-animation: slide-show 550s linear infinite;
      animation: slide-show 550s linear infinite;
    }

    .slideshow img {
      width: 380px;
      float: left;
      border: solid .0%;
      height: 250px;
      padding: 5px;
    }

    .thanh4 hr {
      background-color: forestgreen;
    }

    @keyframes slide-show {
      0% {
        -webkit-transform: translateX(0%);
        -moz-transform: translateX(0%);
        -o-transform: translateX(0%);
        transform: translateX(0%);
      }

      100% {
        -webkit-transform: translateX(-66.66%);
        -moz-transform: translateX(-66.66%);
        -o-transform: translateX(-66.66%);
        transform: translateX(-66.66%);
      }
    }

    .thanh4 {
      padding-left: 10%;
    }

    .times img {
      width: 100px;
    }

    .times-container {

      width: 700px;
      height: 170px;
    }

    .times {
      height: 170px;
    }
  </style>
  <!-- slide-->
  <div class="thanh4">
    <H2>Phim Đang chiếu</h2>
    <div class="form-group">
      <select name="cả nước">
        <option value="">Chọn tỉnh</option>
      </select>
      <!--vé đặt Phim-->
      <br>
      <br>
      <?php
      $theater_id  = 1;
      $showtimes = action("SELECT * FROM showtimes WHERE theater_id=$theater_id");
      foreach ($showtimes as $key => $value) {
        extract($value);

        $start_times = action("SELECT * FROM start_times WHERE showtimes_id = $id");
        $movie_info = action("SELECT * FROM movie WHERE id = $value[movie_id] ")[0];
        $times_html = '';

        foreach ($start_times as $key => $value) {
          extract($value);
          $times_html .= '<a href="index.php?page=seats&movie_id=' . $movie_id . '&start_time_id=' . $id . '&theater_id=' . $theater_id . '">' . $time . '</a>';
        }
        echo '
        
            <div class="times-container">
  
            <div class="times">
            <p>
            <img src="' . $movie_info['thumbnail'] . '" ">
          <p>
            ' . $movie_info['name'] . ' <br><br>2022 
            &nbsp; &nbsp; &nbsp; &nbsp
            <i class="glyphicon glyphicon-time"></i>
           ' . $movie_info['time'] . ' 
            
           <br><br>
            2D - Phụ đề
                <div class="times-content">
                ' . $times_html . '
                </p>
                </div>
            </div>
        </div>
        ';
      }
      ?>


    </div>
  </div>