<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trang chủ</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
      body{
        background:black;
      }
      .navbar-brand{
        font-size: 22pt;
        font-weight:bold;
      }
      .thumbnaill{
      display: block;
      padding: 4px;
      margin-bottom: 20px;
      line-height: 1.42857143;
      background-color:BLACK;
      
      border-radius: 4px;
      -webkit-transition: border .2s ease-in-out;
      -o-transition: border .2s ease-in-out;
      transition: border .2s ease-in-out;

      }
      .caption{
        padding-top:18px;
        color:white;
        font-size:bold;
      }
    </style>
</head>
<body >

<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <a  class="navbar-brand" href="#">Cinema-Max</a>
    </div>

    <ul class="nav navbar-nav">
      <li class=""><a href="#">Mua vé</a></li>
      <li><a href="#">Phim</a></li>
      <li><a href="#">Góc Điện Ảnh</a></li>
      <li><a href="#">Sự Kiện</a></li>
      <li><a href="#">Rạp/Giá Vé</a></li>
      <li><a href="#">Hỗ Trợ </a></li>
      <li><a href="#">Thành Viên</a></li>
    </ul>
    <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="https://cdn.galaxycine.vn/media/2022/11/3/2048x682_1667485469196.jpg" alt="Image">
        <div class="carousel-caption">
          
        </div>      
      </div>

      <div class="item">
        <img src="https://cdn.galaxycine.vn/media/2022/11/1/1111111_1667275116008.jpg" alt="Image">
        <div class="carousel-caption">
          
        </div>      
      </div>

      <div class="item">
        <img src="https://cdn.galaxycine.vn/media/2022/11/4/111_1667572093456.jpg" alt="Image">
        <div class="carousel-caption">
          
        </div>      
      </div>
      
      <div class="item">
        <img src="https://cdn.galaxycine.vn/media/2022/10/26/ca2-poster-w2048xh682_1666771462253.jpg" alt="Image">
        <div class="carousel-caption">
          
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
  
<div class="container text-center">    
  <h3>PHIM ĐANG CHIẾU</h3>
  <h3>PHIM SẮP CHIẾU</h3>

  <div class="row">
    <div class="col-md-4">
      <div class="thumbnaill">
        <a href="#" target="_blank">
          <img src="https://cdn.galaxycine.vn/media/2022/11/1/450x300_1667287476548.jpg" alt="Lights" style="width:100%">
          <div class="caption">
          <p>BLACK PANTHER: WAKANDA FOREVER <br>
            CHIẾN BINH BÁO ĐEN: WAKANDA BẤT DIỆT</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnaill">
        <a href="#" target="_blank">
          <img src="https://cdn.galaxycine.vn/media/2022/11/1/1800x1200_1667275208614.jpg" alt="Nature" style="width:100%">
          <div class="caption">
            <p>LYLE, LYLE, CROCODILE <br> LYLE, CHÚ CÁ SẤU BIẾT HÁT</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnaill">
        <a href="#" target="_blank">
          <img src="https://cdn.galaxycine.vn/media/2022/10/12/1350wx900h_1665592999797.jpg" alt="Fjords" style="width:100%">
          <div class="caption">
            <p>CONFIDENTIAL ASSIGNMENT 2: INTERNATIONAL ĐẶC VỤ XUYÊN QUỐC GIA <br>   </p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnaill">
        <a href="#" target="_blank">
          <img src="https://cdn.galaxycine.vn/media/2022/9/26/1350wx900h_1664177568281.jpg" alt="Nature" style="width:100%">
          <div class="caption">
            <p>BLACK ADAM</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnaill">
        <a href="#" target="_blank">
          <img src="https://cdn.galaxycine.vn/media/2022/10/29/1800x1200_1667019043592.jpg" alt="Nature" style="width:100%">
          <div class="caption">
            <p>DON'T LOOK AT THE DEMON NGHI THỨC CẤM</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnaill">
        <a href="#" target="_blank">
          <img src="https://cdn.galaxycine.vn/media/2022/10/26/3-3_1666756281873.jpg" alt="Fjords" style="width:100%">
          <div class="caption">
            <p>IN THE WAKE VÌ NHỮNG NGƯỜI KHÔNG ĐƯỢC BẢO VỆ<br>   </p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>         
    
</body>

</html>