<?php
//$date_log=date('Y-m-d H:i:s');
$filename='./challenge_log.txt';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $comment=date('m月d日 H:i:s').' '.$_POST['comment']."\n";
    if(($fp=fopen($filename,'a')) !== FALSE){
        if(fwrite($fp,$comment) === FALSE){
            print 'ファイルは書き込み失敗'.$filename;
        }
    fclose($fp);    
    }
    
}
$data=[];
if(is_readable($filename) === TRUE ){
    if(($fp=fopen($filename,'r')) !== FALSE){
        while(($tmp=fgets($fp)) !==FALSE){
            $data[]=htmlspecialchars($tmp,ENT_QUOTES,'UTF-8');
        }
        fclose($fp);
    }
}else {
    $data[]='ファイルがありません。';
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ファイル書き込み</title>
    </head>
    <body>
        <form method="post">
            <h1>課題</h1>
            <lable>発信：</lable><input type="text" name ="comment" ><input type="submit" value="送信">
            <?php
            foreach($data as $read){
            ?>
            <p><?php print $read; ?></p>
            <?php
            }
            ?>
        </form>
    </body>
</html>