<?php
function validation(){
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $user_name=$_POST['name'];
        $comment=$_POST['comment'];
        if(trim($user_name)==='' && trim($comment)!==''){
            $err_msg[]='名前を入力してください。';
        }        
        if(trim($user_name)!=='' && trim($comment)===''){
            $err_msg[]='コメントを入力してください。';
        }        
        if(trim($user_name)==='' && trim($comment)===''){
            $err_msg[]='名前・コメントを入力してください。';
        }
    }
    return $err_msg;
}

function get_db_connect(){
    try{
        $dbh= new PDO(DSN,DB_USER,DB_PASSWD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    }catch(PDOException $e){
        echo '接続できませんでした。理由：'.$e->getMessage();
    }
    return $dbh;
}

function add_comment_table($dbh,$sql){
    if ($_SERVER['REQUEST_METHOD']==='POST'){
    $user_name=$_POST['name'];
    $user_comment=$_POST['comment'];
    $create_datetime=date('Y-m-d h:m:i');
    $sql='insert into post_comment(user_name,user_comment,create_datetime) values (?,?,?)';
    $stmt=$dbh->prepare($sql);
    $stmt->bindValue(1,$user_name,PDO::PARAM_STR);
    $stmt->bindValue(2,$user_comment,PDO::PARAM_STR);
    $stmt->bindValue(3,$create_datetime,PDO::PARAM_STR);
    $stmt->execute();
    }
}

function get_as_array($dbh,$sql){
    try{
        $stmt=$dbh->prepare($sql);
        $stmt->execute();
        $rows=$stmt->fetchAll();
    }catch(PDOException $e){
        echo '接続できませんでした。理由：'.$e->getMessage();
    }
    return $rows;
}

function get_user_comment($dbh){
    $sql='select user_name,user_comment,create_datetime from post_comment order by create_datetime desc';
    return get_as_array($dbh,$sql);
}
?>