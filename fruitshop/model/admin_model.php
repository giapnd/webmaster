<?php
function validation($product_name,$price,$stock,$category,$status,$description,$extension,$exit_file){
    $img_dir='img/';
    $new_img_filename='';
    $err_msg=[];
    $pattern='/\D/';
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(is_uploaded_file($_FILES['new_img']['tmp_name']) === TRUE){
                // $extension=pathinfo($_FILES['new_img']['name'],PATHINFO_EXTENSION);
                if($extension==='jpg' || $extension==='jpeg'||$extension==='png'||$extension==='PNG'||$extension==='JPEG'||$extension==='JPG' ){
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
        if(trim($product_name) === ''){
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
        if(trim($category) === ''){
            $err_msg[]='カテゴリーを入力してください';
        }  
        if((trim($status)!=0)&&(trim($status)!=1)){
            $err_msg[]='商品の状況が違います';
        }
    return $err_msg;
    }
}

function add_product($dbh,$product_name,$price,$stock,$category,$status,$description,$exit_file,$create_datetime){
    if ($_SERVER['REQUEST_METHOD']==='POST'){
    $sql='insert into t_product(name,price,img,category,status,stock,description,created_at)
    values(?,?,?,?,?,?,?,?)';
    $stmt=$dbh->prepare($sql);
    $stmt->bindValue(1,$product_name,PDO::PARAM_STR);
    $stmt->bindValue(2,$price,PDO::PARAM_STR);
    $stmt->bindValue(3,$exit_file,PDO::PARAM_STR);
    $stmt->bindValue(4,$category,PDO::PARAM_STR);
    $stmt->bindValue(5,$status,PDO::PARAM_STR);
    $stmt->bindValue(6,$stock,PDO::PARAM_STR);
    $stmt->bindValue(7,$description,PDO::PARAM_STR);
    $stmt->bindValue(8,$create_datetime,PDO::PARAM_STR);
    $stmt->execute();
    $dbh->commit();
    }
    return $message='追加成功';
   
}

function update_stock($dbh,$id_product,$stock_update,$update_datetime){
    
    if ($_SERVER['REQUEST_METHOD']==='GET'){
        $sql='update t_product set stock=?, updated_at=? where id=?';
        $stmt=$dbh->prepare($sql);
        $stmt->bindValue(1,$stock_update,PDO::PARAM_STR);
        $stmt->bindValue(2,$update_datetime,PDO::PARAM_STR);
        $stmt->bindValue(3,$id_product,PDO::PARAM_STR);
        $stmt->execute();
        $dbh->commit();
    }
}

function update_status($dbh,$id_status, $status,$update_datetime){
    
    if ($_SERVER['REQUEST_METHOD']==='GET'){
        $sql='update t_product set status=?, updated_at=? where id=?';
        $stmt=$dbh->prepare($sql);
        $stmt->bindValue(1,$status,PDO::PARAM_STR);
        $stmt->bindValue(2,$update_datetime,PDO::PARAM_STR);
        $stmt->bindValue(3,$id_status,PDO::PARAM_STR);
        $stmt->execute();
        $dbh->commit();
    }
   
}

?>