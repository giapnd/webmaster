<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>商品管理ページ</title>
        <link rel="stylesheet" href="./view/admin_view.css">
    </head>
    <body>
        <div><img class="logo" src="./view/image/logo.png"></div>
        <?php if (count($message)!==0){print $message;}?>
        <h1 class="header">商品管理ページ</h1>
        <form method="post" enctype="multipart/form-data">
            <h2>新規商品追加</h2>
            <lable>名前：<input type="text" name="product_name"></lable><br>
            <lable>値段：<input type="text" name="price"></lable><br>
            <lable>個数：<input type="text" name="stock"></lable><br>
            カテゴリー：
            <select name="category">
                <?php foreach ($list_category as $read) {?>
                <option value="<?php print $read['id'] ;?>"><?php print $read['name']; ?></option>          
                <?php }?>  
            </select><br>
            <lable>情報：<textarea rows="5" cols="50" maxlength="20" name="description"></textarea><br>
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
            <?php if(count($err_stock)!==0){?>
                <p class="msg"><?php print $err_stock ;?></p>
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
            <div class="category">カテゴリー</div>
            <div class="status">ステータス</div>
            <div class="description">商品の情報</div>
        </div>
        <?php foreach ($list_product as $read) {?>
            <form method="get" enctype="multipart/form-data"> 
            <div class="group_list" <?php if($read['status']===0){print 'style="background-color:gray"';}?>>
            <div class="image"><img src="<?php print $img_dir.$read['img']; ?>"></div>
            <div class="name"><?php print $read['name']; ?></div>
            <div class="price"><?php print $read['price'] ;?>円</div>
            <div class="stock"><input class="store" type="text" name="stock_update" value="<?php print $read['stock'] ;?>">個
            <input type="hidden" name="id_product"  value="<?php print $read['id']; ?>" name="stock_change" /><input type="submit" class="btn" id="<?php print $read['id']; ?>" value="変更" name="stock_change"></div>
            <div class="category"><?php print $read['category'] ;?></div>
            <div class="status"><input type="hidden" name="id_status"  value="<?php print $read['id']; ?>" name="status_change" /><input type="submit" value="<?php if($read['status']===0){ print '非公開→公開';}else{ print '公開→非公開';}  ?>" name="status_change" ></div>
            <div class="description"><?php print $read['description'] ;?></div>
            </div>
            </form>
        <?php
        }
        ?>
    </body>
</html>