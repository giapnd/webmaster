<?php
if ($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['sinchou'])===TRUE){
        $sinchou=htmlspecialchars($_POST['sinchou'],ENT_QUOTES,'UTF-8');
    }
    if(isset($_POST['taijyuu'])===TRUE){
        $taijyuu=htmlspecialchars($_POST['taijyuu'],ENT_QUOTES,'UTF-8');
    }
}
function calc_bmi($a,$b){
                $bmi=0;
                $bmi=round($b*10000/($a*$a),1);
                return $bmi;
}
$msg=array();
$msg[1]='<p>入力した値が違いましたので一度入力してください。</P>';
$msg[2]='<p>入力しないので入力してください</p>';
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>BMI</title>
    </head>
    <body>
        <form method="post">
            <h1>BMI計算</h1>
            <lable>身長：<input type="text" name="sinchou" value="<?php if(isset($_POST['sinchou'])===TRUE){print $sinchou;}?>"></lable>
            <lable>体重：<input type="text" name="taijyuu" value="<?php if(isset($_POST['taijyuu'])===TRUE){print $taijyuu;}?>"></lable>
            <input type="submit" value="BMI計算">
            <?php
            if(isset($_POST['sinchou'])==TRUE && isset($_POST['taijyuu'])==TRUE){
                if($sinchou !=='' && $taijyuu!==''){
                if($sinchou!=0 && is_numeric($sinchou) && is_numeric($taijyuu)){
                    print '<p>あなたのBMIは'.calc_bmi($sinchou,$taijyuu).'です。</p>';
                }else{
                    print $msg[1];
                }
                }else{
                    print $msg[2];
                }
            }
            ?>
        </form>
    </body>
</html>