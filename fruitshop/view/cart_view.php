<!DOCTYPE html>
<html jang="ja">
    <head>
        <meta charset="UTF-8">
        <?php if($a!=0 && $b!=0) {?>
            <title>購入完了ページ</title>
        <?php }else {?>
            <title>カートページ</title>
        <?php }?>
    	<!-- Google Fonts -->
    	<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic|Roboto:400,300,700' rel='stylesheet' type='text/css'>
    	<!-- Animate -->
    	<link rel="stylesheet" href="./view/css/animate.css">
    	<!-- Icomoon -->
    	<link rel="stylesheet" href="./view/css/icomoon.css">
    	<!-- Bootstrap  -->
    	<link rel="stylesheet" href="./view/css/bootstrap.css">
    	
        <link rel="stylesheet" href="./view/css/style.css">
        
        <link rel="stylesheet" href="./view/cart_view.css">
        
        <script src="js/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <header id="fh5co-header">
            <div class="container-fluid">
                <a href="/fruitshop/fruit.php" class="fh5co-post-prev"><span><i class="icon-chevron-left"></i> 前へ</span></a>
                <div class="row">
                <table class="fh5co-social">
                    <td>
                        <?php if(isset($_COOKIE['account_name'])) {?>
                        <?php print '<span class="items">ユーザー名:'.$_COOKIE['account_name'].'</span>'?>
                        <?php }?>
                    </td>
					<td>
                        <?php if(isset($_COOKIE['account_name'])) {?>
                            <span class="items_bold"><a href="./report.php">帳票<img src="view/images/report.png" class="icon"></a></span>
                        <?php } ?>
					</td>
					<td>
					    <?php if(isset($_COOKIE['account_name'])) {?>                    
                        <?php print '<span class="items_bold"><a href="./logout.php">ログアウト</span>';?> 
                        <?php }else {?>
                        <?php print '<a href="./login.php"><span class="items">ログイン</span><img class="icon" src="./view/images/login.png">'; ?>
                        <?php }?>
					</td>
				</table>
                    <div class="col-lg-12 col-md-12 text-center">
                        <?php if (count($list_product_in_cart)==0) {?>
                            <h1 id="fh5co-logo">購入結果<sup>ショップ</sup></h1>
        				<?php } else {?>
        				    <h1 id="fh5co-logo">カート<sup>ショップ</sup></h1>
        				<?php }?>
        			</div>
                </div>
            </div>
        </header>
        <?php if(count($list_product_in_cart) !=0) {?>
            <p><?php print '一覧商品の情報'?></p>
        <?php if(!isset($_COOKIE['account_name'])) {?>
            <?php print '<p style ="color:red">購入するためログインしてください！</p>' ;?>
        <?php }?>
        <form method="post" enctype="multipart/form-data">
        <?php foreach ($report_t_product_of_session as $key => $read) {?>
            <h2 >品数:<?php print $read['count_sp']; ?>数</h2>
            <h2 >合計:<?php print $read['sum_amount']; ?>円</h2>
        <?php }?>    
        <?php if(isset($_COOKIE['account_name'])) {?>
        <div id="submit">
            <?php if (count($err_msg)!==0){?>
                <?php foreach($err_msg as $key => $value) {?>
                <p class="msg"><?php print $value; ?></p>
                <?php }?>
            <?php }?>
            <?php if(count($err_stock)!==0){?>
                <p class="msg"><?php print $err_stock ;?></p>
            <?php }?>
            <input type="submit" name="btn_buy" value="□ ■ □ ■購入□ ■ □ ■">
        </div>
        <?php } ?>
        </form>
        <div class="group_list">
            <div class="image">商品画像</div>
            <div class="name">商品名</div>
            <div class="price">価格</div>
            <div class="stock">在庫数</div>
            <div class="description">商品の情報</div>
        </div>
        <?php foreach ($list_product_in_cart as $read) {?>
        <form method="get" enctype="multipart/form-data"> 
        <div class="group_list">
            <div class="image"><img src="<?php print $img_dir.$read['img']; ?>">
            <a href="./cart.php?delete_item=<?php print $read['id']; ?>">削除</a></div>
            <div class="name"><?php print $read['name']; ?>
            <input type="hidden" name="id_status"  value="<?php print $read['id']; ?>" name="status_change" /></div>
            <div class="price"><?php print $read['amount'] ;?>円</div>
            <div class="stock"><input class="store" type="text" name="stock_update" required="required" value="<?php print $read['order_stock'] ;?>">個
            <input type="hidden" name="id_product"  value="<?php print $read['id']; ?>" name="stock_change" />
            <input type="submit" class="btn" id="<?php print $read['id']; ?>" value="変更" name="stock_change"></div>
     
            
            <div class="description"><?php print $read['stock'] ;?></div>
        </div>
        </form>
            <?php }?>       
        <?php }else {?>
            <?php if(isset($_COOKIE['account_name'])) {?>
            <?php print '<p class="col-lg-12 col-md-12 text-center">購入完了しましたので他の商品を選択してください。</p>';?>
            
        <?php }else {?>
            <?php print '<p class="col-lg-12 col-md-12 text-center">カートに商品を選択してください。</p>';?>
        <?php }?>
        <?php }?>
          
    </body>
</html>