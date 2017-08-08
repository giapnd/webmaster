<?php
function validation($drink_name,$price,$stock,$status,$extension,$exit_file){
    $img_dir='img/';
    $new_img_filename='';
    $err_msg=[];
    $pattern='/\D/';
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(is_uploaded_file($_FILES['new_img']['tmp_name']) === TRUE){
                // $extension=pathinfo($_FILES['new_img']['name'],PATHINFO_EXTENSION);
                if($extension==='jpg' || $extension==='jpeg'){
                    // $new_img_filename=sha1(uniqid(mt_rand(),true)).'.'.$extension;
                    $new_img_filename=$exit_file;
                    if(is_file($img_dir.$new_img_filename) !==TRUE){
                        if(move_uploaded_file($_FILES['new_img']['tmp_name'],$img_dir.$new_img_filename) !==TRUE){
                            $err_msg[]='ファイルアップロードに失敗しました。';
                        }
                        
                    }else{
                        $err_msg[]='ファイルアップロードに失敗しました。再度お試しください。';
                    }
                    
                }else{
                    $err_msg[]='ファイル形式が異なります。画像ファイルはJPEGのみ利用可能です。';
                }
                
            }else{
                $err_msg[]='ファイルを選択してください。';
            }
        if(trim($drink_name) === ''){
            $err_msg[]='名前を入力してください';
        }            
        if((trim($price) < 0) || (trim($price) ==='')){
            $err_msg[]='価格を一度入力してください';
        }            
        if((trim($stock) < 0) || (trim($stock) ==='')){
            $err_msg[]='個数を一度入力してください';
        }
        if(preg_match($pattern,$price)){
            $err_msg[]='価格は数値ではありません';
        }
        if(preg_match($pattern,$stock)){
            $err_msg[]='個数は数値ではありません';
        }
        if((trim($status)!=0)&&(trim($status)!=1)){
            $err_msg[]='商品の状況が違います';
        }
    return $err_msg;
    }
}
function validation_result($kingaku,$choice){
    $pattern='/\D/';
    $dbh=get_db_connect();
    $check_money=get_item_drink($dbh,$choice);
    if( $_SERVER['REQUEST_METHOD']==='POST'){
        if(trim($kingaku) === ''){
            $msg[]='金額を入力してください';
        }
        else if(preg_match($pattern,$kingaku)){
            $msg[]='金額は数値ではありません';
        }
        else if($kingaku<$check_money){
            $msg[]='金額は不足です。一度金額を入力してください';
        }
         else if(trim($choice)===''){
            $msg[]='商品を選択してください';
        }
        else if ($kingaku >= $check_money){
            $otsuri=$kingaku-$check_money;
            $update_datetime=date('Y-m-d h:m:i');
            $msg[]='<p>がしゃん！【水】が買えました！</p><p>おつりは【'.$otsuri.'円】です</p>';
            update_stock_item($dbh,$choice,$update_datetime);
        }
    }
    return $msg;  
}
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

function add_drink_table($dbh,$drink_name,$price,$stock,$status,$exit_file,$create_datetime){
    if ($_SERVER['REQUEST_METHOD']==='POST'){
    $sql='insert into drink_master(drink_name,price,img,status,create_datetime)
    values(?,?,?,?,?)';
    $stmt=$dbh->prepare($sql);
    $stmt->bindValue(1,$drink_name,PDO::PARAM_STR);
    $stmt->bindValue(2,$price,PDO::PARAM_STR);
    $stmt->bindValue(3,$exit_file,PDO::PARAM_STR);
    $stmt->bindValue(4,$status,PDO::PARAM_STR);
    $stmt->bindValue(5,$create_datetime,PDO::PARAM_STR);
    $stmt->execute();
    
    $sql='insert into drink_stock(stock,create_datetime)
    values(?,?)';
    $stmt=$dbh->prepare($sql);
    $stmt->bindValue(1,$stock,PDO::PARAM_STR);
    $stmt->bindValue(2,$create_datetime,PDO::PARAM_STR);
    $stmt->execute();
    $dbh->commit();
    //print $dbh->lastInsertId();
    }
    return $message='追加成功';
   
}

function get_list_drink($dbh){
    $sql='select u.drink_name,u.price,u.img,u.status,v.stock,v.drink_id from drink_master u, drink_stock v where u.drink_id=v.drink_id order by v.drink_id DESC ';
    $res=$dbh->query($sql);
    $rows=$res->fetchAll();
    // return get_as_array($dbh,$sql);
    return $rows;
}
function get_item_drink($dbh,$choice){
    $sql='select price from drink_master where drink_id=?';
    $stmt=$dbh->prepare($sql);
    $stmt->bindValue(1,$choice,PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    foreach ($rows as $key => $value){
        return $value['price'];
    }
    
}
function get_list_drink_active($dbh){
    $sql='select u.drink_name,u.price,u.img,u.status,v.stock,v.drink_id from drink_master u, drink_stock v where u.drink_id=v.drink_id and u.status=1 order by v.drink_id DESC ';
    $res=$dbh->query($sql);
    $rows=$res->fetchAll();
    // return get_as_array($dbh,$sql);
    return $rows;
}
function update_stock_table($dbh,$id_stock,$stock_update,$update_datetime){
    
    if ($_SERVER['REQUEST_METHOD']==='GET'){
        $sql='update drink_stock set stock=?, update_datetime=? where drink_id=?';
        $stmt=$dbh->prepare($sql);
        $stmt->bindValue(1,$stock_update,PDO::PARAM_STR);
        $stmt->bindValue(2,$update_datetime,PDO::PARAM_STR);
        $stmt->bindValue(3,$id_stock,PDO::PARAM_STR);
        $stmt->execute();
        $dbh->commit();
    }
}
function update_stock_item($dbh,$choice,$update_datetime){

    if ($_SERVER['REQUEST_METHOD']==='POST'){
        $sql='update drink_stock set stock=stock-1, update_datetime=? where drink_id=?';
        $stmt=$dbh->prepare($sql);
        $stmt->bindValue(1,$update_datetime,PDO::PARAM_STR);
        $stmt->bindValue(2,$choice,PDO::PARAM_STR);
        $stmt->execute();
        $dbh->commit();
    }
}
function update_status($dbh,$id_status, $status,$update_datetime){
    
    if ($_SERVER['REQUEST_METHOD']==='GET'){
        $sql='update drink_master set status=?, update_datetime=? where drink_id=?';
        $stmt=$dbh->prepare($sql);
        $stmt->bindValue(1,$status,PDO::PARAM_STR);
        $stmt->bindValue(2,$update_datetime,PDO::PARAM_STR);
        $stmt->bindValue(3,$id_status,PDO::PARAM_STR);
        $stmt->execute();
        $dbh->commit();
    }
   
}

?>