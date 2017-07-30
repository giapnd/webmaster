<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>exec</title>
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
            
            $sql='update post_comment set user_name="blackberry" where id="1"';
            $res=$dbh->exec($sql);
            var_dump($res);
            
        }catch(PDOException $e){
            echo '接続できませんでした。理由：'.$e->getMessage();
        }
        
        ?>
    </body>
</html>