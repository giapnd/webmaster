<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ショッピングカートページ</title>
        <link rel="stylesheet" href="./view/cart_view.css">
    </head>
    <body>
        <form action ="./itemlist.php" class="create_form">
            <h2>一覧商品果</h2>
            <?php if(!isset($_COOKIE['account_id'])) {?>
                <p class="msg"><?php print $msg; ?></p>
            <?php } else {?>
            <?php if (count($list_item_cart_of_account)==0){?>
                <p class="msg"><?php print '商品が購入しませんでした。'; ?></p>
            <?php }else {?>
            <table class="list_product">
                <?php foreach ($list_item_cart_of_account as $key => $read) {?>
                <tr>
                    <td><img src="<?php print $img_dir.$read['img']; ?>"></td>
                    <td>
                        <p>名前：<?php print $read['name']; ?></p>
                        <p>価格：<?php print $read['price'] ; ?>円</p>
                    </td>
                </tr>
                <?php }?>
            </table>
            <?php foreach ($report_cart_of_account as $key => $read) {?>
                <p>品数:<?php print $read['count_sp']; ?>数</p>
                <p>合計:<?php print $read['sum_amount']; ?>円</p>
            <?php }?>
            <?php }?>
            <?php }?>
            <input type="submit" value="■□■□■□■□購入■□■□■□■□" >
        </form>
    </body>
</html>