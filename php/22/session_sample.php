<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>session</title>
    </head>
    <body>
        <?php
        session_start();
        print 'セッション名：'.session_name()."<br>";
        print 'セッション名：'.session_id()."<br>";
        if(isset($_SESSION['count'])){
            $_SESSION['count']++;
        }else{
            $_SESSION['count']=1;
        }
        print $_SESSION['count'].'回目の訪問'.'<br>';
        ?>
    </body>
</html>