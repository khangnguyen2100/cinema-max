<!-- sản phẩm-->
  <!--slide-->
  <style>

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


.slide{
	width: 1000px;
	height: 300px;  
	margin: auto;
	overflow: hidden;
	position: relative;
}
.slide ul{
	position: absolute; 
	top: 0;
	left: 0;
	width: 3000px;  
}
.slide ul li {
	float: left;
}

.prev, .next{
	position: absolute;
	top: 50%;
	transform: translateY(-50%);
	outline: none;
	border: none;
	background-color: transparent;
	font-size: 32px;
	color: #fff;
	cursor: pointer;
}
.prev {
	left: 0;
}
.next {
	right: 0;
}


#slider-wrapper {
  width: 940px;
  height: 470px;
  margin: 50px auto;
  position: relative;
  margin-bottom: 0px;
  background: rgba(0, 0, 0, 0.5);
  overflow: hidden;
}

#s1 {
  padding: 6px;
  background: #000000;
  position: absolute;
  left: 50%;
  bottom: 25px;
  margin-left: -36px;
  border-radius: 20px;
  opacity: 0.3;
  cursor: pointer;
  z-index: 999;
}

#s2 {
  padding: 6px;
  background: #000000;
  position: absolute;
  left: 50%;
  bottom: 25px;
  margin-left: -12px;
  border-radius: 20px;
  opacity: 0.3;
  cursor: pointer;
  z-index: 999;
}

#s3 {
  padding: 6px;
  background: #000000;
  position: absolute;
  left: 50%;
  bottom: 25px;
  margin-left: 12px;
  border-radius: 20px;
  opacity: 0.3;
  cursor: pointer;
  z-index: 999;
}

#s4 {
  padding: 6px;
  background: #000000;
  position: absolute;
  left: 50%;
  bottom: 25px;
  margin-left: 36px;
  border-radius: 20px;
  opacity: 0.3;
  cursor: pointer;
  z-index: 999;
}

#s1:hover,
#s2:hover,
#s3:hover,
#s4:hover {
  opacity: .50;
}

.inner-wrapper {
  width: 940px;
  height: 470px;
  position: absolute;
  top: 0;
  left: 0;
  margin-bottom: 0px;
  overflow: hidden;
}

.control {
  display;
}

#Slide1:checked ~ .overflow-wrapper {
  margin-left: 0%;
}

#Slide2:checked ~ .overflow-wrapper {
  margin-left: -100%;
}

#Slide3:checked ~ .overflow-wrapper {
  margin-left: -200%;
}

#Slide4:checked ~ .overflow-wrapper {
  margin-left: -300%;
}

#Slide1:checked + #s1 {
  opacity: 1;
}

#Slide2:checked + #s2 {
  opacity: 1;
}

#Slide3:checked + #s3 {
  opacity: 1;
}

#Slide4:checked + #s4 {
  opacity: 1;
}

.overflow-wrapper {
  width: 400%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  overflow-y: hidden;
  z-index: 1;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  animation-delay: 3s;
}

.slide img {
  width: 25%;
  float: left;
  animation-delay: 3s;
}








  
  






</style>
<BR>
<center>
<h1><b>NHỮNG BỘ PHIM HAY MỚI NHẤT 2023</b></h1>
<div id="slider-wrapper">
  <div class="inner-wrapper">
    <input checked type="radio" name="slide" class="control" id="Slide1" />
    <label for="Slide1" id="s1"></label>
    <input type="radio" name="slide" class="control" id="Slide2" />
    <label for="Slide2" id="s2"></label>
    <input type="radio" name="slide" class="control" id="Slide3" />
    <label for="Slide3" id="s3"></label>
    <input type="radio" name="slide" class="control" id="Slide4" />
    <label for="Slide4" id="s4"></label>
    <div class="overflow-wrapper">
      <a class="slide" href=""><img src="http://3.bp.blogspot.com/-d-iILl7ujck/Ucmb6q3iC9I/AAAAAAAAA18/Mo4fLPrSb4E/s1600/hinh-nen-may-tinh-poster-phim-13.jpg" /></a>
      <a class="slide" href=""><img src="/940x470" /></a>
      <a class="slide" href=""><img src="https://static.mservice.io/blogscontents/momo-upload-api-210608145446-637587608861472346.jpg" /></a>
      <a class="slide" href=""><img src="http://placehold.it/940x470" /></a>
    </div>
  </div>
