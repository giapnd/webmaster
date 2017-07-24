<?php
$value=55.5555;
$floor=floor($value);
$ceil=ceil($value);
$round=round($value);
$round_hundredth=round($value,2);
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>practice_function_intermediate</title>
    </head>
    <body>
        <p>元の値:<?php print $value; ?></p>
        <p>小数切り捨て値:<?php print $floor; ?></p>
        <p>小数切り上げ:<?php print $ceil; ?></p>
        <p>小数四捨五入:<?php print $round; ?></p>
        <p>小数第二位で四捨五入:<?php print $round_hundredth; ?></p>
        
    </body>
</html>