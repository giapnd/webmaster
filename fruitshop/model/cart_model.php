<?php

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

function insert_product_by_session($dbh,$product_id,$session_id,$create_datetime,$c) {
    $sql='insert into t_product_history(item_id,session_id,order_stock,amount,created_at) 
        select ?,?,1,price,? from t_product where id=?';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$product_id,PDO::PARAM_STR);
    $res->bindValue(2,$session_id,PDO::PARAM_STR);
    $res->bindValue(3,$create_datetime,PDO::PARAM_STR);
    $res->bindValue(4,$product_id,PDO::PARAM_STR);
    $res->execute();
    $dbh->commit();
    return $c+1;
}

function get_list_product_by_session($dbh,$session_id){
    $sql='select distinct id,(select q.name from t_product q where q.id = p.item_id) as name,amount,(select q.img from t_product q where q.id = p.item_id) as img,(select q.stock from t_product q where q.id = p.item_id) as stock, order_stock from t_product_history p where p.session_id=?';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$session_id,PDO::PARAM_STR);
    $res->execute();
    $rows=$res->fetchAll();
    return $rows;
}

function delete_product_by_session($dbh,$delete_id,$session_id,$d){
    $sql='delete from t_product_history where session_id=? and id=? ';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$session_id,PDO::PARAM_STR);
    $res->bindValue(2,$delete_id,PDO::PARAM_STR);
    $res->execute();
    $dbh->commit();
    return $d+1;
}
function insert_product_by_user($dbh,$user_id,$session_id,$e){
    $sql='insert into t_cart(user_id,item_id,order_stock,amount,created_at) 
            select ?,item_id,order_stock,amount,created_at from t_product_history where session_id=?';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$user_id,PDO::PARAM_STR);
    $res->bindValue(2,$session_id,PDO::PARAM_STR);
    $res->execute();
    $dbh->commit();
    return $e+1;
}
function delete_t_product_history($dbh,$session_id,$f){
    $sql='delete from t_product_history where session_id=?';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$session_id,PDO::PARAM_STR);
    $res->execute();
    $dbh->commit();
    return $f+1;
}

function update_stock_t_product_history($dbh,$id_product,$stock_update,$session_id){
    $sql='update t_product_history set order_stock=? where id=? and session_id=?';
    $stmt=$dbh->prepare($sql);
    $stmt->bindValue(1,$stock_update,PDO::PARAM_STR);
    $stmt->bindValue(2,$id_product,PDO::PARAM_STR);
    $stmt->bindValue(3,$session_id,PDO::PARAM_STR);
    $stmt->execute();
    $dbh->commit();
}
function report_t_product_history($dbh,$session_id){
    $sql='select sum(amount*order_stock) as sum_amount,count(*) as count_sp from t_product_history where session_id=? ';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$session_id,PDO::PARAM_STR);
    $res->execute();
    $rows=$res->fetchAll();
    return $rows;
}
function check_duplicate_product_by_session($dbh,$product_id,$session_id){
    $sql='select id,item_id,order_stock,amount,created_at from t_product_history where item_id=? and session_id=?';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$product_id,PDO::PARAM_STR);
    $res->bindValue(2,$session_id,PDO::PARAM_STR);
    $res->execute();
    $rows=$res->fetchAll();
    return $rows;
}
function update_product_duplicate_by_session($dbh,$product_id,$session_id,$g){
    $sql='update t_product_history set order_stock=order_stock +1 where item_id=? and session_id=?';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$product_id,PDO::PARAM_STR);
    $res->bindValue(2,$session_id,PDO::PARAM_STR);
    $res->execute();
    $dbh->commit();
    return $g+1;
}
function check_store_t_product_by_session($dbh,$session_id){
    $sql='select q.stock - p.order_stock as status from t_product q ,t_product_history p where q.id =p.item_id and session_id=?';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$session_id,PDO::PARAM_STR);
    $res->execute();
    $rows=$res->fetchAll();
    return $rows;
}
function update_stock_in_t_product($dbh,$session_id,$j){
    $sql='update t_product q set q.stock= q.stock - (select p.order_stock from t_product_history p where q.id =p.item_id and p.session_id=? ) where q.id in (select p.item_id from t_product_history p where p.session_id=?) ';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$session_id,PDO::PARAM_STR);
    $res->bindValue(2,$session_id,PDO::PARAM_STR);
    $res->execute();
    return $j+1;
}

?>