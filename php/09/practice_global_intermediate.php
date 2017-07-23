<?php
$result='';
if($_SERVER['REQUEST_METHOD']='POST'){
    if(isset($_POST['jibun'])===TRUE){
        $jibun=htmlspecialchars($_POST['jibun'],ENT_QUOTES,'UTF-8');
        $aite=mt_rand(1,3);
        if($aite===1){$aite='グー';}
        else if ($aite===2){$aite='チョキ';}
        else {$aite='パー';}
        if($aite===$jibun){
            $result='draw';
        }else if (($aite==='グー'&&$jibun==='パー')||($aite==='チョキ'&&$jibun==='グー')||($aite==='パー'&&$jibun==='チョキ ')){
            $result='win!!';
        }else{
            $result='lose';
        }
    }
}


?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>じゃんけん</title>
    </head>
    <body>
        <h1>じゃんけん勝負</h1>
        <form method='post'>
            <p>自分：<?php print $jibun; ?></p>
            <p>相手：<?php print $aite; ?></p>
            <p>結果：<?php print $result; ?></p>
            <input type="radio" name="jibun" value="グー" <?php if($jibun==='グー'){ print 'checked'; }?>>グー
            <input type="radio" name="jibun" value="チョキ" <?php if($jibun==='チョキ'){print 'checked';}?>>チョキ
            <input type="radio" name="jibun" value="パー" <?php if($jibun==='パー'){print 'checked';}?>>パー
            <br>
            <input type="submit" value="勝負！！">
        </form>
    </body>
</html>
