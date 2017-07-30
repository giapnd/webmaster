<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>DB操作</title>
    </head>
    <body>
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
            // echo 'データベースに接続しました。';
            $price=200;
            $sql='select * from products where price > ?';
            $stmt=$dbh->prepare($sql);
            $stmt->bindValue(1,$price,PDO::PARAM_INT);
            $stmt->execute();
            $rows=$stmt->fetchAll();
            var_dump($rows);
        } catch(PDOException $e) {
            echo '接続できませんでした。理由：'.$e->getMessage();
        }
        
        ?>
    </body>
</html>