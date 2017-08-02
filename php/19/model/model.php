<?php
function price_before_tax($price){
    return ceil($price*TAX);
}

function price_before_tax_assoc_array($assoc_array){
    foreach ($assoc_array as $key => $value){
        $assoc_array[$key]['price']=price_before_tax($assoc_array[$key]['price']);
    }
    return $assoc_array;
}

function entity_str($str){
    return htmlspecialchars($str,ENT_QUOTES,HTML_CHARACTER_SET);
}


function entity_assoc_array($assoc_array){
    foreach($assoc_array as $key => $value){
        foreach($value as $keys => $values){
            $assoc_array[$key][$keys]=entity_str($values);
        }
        
    }
    return $assoc_array;
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
function get_goods_table_list($dbh){
    $sql='select name,price from test_products';
    return get_as_array($dbh,$sql);
}
?>