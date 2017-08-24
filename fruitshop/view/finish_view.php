<!DOCTYPE html>
<html jang="ja">
    <head>
        <meta charset="UTF-8">
        <title>購入完了ページ</title>
        <link rel="stylesheet" href="./view/finish_view.css">
    </head>
    <body>
        <h2>購入結果</h2>
        <a href="./fruit.php">戻る</a>
        <?php if ($list_product_in_cart==''){?>
            <p class="msg"><?php print $msg; ?></p>
        <?php }else {?>
        <p>購入完了しましたのでありがとうございます。</p>
        <div class="product" >
        <?php foreach ($list_product_in_cart as $key => $read) {?>
            <?php foreach ($read as $i =>$value) {?>
            <span><img src="<?php print $img_dir.$value['img']; ?>"></span><br>
            <span>名前：<?php print $value['name']; ?></span><br>
            <span>価格：<?php print $value['price'] ; ?>円</span><br>
            <span>情報：<?php print $value['description'] ; ?></span><br>
            <?php }?>
        <?php }?>
        </div>
        <?php }?>
        
    </body>
</html>