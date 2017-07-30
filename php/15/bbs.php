<?php
$host='localhost';
$username='giapnd';
$password='';
$dbname='camp';
$charset='UTF8';
$dsn = 'mysql:dbname='.$dbname.';host='.$host.';charset='.$charset;

    try{
        $dbh = new PDO($dsn,$username,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $user_name=$_POST['name'];
            $user_comment = $_POST['comment'];
            $create_datetime = date('Y-m-d h:m:i');
            if((trim($user_name)!=='')&&(trim($user_comment) !=='')){ 
                $sql='insert into post_comment(user_name,user_comment,create_datetime) values (?,?,?)';
                $stmt=$dbh->prepare($sql);
                $stmt->bindValue(1,$user_name,PDO::PARAM_STR);
                $stmt->bindValue(2,$user_comment,PDO::PARAM_STR);
                $stmt->bindValue(3,$create_datetime,PDO::PARAM_STR);
                $stmt->execute();
            }else{
                print '●'.'名前、ひとことを入力してください';
            }
            
        }
        ///if($_SERVER['REQUEST_METHOD']==='POST'){
            $sql='select * from post_comment';
            $stmt=$dbh->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll();
        //}
        } catch(PDOException $e) {
            echo '接続できませんでした。理由：'.$e->getMessage();
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
        <?php if(is_array($rows)){?>
            <?php foreach ($rows as $read) {?>
            <p><?php print '●'.$read[1].':'.$read[2].'-'.$read[3] ;?></p>
        <?php
        }
        ?>
        <?php
        }
        ?>

    </body>
    
</html>


