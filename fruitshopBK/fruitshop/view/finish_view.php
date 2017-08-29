<!DOCTYPE html>
<html jang="ja">
    <head>
        <meta charset="UTF-8">
        <title>購入完了ページ</title>
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
            <div class="container-fluid">
                <div class="row">
                    <table class="fh5co-social">
                        <td>
                            <a href="/fruitshop/fruit.php" class="fh5co-post-prev"><span><i class="icon-chevron-left"></i> 前へ</span></a>
                        </td>
                    </table>
                    <div class="col-lg-12 col-md-12 text-center">
        				<h1 id="fh5co-logo">購入結果<sup>ショップ</sup></h1>
        			</div>
                </div>
            </div>
        </header>

                <?php if (count($msg) !=0){?>
                    <p class="msg"><?php print $msg; ?></p>
                <?php }else {?>
                    <?php if(count($check) !=0) {?>
                        <p>購入完了しましたのでありがとうございます。</p>
                        <?php foreach ($list_product_in_cart as $key => $read) {?>
                            <?php foreach ($read as $i =>$value) {?>
                                <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                                    <figure>
                                        <img src="<?php print $img_dir.$value['img']; ?>" alt="Image" class="img-responsive">
                                    </figure>
                                    <h2 class="items">名前：<?php print $value['name']; ?></h2>
                                    <h2 class="items">価格：<?php print $value['price'] ; ?>円</h2>
                                    <h2 class="items">情報：<?php print $value['description'] ; ?></h2>
                                    <h2 class="items">残りの商品：<?php print $value['stock'] ; ?>品</h2>
                                </article> 
                            <?php }?>
                        <?php }?>
                    <?php } else {?>
                        <?php print '商品を選択してください。';?>
                    <?php }?>
                <?php }?>
    </body>
</html>