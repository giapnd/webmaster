<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>自動販売機</title>
        <link rel="stylesheet" href="./view/drink_index.css">
    </head>
    <body>
        <h2>自動販売機</h2>
        <form method="post" action ="./result.php">
            <lable>金額<input type="text" name="kingaku"></lable>
            <div id="group_drink">
                <?php foreach ($list_drink as $read) {?>
                <div class="drink" >
                <span class="img_size"><img src="<?php print $img_dir.$read['img']; ?>"></span>
                <span><?php print $read['drink_name'];?></span>
                <span><?php print $read['price'].'円';?></span>
                <span style="color:red"><?php if($read['stock']===0){print '売り切れ';}
                else {print '<input name="choice" type="radio" value="'.$read['drink_id'].'"/>';}?></span>
                </div>
                <?php } ?>
            </div>
            <div id="submit">
                <input type="submit" name="btn_buy" value="□ ■ □ ■購入□ ■ □ ■">
            </div>  
        </form>
    </body>
</html>