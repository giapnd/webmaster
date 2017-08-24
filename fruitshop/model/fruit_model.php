<?php
function get_item_information($dbh,$information_id){
    $sql='select id,name,description from t_information where id=? ';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$information_id,PDO::PARAM_STR);
    $res->execute();
    $rows=$res->fetchAll();
    return $rows;
}
function get_item_product($dbh,$category_id,$search_name){
    if($category_id=='' && $search_name=='' ){
        $sql='select id,name,price,img,(select name from t_category p where p.id=q.category) as category,  stock,status,description,created_at from t_product q where status =1 order by id DESC ';
        $res=$dbh->query($sql);
        $rows=$res->fetchAll();
        return $rows;
    }else if($category_id!='') {
        $sql='select id,name,price,img,(select name from t_category p where p.id=q.category) as category,stock,status,description from t_product q where status =1 and category=? ';
        $res=$dbh->prepare($sql);
        $res->bindValue(1,$category_id,PDO::PARAM_STR);
        $res->execute();
        $rows=$res->fetchAll();
        return $rows;
    }else if($search_name!=''){
        $sql="select id,name,price,img,(select name from t_category p where p.id=q.category) as category,stock,status,description from t_product q where status =1 and name like '%$search_name%' ";
        $res=$dbh->query($sql);
        $rows=$res->fetchAll();
        return $rows;
    }

}

function get_list_search_name($dbh,$search_name){
    $sql="select id,name,price,img,category,stock,status,description from t_product where status =1 and name like '%$search_name%' ";
    $res=$dbh->query($sql);
    $rows=$res->fetchAll();
    return $rows;
}
function item_category($dbh,$category_id){
    $sql='select id, name from t_category where id=? ';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$category_id,PDO::PARAM_STR);
    $res->execute();
    $rows=$res->fetchAll();
    return $rows;
}

?>