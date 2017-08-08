<!DOCTYPE html>
<html>
    <head lang="ja">
        <meta charset="UTF-8">
        <title>challenge_session</title>
    </head>
    <body>
        <?php
        session_start();
        if(isset($_SESSION['count'])){
            $_SESSION['count']++;
            
        }else{
            $_SESSION['count']=1;
            $_COOKIE['time_start'];
            setcookie('time_start',date('Y-m-d h:i:s'),time()+3600);
        }
        if($_SESSION['count']==1){
            print '<h2>初めてのアクセスです<h2>';
            print '<p>'.date('Y-m-d h:i:s').'(現在日時)</p>';
            
            
        }else{
            print '<h2>合計'.$_SESSION['count'].'回目のアクセスです<h2>';
            print '<p>'.date('Y-m-d h:i:s').'(現在日時)</p>';
            print '<p>'.$_COOKIE['time_start'].'(前回のアクセス日時)</p>';
            setcookie('time_start',date('Y-m-d h:i:s'),time()+3600);
            
        }
        //履歴削除のボタンを選択してデータをアクセスする
        if($_SERVER['REQUEST_METHOD']==='GET'){
            if(isset($_GET['delete'])){
                 session_start();
                 $_SESSION=array();
                 if(isset($_COOKIE['time_start'])){
                    setcookie('time_start','',time()-3600);
                 }
                    session_destroy();
                header('Location: challenge_session.php');
                exit;
            }
            
        }
        ?>
        <form method ="get">
            <div>
                <input type="submit" value="履歴削除" name="delete">
            </div>
        </form>
        
    </body>
</html>