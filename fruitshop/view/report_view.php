<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ショッピングカートページ</title>
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
            <header id="fh5co-header">
                <div class="container-fluid">
                    <div class="row">
                        <table class="fh5co-social">
                            <?php if(isset($_COOKIE['account_id'])) {?>
                            <td>
                    			<?php foreach ($report_cart_of_account as $key => $read) {?>
                                <h2 class="items_bold">品数:<?php print $read['count_sp']; ?>数</h2>
                                <h2 class="items_bold">合計:<?php print $read['sum_amount']; ?>円</h2>
                                <?php }?>
                            </td>
                            <?php }?>
                            <td>
                                <a href="/fruitshop/fruit.php" class="fh5co-post-prev"><span><i class="icon-chevron-left"></i> 前へ</span></a>
                            </td>
                        </table>
                        <div class="col-lg-12 col-md-12 text-center">
            					<h1 id="fh5co-logo">一覧商品果 <sup>ショップ</sup></h1>
            			</div>
        
                    </div>
                </div>    
            </header>
            <?php if(!isset($_COOKIE['account_id'])) {?>
                <p class="items"><?php print $msg; ?></p>
            <?php } else {?>
            <?php if (count($list_item_cart_of_account)==0){?>
                <p class="items"><?php print '商品が購入しませんでした。'; ?></p>
            <?php }else {?>
                <?php foreach ($list_item_cart_of_account as $key => $read) {?>
                <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                    <figure>
                        <img src="<?php print $img_dir.$read['img']; ?>" alt="Image" class="img-responsive">
                    </figure>
                    <h2 class="items">名前：<?php print $read['name']; ?></h2>
                    <h2 class="items">価格：<?php print $read['price'] ; ?>円</h2>
                </article>    
                <?php }?>
            <?php }?>
            <?php }?>
    </body>
</html>