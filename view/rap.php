  <!--slide-->
  <style>
    .navbar-brand {
      font-size: 22px;
      font-weight: bold;
    }

    .navbar {
      margin-bottom: 0 !important;
      background: rgba(21, 31, 50, 1) !important;
      padding: 10px 0 !important;
    }

    .navbar-brand {
      color: primary_color !important;
    }

    .navbar-nav a {
      font-size: 16px !important;
    }

    a:hover {
      color: primary_color !important;
    }

    img {
      vertical-align: middle;
    }

    /* Position the image container (needed to position the left and right arrows) */
    .container {
      position: relative;
    }

    /* Hide the images by default */
    .mySlides {
      display: none;
    }

    /* Add a pointer when hovering over the thumbnail images */
    .cursor {
      cursor: pointer;
    }

    /* Next & previous buttons */
    .prev,
    .next {
      cursor: pointer;
      position: absolute;
      top: 40%;
      width: auto;
      padding: 16px;
      margin-top: -50px;
      color: white;
      font-weight: bold;
      font-size: 20px;
      border-radius: 0 3px 3px 0;
      user-select: none;
      -webkit-user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }


    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }


    .caption-container {
      text-align: center;
      background-color: #222;
      padding: 2px 16px;
      color: white;
    }

    .row:after {
      content: "";
      display: table;
      clear: both;
    }


    .column {
      float: left;
      width: 16.66%;
    }

    .demo {
      opacity: 0.6;
    }

    .active,
    .demo:hover {
      opacity: 1;
    }
  </style>
  <h2 style="text-align:center" <H2>NHỮNG BỘ PHIM HAY NHẤT</h2>

  <div class="container">
    <div class="mySlides">
      <div class="numbertext">1 / 6</div>
      <img src="https://touchcinema.com/storage/phim-captain-america-noi-chien-sieu-anh-hung/phim-captain-america-noi-chien-sieu-anh-hung.jpg" style="width:100%" height="50%">
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 6</div>
      <img src="https://touchcinema.com/storage/phim-captain-america-noi-chien-sieu-anh-hung/phim-captain-america-noi-chien-sieu-anh-hung.jpg" style="width:100%" height="50%">
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 6</div>
      <img src="https://touchcinema.com/storage/phim-captain-america-noi-chien-sieu-anh-hung/phim-captain-america-noi-chien-sieu-anh-hung.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">4 / 6</div>
      <img src="https://touchcinema.com/storage/phim-captain-america-noi-chien-sieu-anh-hung/phim-captain-america-noi-chien-sieu-anh-hung.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">5 / 6</div>
      <img src="https://touchcinema.com/storage/phim-captain-america-noi-chien-sieu-anh-hung/phim-captain-america-noi-chien-sieu-anh-hung.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">6 / 6</div>
      <img src="https://touchcinema.com/storage/phim-captain-america-noi-chien-sieu-anh-hung/phim-captain-america-noi-chien-sieu-anh-hung.jpg" style="width:100%">
    </div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>

    <div class="row">
      <div class="column">
        <img class="demo cursor" src="https://touchcinema.com/storage/phim-captain-america-noi-chien-sieu-anh-hung/phim-captain-america-noi-chien-sieu-anh-hung.jpg" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
      </div>
      <div class="column">
        <img class="demo cursor" src="https://touchcinema.com/storage/phim-captain-america-noi-chien-sieu-anh-hung/phim-captain-america-noi-chien-sieu-anh-hung.jpg" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
      </div>
      <div class="column">
        <img class="demo cursor" src="https://touchcinema.com/storage/phim-captain-america-noi-chien-sieu-anh-hung/phim-captain-america-noi-chien-sieu-anh-hung.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
      </div>
      <div class="column">
        <img class="demo cursor" src="https://touchcinema.com/storage/phim-captain-america-noi-chien-sieu-anh-hung/phim-captain-america-noi-chien-sieu-anh-hung.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
      </div>
      <div class="column">
        <img class="demo cursor" src="https://touchcinema.com/storage/phim-captain-america-noi-chien-sieu-anh-hung/phim-captain-america-noi-chien-sieu-anh-hung.jpg" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
      </div>
      <div class="column">
        <img class="demo cursor" src="https://touchcinema.com/storage/phim-captain-america-noi-chien-sieu-anh-hung/phim-captain-america-noi-chien-sieu-anh-hung.jpg" style="width:100%" onclick="currentSlide(6)" alt="Snowy Mountains">
      </div>
    </div>
  </div>

  <script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("demo");
      let captionText = document.getElementById("caption");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      captionText.innerHTML = dots[slideIndex - 1].alt;
    }
  </script>

  <style>
    .phim1 h2 {
      text-align: center;
    }

    .phim1>hr {
      width: 130px;
      background-color: red;
      height: 2px;

    }
  </style>

  <div class="phim đang chiếu ">
    <div class="phim1">
      <h2>Phim đang chiếu </h2>
      <hr>
    </div>


    <style>
      .thanh1 {
        float: right;
        padding-top: 0px;
      }

      .thanh1 h1 {
        border-style: double;
        width: 350px;
        height: 200px;
      }

      .thanh1 h1 p input {
        border: 0ch;
        width: 300px;
        height: 50px;
        background-color: rgb(196, 193, 190);
      }

      .thanh1 h1 input {
        border: 0ch;
        width: 300px;
        height: 50px;
        background-color: rgb(255, 119, 0);
      }

      .thanh2 {
        padding-right: 260px;
        float: right;
        padding-top: 4%;
      }

      .thanh3 {
        display: flex;
        align-items: flex-start;
        width: 100%;
        flex-direction: column;
      }

      .form-group {
        color: #222;
      }

      .form-group select,
      .form-group input {
        width: 300px;
        height: 40px;
        border-color: none;
      }

      .thanh5 {
        float: right;
        height: 30px;
      }

      .thanh5 input {
        height: 37px;
      }

      .thanh4 input {
        height: 35px;
      }

      .form-group input {
        margin-left: 15px;
      }

      .thanh5 {
        margin-left: 2000px;
        padding-right: 150px;
      }

      .form-buton {
        background-color: rgb(255, 119, 0);
        border: 0ch;
        width: 200px;
        height: 50px;
        font-weight: 200;
        text-align: left;
      }

      .times-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-bottom: 30px;
      }

      .times-container .theader-name {
        font-size: 18px;
        color: #fff;
        background-color: #F56857;
        padding: 7px 20px;
      }

      .times-container .times {
        width: 100%;
        background-color: #151F32;
        border: 1px solid #ced0da;
        padding: 35px 20px 25px;
        display: flex;
        align-items: center;
        column-gap: 30px;
        border-radius: 0 10px 10px 10px;
      }

      .times-container .times .times-content {
        display: flex;
        justify-content: center;
        align-items: center;
        column-gap: 15px;
      }

      .times-container .times .times-content a {
        border: 1px solid #ced0da;
        padding: 5px 10px;
        transition: all 0.2s ease;
        cursor: pointer;
        color: #fff;
      }

      .times-container .times .times-content a:hover {
        border: 1px solid #F56857;
        color: #F56857;
        transition: all 0.2s ease;
      }


      .thanh6 p {
        border: groove;
        margin-top: -1px;
        width: 750px;
        height: 100px;
        text-align: left;
        padding: 20px;
      }

      .thanh6 input {
        text-align: 50px;
        width: 70px;
        height: 30px;
        background-color: 0px;
      }
    </style>
    <center>
      <div class="thanh4">

        <hr width="5%" size="3px" align="left" color="red" />
        <div class="form-group">
          <select name="cả nước">
            <option value="0">Chọn tỉnh </option>
            <option value="1">TPHCM</option>
            <option value="2">Hà nội</option>
            <option value="3">Cần Thơ</option>
          </select>

          </select>


          <br>
          <br>
          <?php

          //mở kết nối
          $conn = mysqli_connect('localhost', 'root', '', 'cinema-max');
          // xây dựng thực thi truy vấn
          $sql = "select * from movie";

          $recordset = mysqli_query($conn, $sql);
          ?>
          <table border="1">
            <tr>
              <th>name</th>
              <th>label</th>
              <th>time</th>
              <th>star</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($recordset)) {
            ?>
              <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['label']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['star']; ?></td>
              </tr>
            <?php
            }
            ?>
          </table>
          <?php
          // đóng kết nối
          mysqli_close($conn);
          ?>

    </center>
  </div>
  </div>