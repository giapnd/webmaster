<?php
function get_list_item_cart($dbh,$account_id){
    $sql='select name,price,img,description from t_product v inner join t_cart p on v.id=p.item_id where p.user_id=? ';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$account_id,PDO::PARAM_STR);
    $res->execute();
    $rows=$res->fetchAll();
    return $rows;
}
function report_cart($dbh,$account_id){
    $sql='select sum(amount) as sum_amount,count(*) as count_sp from t_cart where user_id=? ';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$account_id,PDO::PARAM_STR);
    $res->execute();
    $rows=$res->fetchAll();
    return $rows;
}
?>