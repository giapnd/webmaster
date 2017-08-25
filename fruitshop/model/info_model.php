<?php
function get_item_information($dbh,$information_id){
    $sql='select id,name,description from t_information where id=? ';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$information_id,PDO::PARAM_STR);
    $res->execute();
    $rows=$res->fetchAll();
    return $rows;
}
function list_comment_product($dbh,$product_id){
    $sql='select id,(select name_kanji from t_user p where p.id= q.user_id ) as user_name,item_id,comment,display,created_at from t_comment q where item_id=? ';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$product_id,PDO::PARAM_STR);
    $res->execute();
    $rows=$res->fetchAll();
    return $rows;
}

function insert_comment_product($dbh,$user_id,$product_id,$comment,$create_datetime){
    if ($_SERVER['REQUEST_METHOD']==='POST'){
        $sql='insert into t_comment(user_id,item_id,comment,created_at)
        values(?,?,?,?)';
        $stmt=$dbh->prepare($sql);
        $stmt->bindValue(1,$user_id,PDO::PARAM_STR);
        $stmt->bindValue(2,$product_id,PDO::PARAM_STR);
        $stmt->bindValue(3,$comment,PDO::PARAM_STR);
        $stmt->bindValue(4,$create_datetime,PDO::PARAM_STR);
        $stmt->execute();
        $dbh->commit();
    }
    return $message='ごコメントありがとうございます。';
}

?>