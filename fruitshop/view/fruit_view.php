
<!DOCTYPE html>
<html class="no-js" lang="ja">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>トップ（商品一覧）ページ</title>
	<meta name="author" content="giapnguyen" />
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<link rel="shortcut icon" href="favicon.ico">
	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic|Roboto:400,300,700' rel='stylesheet' type='text/css'>
	<!-- Animate -->
	<link rel="stylesheet" href="view/css/animate.css">
	<!-- Icomoon -->
	<link rel="stylesheet" href="view/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="view/css/bootstrap.css">

	<link rel="stylesheet" href="view/css/style.css">


	<!-- Modernizr JS -->
	<script src="view/js/modernizr-2.6.2.min.js"></script>
	</head>
	<body>
	<div id="fh5co-offcanvas">
		<a href="#" class="fh5co-close-offcanvas js-fh5co-close-offcanvas"><span><i class="icon-cross3"></i> <span>Close</span></span></a>
		<div class="fh5co-bio">
			<figure>
				<img src="view/images/logo.png" alt="Free HTML5 Bootstrap Template" class="img-responsive">
			</figure>
			<h3 class="heading"紹介</h3>
			<h2>熱帯フルーツ</h2>
			<p>熱帯フルーツに味をウェイクアップする</p>
		</div>

		<div class="fh5co-menu">
			<div class="fh5co-box">
				<h3 class="heading"><a href="./fruit.php">熱帯のフルーツ</a></h3>
				<ul>
					<li>
						<?php foreach ($list_category as $read) {?>
                    	<p class="items" name="<?php print $read['name'] ;?>"><a href="/fruitshop/fruit.php?category_id=<?php print $read['id'] ;?>" ><?php print $read['name']; ?></a></p>
                    	<?php }?>
					</li>
				</ul>
			</div>
			<div class="fh5co-box">
				<h3 class="heading">検索</h3>
				<form action="#">
					<div class="form-group">
						<input type="text" id="text_search" name="search_name" value="<?php print $search_name ;?>" class="form-control" placeholder="商品検索入力">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- END #fh5co-offcanvas -->
	<header id="fh5co-header">
		<form method="post" action ="./finish.php">
		
		<div class="container-fluid">

			<div class="row">
				<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
				<ul class="fh5co-social">
					<li>
                        <?php if(isset($_COOKIE['account_name'])) {?>
                                <input type="submit" class="items" name="btn_buy" id="btn_buy" value="□ ■購入□ ■">
                        <?php } ?>
					</li>
					<li>
						<a href="./cart.php"><span class="items">カート</span><img class="icon" src="./view/images/cart.jpg">
					</li>
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
                            <?php print '<a href="./admin.php"><span class="items">商品管理ページ</span>'; ?>
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
		<div class="row fh5co-post-entry">
		    <?php if ($information_id==1||$information_id==2||$information_id==3||$information_id==4) {?>
		        <?php foreach ($list_item_information as $read) {?>
		        <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
		            <p><?php print $read['description']?></p>
		        </article>
		        <?php } ?>
		    <?php } else {?>
			<?php if ($search_name !='' && count($result_search)==0){ ?>
			<article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                	<span id="alert_result"><?php print '結果がありません' ;?></span>  
            </article>
                <?php }else { ?>
                	<?php foreach ($list_item_product as $read) {?>
				<article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
					<figure>
						<a href="#"><img src="<?php print $img_dir.$read['img']; ?>" alt="Image" class="img-responsive"></a>
					</figure>
					<span class="fh5co-meta"><a href="#"><?php print $read['category']?></a></span>
					<h2 class="fh5co-meta"><a href="#"><?php print $read['name']?></a></h2>
					<h2 class="fh5co-article-title"><a href="#"><?php print $read['price']?>円</a></h2>
					<?php if(isset($_COOKIE['account_name'])) {?>
                        <?php if ($read['stock']==0) {?> 　
                        <span class="fh5co-meta fh5co-date" style="color:red"><?php print '売り切り' ;?></span>
                        <?php } else {?>
                        <span class="fh5co-meta fh5co-date" style="color:red"><input type="checkbox" value="<?php print $read['id']?>" name="chb_cart[]">カートに入れる</span>
                        <?php }?>
                    <?php }?>
					<span class="fh5co-meta fh5co-date"><?php print $read['created_at']?></span>
				</article>
					<?php }?>
            	<?php }?>
            <?php }?>
		</div>
		</form>
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
	<script src="view/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="view/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="view/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="view/js/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="view/js/main.js"></script>

	</body>
</html>

