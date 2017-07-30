<?php
$filename='./tokyo.csv';

$data = [];
if(is_readable($filename)===TRUE){
    if(($fp=fopen($filename,'r'))!==FALSE){
        while (($tmp= fgets($fp)) !==FALSE){
            $data[]=explode(',',htmlspecialchars(str_replace('"',' ',$tmp), ENT_QUOTES,'UTF-8'));
        }
        fclose($fp);
    }
} else {
    $data[]='ファイルがありません';
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset ="UTF-8">
        <title>practice_file</title>
        <link rel="stylesheet" href="practice_file.css">
    </head>
    <body>
        <p>以下にファイルから読み込んだ住所だデータを表示</p>
        <p>住所データ</p>
        <div class="jyusho">
            <div class="yuubin">郵便番号</div>
            <div class="todou">都道府県</div>
            <div class="siku">市区町村</div>
            <div class="machi">町域</div>
        </div>
        <?php foreach ($data as $read) {?>
        <?php print '<div class="jyusho">' ?>
        <?php print '<div class="todou">'.$read[2].'</div>';?>
        <?php print '<div class="todou">'.$read[6].'</div>';?>
        <?php print '<div class="siku">'.$read[7].'</div>';?>
        <?php print '<div class="machi">'.$read[8].'</div>';?>
        <?php print '</div>'?>
        <?php
        }
        ?>
    </body>
</html>