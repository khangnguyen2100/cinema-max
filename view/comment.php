<?php

$id = null;
$id_pro = null;
$view = 1;
if (isset($_GET['id_comment'])) {
	$id_cmt = $_GET['id_comment'];
	action("DELETE FROM Comment WHERE id = '$id_cmt'");
}
if (isset($_GET['id']) && isset($_GET['cate'])) {

	$id = $_GET['id'];
	$cate = $_GET['cate'];
	foreach (selectDb("SELECT * FROM movie WHERE id = '$id'") as $row) {
		$id_pro  = $row['id'];
		$view += $row['view'];
		action("UPDATE movie SET view='$view' WHERE id = '$id'");
	}
}
// else {
// 	header("Location:index.php");
// }
// handle add comment
if ((isset($_SESSION['user']) || isset($_SESSION['admin'])) && isset($_POST['comment'])) {
	$id = createId();
	$movie_id = $_GET['id'];
	$user_id = $_SESSION['user_id'];
	$content = $_POST['commentPro'];
	action("INSERT INTO `comment`(`id`, `content`, `movie_id`, `user_id`) VALUES ('$id','$content', '$movie_id','$user_id')");
} elseif (!isset($_SESSION['user']) && isset($_POST['comment'])) {
	echo "<script>alert('Vui lòng đăng nhập trước khi bình luận!')</script>";
}
?>

<div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>
</div>
</div>
</div>
<div class="container">

	<div class=" single_top">
		<div>
			<?php
			foreach (selectDb("SELECT * FROM movie WHERE id = '$id'") as $row) { ?>
				<div class="single_grid">
					<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								<a href="#">
									<img class="etalage_thumb_image" src="public/images/<?= $row['images'] ?>" width="300px" height="300px" class="img-responsive" />

								</a>
							</li>

						</ul>
						<div class="clearfix"> </div>
					</div>
					<div class="desc1 span_3_of_2">

						<h4><?= $row['name'] ?></h4>
						<div class="cart-b">
							<div class="left-n "><?= number_format($row['ticket_price'] - ($row['ticket_price'] * ($row['amount_tiket'] / 100))) . "đ" ?></div>
							<a class="now-get get-cart-in" href="#">Thêm vào giỏ hàng</a>
							<div class="clearfix"></div>
						</div>
						<h6>Tình trạng: <?= $tt = $row['total'] != 0 ? "Còn hàng" : "Hết hàng" ?></h6>
						<p><?= $row['name'] ?></p><br>
						<p><?= $row['description'] ?></p>
					</div>

					<div class="toogle">
						<h3 class="m_3">Chi tiết sản phẩm</h3>
						<p class="m_text"><?= $row['detail'] ?></p>
					</div>
				<?php

			}
				?>

				</div>
				<h3>Bình luận</h3>
				<form method="post">
					<textarea name="commentPro" id="inputcommentPro" class="form-control" rows="6" required="required"></textarea> <br>
					<button type="submit" name="comment" class="btn btn-danger">Bình luận</button>
				</form>
				<?php
				$id = $_GET['id'];
				foreach (selectDb("SELECT * FROM comment WHERE movie_id = '$id' ORDER BY id DESC") as $row) {
					$user_id = $row['user_id'];
					foreach (selectDb("SELECT * FROM user WHERE id= '$user_id'") as $tow) {
						?>
						<div style="margin:20px 0px;border-bottom:1px solid #cdcdcd">
							<b><?= $tow['full_name'] ?></b> <span style="float:right;font-size:10px"><?= $row['date'] ?></span>
							<p class="m_text"><?= $row['content'] ?></p>
							<?php
							if (isset($_SESSION['user'])) {
								if ($tow['email'] == $_SESSION['user']) { ?>
									<a href="comment.php?id_comment=<?= $row['id'] ?>" style="font-size:10px">Xoa</a>
								<?php
								}							
							} else if (isset($_SESSION['admin']))
								if ($tow['email'] == $_SESSION['admin']) { ?>
								<a href="commnet.php?id=<?= $id ?>&catefory_id=<?= $cate ?>&id_comment=<?= $row['id'] ?>" style="font-size:10px" onclick="tai_lai_trang()">Xoa</a>
							<?php

								}
							?>
						</div>
				<?php

					}
				}
				?>

		</div>

	</div>
	<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo1").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 3
					}
				}
			});

		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
	<script>
		function tai_lai_trang() {
			location.reload();
		}
	</script>