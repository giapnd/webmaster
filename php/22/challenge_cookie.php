<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>challenge_cookie</title>
    </head>
    <body>
        <?php
        if(!isset($_COOKIE['visit_count'])){
            setcookie('visit_count',1,time()+3600);
            setcookie('timer_1',date('Y-m-d h:i:s'),time()+3600);
            print '<h3>初めてのアクセスです<h3>';
            print date('Y-m-d h:i:s').'(現在時間)';
        }else{
            $count=$_COOKIE['visit_count']+1;
            setcookie('visit_count',$count,time()+3600);
            setcookie('timer_'.$count,date('Y-m-d h:i:s'),time()+3600);
        }
        // if($_SERVER['REQUEST_METHOD']==='POST' ){
        //         setcookie('visit_count','',time()-3600);
        //         for ($i=1;$i<=$count;$i++){
        //             setcookie('timer_'.$i,'',time()-3600);
        //         }
        // }    
        ?>
            <div>
            <?php if($count>1){
                print '<h3>合計'.$count.'回目のアクセスです<h3>';}
            ?>
            <?php for($i=1;$i <$count;$i++){
                if($i!=($count-1)){
                    print '<p>'.$_COOKIE['timer_'.$i].'('.$i.'回のアクセス時間)</p>';
                }else{
                    print '<p>'.$_COOKIE['timer_'.$i].'(現在時間)</p>';
                }
            }?>
            </div>
        <form method="post">
            <div id="btn">
                <input type="submit" value="履歴削除" name="clr_btn" id="clr_btn">
                <input type="hidden" name="delete" value="delete" >
            </div>
        </form>
        
    </body>
</html>