<?php
function validation($kanji_lastname,$kanji_firstname,$furi_lastname,$furi_firstname,$post_first,$post_last,$mobile_first,$mobile_mid,$mobile_last,$email,$password,$re_password){
    $err_msg=[];
    $pattern='/\D/';
    $pattern_email='/[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}/';
    $pattern_pass='^(?=.*[A-Z].*[A-Z])(?=.*[!@#$&*])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z].*[a-z]).{8}$';
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(trim($kanji_lastname) === ''){
            $err_msg[]='名前を入力してください';
        } 
        if(trim($kanji_firstname) === ''){
            $err_msg[]='名前を入力してください';
        }
        if(trim($furi_lastname) === ''){
            $err_msg[]='名前を入力してください';
        } 
        if(trim($furi_firstname) === ''){
            $err_msg[]='名前を入力してください';
        } 
        if(trim($post_first) ===''){
            $err_msg[]='郵便番号を入力してください';
        }
        if(trim($post_last) ===''){
            $err_msg[]='郵便番号を入力してください';
        }  
        if(trim($mobile_first) ===''){
            $err_msg[]='電話番号を入力してください';
        }
        if(trim($mobile_mid) ===''){
            $err_msg[]='電話番号を入力してください';
        }
        if(trim($mobile_last) ===''){
            $err_msg[]='電話番号を入力してください';
        }
        if(trim($email) ===''){
            $err_msg[]='メールアドレスを入力してください';
        }
        if(trim($password) ===''){
            $err_msg[]='パスワードを入力してください';
        }
        if(trim($re_password) ===''){
            $err_msg[]='パスワードをも一度入力してください';
        }
        if(trim($re_password) !==trim($password)){
            $err_msg[]='パスワードと確認パスワードが一括しませんでした。';
        }
        if(preg_match($pattern,$post_first)){
            $err_msg[]='郵便番号は数値ではありません';
        }
        if(preg_match($pattern,$post_last)){
            $err_msg[]='郵便番号は数値ではありません';
        }
        if(preg_match($pattern,$mobile_first)){
            $err_msg[]='電話番号は数値ではありません';
        }
        if(preg_match($pattern,$mobile_mid)){
            $err_msg[]='電話番号は数値ではありません';
        }
        if(preg_match($pattern,$mobile_last)){
            $err_msg[]='電話番号は数値ではありません';
        }
        if(preg_match($pattern_email,$email)){
            $err_msg[]='メールアドレスではありません';
        }
    return $err_msg;
    }
}

function add_user($dbh,$kanji_lastname,$kanji_firstname,$furi_lastname,$furi_firstname,$post_first,$post_last,$mobile_first,$mobile_mid,$mobile_last,$email,$password,$create_datetime){
    if ($_SERVER['REQUEST_METHOD']==='POST'){
    $sql='insert into t_user(name_kanji,name_furikana,post_number,mobile,email,password,created_at)
    values(?,?,?,?,?,?,?)';
    $stmt=$dbh->prepare($sql);
    $stmt->bindValue(1,$kanji_lastname.$kanji_firstname,PDO::PARAM_STR);
    $stmt->bindValue(2,$furi_lastname.$furi_firstname,PDO::PARAM_STR);
    $stmt->bindValue(3,$post_first.$post_last,PDO::PARAM_STR);
    $stmt->bindValue(4,$mobile_first.$mobile_mid.$mobile_last,PDO::PARAM_STR);
    $stmt->bindValue(5,$email,PDO::PARAM_STR);
    $stmt->bindValue(6,$password,PDO::PARAM_STR);
    $stmt->bindValue(7,$create_datetime,PDO::PARAM_STR);
    $stmt->execute();
    $dbh->commit();
    }
    return $message='追加成功';
   
}
?>