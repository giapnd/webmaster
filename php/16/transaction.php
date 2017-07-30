<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>トランザクション</title>
    </head>
    <body>
        <?php
        $host='localhost';
        $username='giapnd';
        $password='';
        $dbname='camp';
        $charset='UTF8';
        
        $dsn='mysql:dbname='.$dbname.';host='.$host.';charset='.$charset;
        try{
            $dbh= new PDO($dsn,$username,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            
            $dbh->beginTransaction();
            try{
                $now_date=date('Y-m-d H:i:s');
                $sql='insert into test_item_master(id, item_name,price, create_datetime) values(1,"PHP入門",2000,"'.$now_date.'");';
                $stmt=$dbh->prepare($sql);
                $stmt->execute();
                
                $sql='insert into test_item_stock(item_id,stock,create_datetime) values(1,100,"'.$now_date.'");';
                $stmt=$dbh->prepare($sql);
                $stmt->execute();
                
                $dbh->commit();
                echo 'データが登録できました';
            }catch(PDOException $e){
                $dbh->rollback();
                throw $e;
            }
        }catch(PDOException $e){
            echo 'データベース処理でエラーが発生しました。理由：'.$e->getMessage();
        }
        ?>
    </body>
</html>