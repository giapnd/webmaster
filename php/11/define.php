<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>定数</title>
    </head>
    <body>
        <?php
        define('TAX',2.5);
        $price=100;
        print $price.'円の税込み価格は'.price_before_tax($price).'円です';
        function price_before_tax($price){
            return $price*TAX;
        }
        ?>
    </body>
</html>