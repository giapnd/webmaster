<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ショッピング購入ページ</title>
    	<!-- Google Fonts -->
    	<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic|Roboto:400,300,700' rel='stylesheet' type='text/css'>
    	<!-- Animate -->
    	<link rel="stylesheet" href="view/css/animate.css">
    	<!-- Icomoon -->
    	<link rel="stylesheet" href="view/css/icomoon.css">
    	<!-- Bootstrap  -->
    	<link rel="stylesheet" href="view/css/bootstrap.css">
        <link rel="stylesheet" href="./view/css/style.css">
        <script src="js/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <a href="/fruitshop/fruit.php" class="fh5co-post-prev"><span><i class="icon-chevron-left"></i> 前へ</span></a>
            <header id="fh5co-header">
                <div class="container-fluid">
                    <div class="row">
    				<ul class="fh5co-social">
    				    <li>
						    <span class="items">帳票<input type="image" src="./view/images/cart.jpg" alt="帳票" class="icon" name="btn_report" id="btn_report" /></span>
					    </li>
    					<li>
    						<?php if(isset($_COOKIE['account_name'])) {?>
                            <?php print '<a href="./logout.php"><span class="items">'.$_COOKIE['account_name'].'</span><img class="icon" src="./view/images/logout.png">';?> 
                            <?php }else {?>
                            <?php print '<a href="./login.php"><span class="items">ログイン</span><img class="icon" src="./view/images/login.png">'; ?>
                            <?php }?>
                        </li>
    				</ul>
                        <div class="col-lg-12 col-md-12 text-center">
            					<h1 id="fh5co-logo">一覧商品果 <sup>ショップ</sup></h1>
            			</div>
        
                    </div>
                </div>    
            </header>
            <?php if (count($msg) !=0){?>
                <p class="msg"><?php print $err_msg; ?></p>
            <?php }else {?>
                <?php print '<p>ご購入ありがとうございます。他の商品を選択してください！</p>' ;?>
            <?php }?>
    </body>
</html>