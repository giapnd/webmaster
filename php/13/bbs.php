<?php
$filename='./file_bbs.txt';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $name=$_POST['name'].':';
    $comment = $_POST['comment']."\n";
    if((trim($name)!=='')&&(trim($comment) !=='')){ 
        if(($fp=fopen($filename,'a')) !==FALSE){
            if(fwrite($fp,$name)===FALSE || fwrite($fp,$comment)===FALSE){
                print 'ファイル書き込み失敗：'.$filename;
            }
            
            fclose($fp);
        }
    }else{
        print '●'.'名前、ひとことを入力してください';
    }
    
} 
$data = [];
if(is_readable($filename)===TRUE){
    if(($fp=fopen($filename,'r'))!==FALSE){
        while (($tmp= fgets($fp)) !==FALSE){
            $data[]=htmlspecialchars($tmp, ENT_QUOTES,'UTF-8');
        }
        fclose($fp);
    }
} else {
    $data[]='ファイルがありません';
}

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ひとこと掲示板</title>
    </head>
    <body>
        <form method="post">
            <lable>名前：</lable>
            <input type="text" name="name">
            <lable>ひとこと：</lable>
            <input type="text" name="comment">
            <input type="submit" name "submit" value="送信">
        </form>
        <?php foreach ($data as $read) {?>
        <p><?php print '●'.$read.'-'.date('Y-m-d h:m:i') ;?></p>
        <?php
        }
        ?>
    </body>
    
</html>


