<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset ="UTF-8">
        <title>Cookie</title>
    </head>
    <body>
        <?php
        if(!isset($_COOKIE['visit_count'])){
            setcookie('visit_count',1,time()+3600);
            print("訪問回数は１回<br>");
        }else{
            $count=$_COOKIE['visit_count']+1;
            setcookie('visit_count',$count,time()+3600);
            print("訪問回数は".$count."回<br>");
        }
        ?>
    </body>
</html>