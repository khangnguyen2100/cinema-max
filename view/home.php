<style>
  .swiper {
  width: 100%;
  height: 100%;
}

.swiper-slide {
  text-align: center;
  font-size: 18px;
  background: #fff;

  /* Center slide text vertically */
  display: -webkit-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  -webkit-justify-content: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  -webkit-align-items: center;
  align-items: center;
}

.swiper-slide img {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.item {
  height: 80vh;
}

</style>
<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <?php
    $data = action("SELECT * FROM home_sliders INNER JOIN movie ON home_sliders.movie_id = movie.id");
    foreach ($data as $key => $movie) {
      extract($movie);
      $subDesc = join(' ', array_slice(explode(" ", $description),0,40)) . ' ...';
      $autoplay = '';
      if($key == 0) {
        $autoplay = "&autoplay=1";
      }
      echo '
        <div class="swiper-slide item">
          <div class="myVideo">
            <iframe class="video-background"
              frameborder="0" 
              referrerpolicy="origin-when-cross-origin"
              allowfullscreen="true"
              src="https://www.youtube.com/embed/' . $trailer . '?hd=0&controls=0&mute=1&playsinline=1&loop=1&rel=0&modestbranding=0&autohide=1&showinfo=0&disablekb=1&enablejsapi=1&iv_load_policy=3&fs=0&playlist=' . $trailer . ''.$autoplay.'"
              allow="autoplay"
            >
            </iframe>
            <div class="movie-info">
            <h1>'.$name.'</h1>
            <p>'.$subDesc.'</p>
            <button class="movie-info-action">Đặt vé ngay!</button>
            </div>
          </div>
        </div>
        ';
    }
    ?>
  </div>
  <div class="swiper-pagination"></div>
</div>

<div class="container text-center">
  <div class="sections">
    <h3 class="sections-name">Phim đang chiếu</h3>
    <h3 class="sections-name">Phim sắp chiếu</h3>
  </div>

  <div class="row">
    <?php
    $tableData = getAllTableData('movie');
    foreach ($tableData as $key => $value) {
      extract($value);
      $label_html = $label !== 'none' ? '<div class="movie-label">' . $label . '</div>' : '';
      echo '
          <div class="col-md-3">
          <div class="thumbnail">
            <a href="./index.php?page=movie&id=' . $id . '">
              <div class="thumbnail-img">
                <img src="' . $thumbnail . '" alt="alt" class="movie-img">
              </div>
              <div class="caption">
                <p>' . $name . '</p>
              </div>
            </a>
            ' . $label_html . '
          </div>
        </div>
          ';
    }
    ?>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    pagination: {
      el: ".swiper-pagination",
      dynamicBullets: true,
    },
  });
  const videos = [...document.querySelectorAll('.video-background')]
  swiper.on('activeIndexChange', function(e) {
    videos.map(item => item.src.replace('?autoplay=1', ''))
    const index = e.activeIndex;
    videos[index].src += "&autoplay=1";
  });
</script>