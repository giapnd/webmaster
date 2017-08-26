<?php
function get_db_connect(){
    try{
        $dbh= new PDO(DSN,DB_USER,DB_PASSWD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        $dbh->beginTransaction();
    }catch(PDOException $e){
        echo '接続できませんでした。理由：'.$e->getMessage();
    }
    return $dbh;
}
    
function get_ds_product($dbh){
    $sql='select id,name,price,img,(select name from t_category p where p.id=q.category) as category,stock,status,description from t_product q order by id DESC ';
    $res=$dbh->query($sql);
    $rows=$res->fetchAll();
    return $rows;
}
function get_list_category($dbh){
    $sql='select id, name from t_category order by name DESC';
    $res=$dbh->query($sql);
    $rows=$res->fetchAll();
    return $rows;
}

function get_list_information($dbh){
    $sql='select id, name, description from t_information order by name DESC';
    $res=$dbh->query($sql);
    $rows=$res->fetchAll();
    return $rows;
}

function check_account($dbh,$email,$password){
    $sql='select id,name_kanji,name_furikana,post_number,mobile,email,password,permisions,created_at from t_user where email=? and password=?';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$email,PDO::PARAM_STR);
    $res->bindValue(2,$password,PDO::PARAM_STR);
    $res->execute();
    $rows=$res->fetchAll();
    return $rows;
}

function get_cart_product($dbh,$product_id){
    $sql='select id,name,price,img,(select name from t_category p where p.id=q.category) as category,stock,status,description,created_at from t_product q where status =1 and id=? ';
    $res=$dbh->prepare($sql);
    $res->bindValue(1,$product_id,PDO::PARAM_STR);
    $res->execute();
    $rows=$res->fetchAll();
    return $rows;
}


?>