</div>
<br>

    <div class="thanh4">
        
       <H2>Phim Đang chiếu</h2>
      <hr width="50px"  color="red">
        <div class="form-group">
            <select name="cả nước">
                <option value="0">Chọn tỉnh</option>
                <option value="1">TPHCM </option>
                <option value="2">Hà nội</option>
                <option value="3">Cần Thơ</option>
            </select>
            
            </select>
           

            <style>
            
              
             
              .thanh8{
            background-color: #f2f2f2;
                width: 800px;
                height: 600px;
        
          border: inset;
              }
              .thanh8 tr th{
                padding: 20px;

              }
              .thanh8 h1{
          padding: 2%;
                text-align: left;
              background-color: chocolate;
              width: 400px;
              }

            .thanh9{
              background-color: #f2f2f2;
                width: 800px;
                height: 600px;
            
            
          border: inset;
              }
              .thanh9 tr th{
                padding: 20px;

              }
              .thanh9 h1{
          padding: 2%;
                text-align: left;
              background-color: chocolate;
              width: 450px;
              }
            </style>
            <br>
            <br>
            <div class="thanh8">

            <?php  
//mở kết nối
  $conn= mysqli_connect('localhost','root','', 'cinema-max');
// xây dựng thực thi truy vấn
$sql="select * from movie";


$recordset =mysqli_query($conn, $sql);
?>
<table border="0">
  <h1 >GALAXY TÂN BÌNH</h1>
 <tr>
  <th>name</th>
  <th>label</th>
  <th>time</th>
  <th>star</th>
 </tr>
 
 <?php
 while($row = mysqli_fetch_assoc($recordset)){
?>
<tr>
  <td><?php echo $row ['name'];?></td>
  <td><?php echo $row ['label'];?></td>
  <td><?php echo $row ['time'];?></td>
  <td><?php echo $row ['star'];?></td>
</tr>
<?php
 }
 ?>
</table>
<?php
// đóng kết nối
mysqli_close($conn);
?>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="thanh9">
<?php  
//mở kết nối
  $conn= mysqli_connect('localhost','root','', 'cinema-max');
// xây dựng thực thi truy vấn
$sql="select * from movie";


$recordset =mysqli_query($conn, $sql);
?>
<table border="0">
  <h1 >GALAXY BÌNH DƯƠNG</h1>
 <tr>
  <th>name</th>
  <th>label</th>
  <th>time</th>
  <th>star</th>
 </tr>
 


 <?php
 while($row = mysqli_fetch_assoc($recordset)){
?>
<tr>
  <td><?php echo $row ['name'];?></td>
  <td><?php echo $row ['label'];?></td>
  <td><?php echo $row ['time'];?></td>
  <td><?php echo $row ['star'];?></td>
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
</div>
<script>
  $(function(){
	
	var timer;
	
	var interval = 3000;
	
	var duration = 300;
	
	var dir = 1;
	
	
	

	$(".slide ul").prepend($(".slide li:last-child"));

	$(".slide ul").css("left", -1000);
	
	timer = setInterval(slideTimer,interval);
	

	

	function slideTimer(){
		
		if(dir == 1) {
		
			$(".slide ul").animate({"left" : "-=1000px"}, duration, function(){
		
			$(this).append($(".slide li:first-child"));
		
			$(this).css("left", -1000);
			});
		}else{
			$(".slide ul").animate({"left" : "+=1000px"}, duration, function(){
	
			$(this).prepend($(".slide li:last-child"));
			 
			$(this).css("left", -1000);
			});
		}
	}
	
	
	$(".prev").click(function(){
		
		dir = -1;
		
		
		clearInterval(timer);
		timer = setInterval(slideTimer,interval);
		
		
	    slideTimer();
	});
	
	
	$(".next").click(function(){
		// 調整方向（向右）
		dir = 1;
		
		
		clearInterval(timer);
		timer = setInterval(slideTimer,interval);
		
	
		slideTimer();
	});
});


</script>