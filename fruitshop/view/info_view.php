
<!DOCTYPE html>
	<html class="no-js" lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>トップ商品情報ページ</title>
		<!-- Google Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic|Roboto:400,300,700' rel='stylesheet' type='text/css'>
		<!-- Animate -->
		<link rel="stylesheet" href="./view/css/animate.css">
		<!-- Icomoon -->
		<link rel="stylesheet" href="./view/css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="./view/css/bootstrap.css">
	
		<link rel="stylesheet" href="./view/css/style.css">
	
		<script src="js/modernizr-2.6.2.min.js"></script>
	</head>
	<body>
	<header id="fh5co-header">
		<form method="post" action ="#">
		
		<div class="container-fluid">

			<div class="row">
				<a href="/fruitshop/fruit.php" class="fh5co-post-prev"><span><i class="icon-chevron-left"></i> 前へ</span></a>
				<ul class="fh5co-social">
					<li>
						<?php if(isset($_COOKIE['account_name'])) {?>
                        <?php print '<a href="./logout.php"><span class="items">'.$_COOKIE['account_name'].'</span><img class="icon" src="./view/images/logout.png">';?> 
                        <?php }else {?>
                        <?php print '<a href="./login.php"><span class="items">ログイン</span><img class="icon" src="./view/images/login.png">'; ?>
                        <?php }?>
                    </li>
                    <li>
                    	<?php if(isset($_COOKIE['permisions'])) {?>
                        <?php if($_COOKIE['permisions']==1) {?>
                            <?php print '<a href="./admin.php"><span class="items">商品管理ページ <img src="./view/images/admin.png"></span>'; ?>
                        <?php }?>
                        <?php }?>
                    </li>
				</ul>
				<div class="col-lg-12 col-md-12 text-center">
					<h1 id="fh5co-logo"><a href="/fruitshop/fruit.php">熱帯のフルーツ <sup>ショップ</sup></a></h1>
				</div>
			</div>
		</div>
	</header>
	<!-- END #fh5co-header -->
	<div class="container-fluid">
		<div class="row fh5co-post-entry single-entry">
			<form method="post">
			<article class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
				<?php foreach ($list_product_info as $read) {?>
					<figure class="animate-box">
						<img src="<?php print $img_dir.$read['img']; ?>" alt="Image" class="img-info-responsive">
					</figure>
					<span class="fh5co-meta animate-box"><?php print $read['category'] ;?></span>
					<h2 class="items"><?php print $read['name'] ;?></h2>
					<h2 class="items"><a href="#"><?php print $read['price'] ;?>円</a></h2>
					<span class="fh5co-meta fh5co-date"><?php print $read['created_at'] ;?></span>
					
				<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">
					<div class="row">
						<div class="col-lg-8 cp-r animate-box">
							<p><?php print $read['description'] ;?></p>
						</div>
					</div>
					<?php }?>
					<?php if (!isset ($_COOKIE['account_name'])) {?>
						<div class="row rp-b">
							<blockquote>
								<p>&ldquo;コメントするためロギングしてください。&rdquo;</p>
							</blockquote>
						</div>	
					<?php } else{?>
						<?php if(count($list_comment_product)==0){?>
							<div class="row rp-b">
								<blockquote>
									<p>&ldquo;コメントがありません！&rdquo;</p>
								</blockquote>
							</div>	
						<?php } else{?>
						<?php foreach ($list_comment_product as $read) {?>
							<div class="row rp-b">
								<div class="col-md-12 animate-box">
									<blockquote>
										<p>&ldquo; <?php print $read['comment'] ;?>&rdquo; <cite>&mdash; <?php print $read['user_name'] ;?></cite></p>
									</blockquote>
								</div>
							</div>
						<?php }?>
						<?php }?>
					<div class="row rp-b">
						<p>コメント内容</p>
						<textarea rows="5" cols="50" maxlength="20" name="comment"></textarea><br>
			            <?php if (count($err_msg)!==0){?>
		                	<?php foreach($err_msg as $key => $value) {?>
				                <p class="msg"><?php print $value; ?></p>
				            <?php }?>
					        <?php }?>
					        <?php if(count($msg)!==0){?>
					             <p class="msg"><?php print $msg ;?></p>
			            <?php }?>
						<input type="submit" class="btn" value="□ ■コメント□ ■">
					</div>
					<?php }?>
		
				</div>
				</form>
			</article>
		</div>
	</div>

	<footer id="fh5co-footer">
	        <table class="footer">
                <?php foreach ($list_infomation as $read) {?>
                <td name="<?php print $read['name'] ;?>" value="<?php print $read['id'] ;?>"><a href="/fruitshop/fruit.php?information_id=<?php print $read['id'] ;?>"><?php print $read['name']; ?></a></td>
                <?php }?>
            </table>
            <p id="copyright"><small>Copyright&CodeCamp All Right Reserved</small></p>
	</footer>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>

	</body>
</html>

