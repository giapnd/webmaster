<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>自動販売機管理シール</title>
        <link rel="stylesheet" href="./view/drink_master.css">
    </head>
    <body>
        <?php if (count($message)!==0){print $message;}?>
        <h1 class="header">自動販売機管理シール</h1>
        <form method="post" enctype="multipart/form-data">
            <h2>新規商品追加</h2>
            <lable>名前：<input type="text" name="drink_name"></lable><br>
            <lable>値段：<input type="text" name="price"></lable><br>
            <lable>個数：<input type="text" name="stock"></lable><br>
            <lable><input type="file" name="new_img"></lable><br>
            <select name="status">
                <option value="0" >非公開</option>
                <option value="1" >公開</option>
            </select><br> 
            <?php if (count($err_msg)!==0){?>
                <?php foreach($err_msg as $key => $value) {?>
                <p class="msg"><?php print $value; ?></p>
                <?php }?>
            <?php }?>
            <input type="submit" value="□ ■ □ ■商品を追加□ ■ □ ■">
        </form>
        <h2 class="fotter">商品情報変更</h2>
        <p>商品一覧</p>
        <div class="group_list">
            <div class="image">商品画面</div>
            <div class="name">商品名</div>
            <div class="price">価格</div>
            <div class="stock">在庫数</div>
            <div class="status">ステータス</div>
        </div>
        <?php foreach ($list_drink as $read) {?>
            <form method="get" enctype="multipart/form-data"> 
            <div class="group_list" <?php if($read['status']===0){print 'style="background-color:gray"';}?>>
            <div class="image"><img src="<?php print $img_dir.$read['img']; ?>"></div>
            <div class="name"><?php print $read['drink_name']; ?></div>
            <div class="price"><?php print $read['price'] ;?>円</div>
            <div class="stock"><input class="store" type="text" name="stock_update" value="<?php print $read['stock'] ;?>">個
            <input type="hidden" name="id_stock"  value="<?php print $read['drink_id']; ?>" name="stock_change" /><input type="submit" class="btn" id="<?php print $read['drink_id']; ?>" value="変更" name="stock_change"></div>
            <div class="status"><input type="hidden" name="id_status"  value="<?php print $read['drink_id']; ?>" name="status_change" /><input type="submit" value="<?php if($read['status']===0){ print '非公開→公開';}else{ print '公開→非公開';}  ?>" name="status_change" ></div>
            </div>
            </form>
        <?php
        }
        ?>
    </body>
</html>