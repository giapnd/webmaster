<?php
function get_cart_product($dbh,$product_id){
    $sql='select id,name,price,img,category,stock,status,description from t_product where status =1 and id=? ';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$product_id,PDO::PARAM_STR);
    $res->execute();
    $rows=$res->fetchAll();
    return $rows;
}

function update_item_product($dbh,$id,$b){
    $sql='update t_product set stock=stock-1 where id=? ';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$id,PDO::PARAM_STR);
    $res->execute();
    return $b+1;
}

function insert_item_cart($dbh,$account_name,$id,$price,$create_datetime,$a){
    $sql='insert into t_cart(user_id,item_id,amount,created_at) values(?,?,?,?) ';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$account_name,PDO::PARAM_STR);
    $res->bindValue(2,$id,PDO::PARAM_STR);
    $res->bindValue(3,$price,PDO::PARAM_STR);
    $res->bindValue(4,$create_datetime,PDO::PARAM_STR);
    $res->execute();
    return $a+1;
}

?>