<?php
$host='localhost';
$username='giapnd';
$password='';
$dbname='camp';
$charset='UTF8';

$dsn='mysql:dbname='.$dbname.';host='.$host.';charset='.$charset;
$img_dir='img/';
$err_msg=[];
$new_img_filename='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(is_uploaded_file($_FILES['new_img']['tmp_name']) === TRUE){
                $extension=pathinfo($_FILES['new_img']['name'],PATHINFO_EXTENSION);
                if($extension==='jpg' || $extension==='jpeg'){
                    $new_img_filename=sha1(uniqid(mt_rand(),true)).'.'.$extension;
                    if(is_file($img_dir.$new_img_filename) !==TRUE){
                        if(move_uploaded_file($_FILES['new_img']['tmp_name'],$img_dir.$new_img_filename) !==TRUE){
                            $err_msg='ファイルアップロードに失敗しました。';
                        }
                        
                    }else{
                        $err_msg='ファイルアップロードに失敗しました。再度お試しください。';
                    }
                    
                }else{
                    $err_msg='ファイル形式が異なります。画像ファイルはJPEGのみ利用可能です。';
                }
                
            }else{
                $err_msg='ファイルを選択してください。';
            }
    $drink_name=$_POST['drink_name'];
    $price=$_POST['price'];
    $stock=$_POST['stock'];
    $create_datetime=date('Y/m/d h:m:i');
    if((trim($drink_name) === '')||(trim($price) === '')){
        $err_msg='名前、値段を入力してください';
    }
}
// Goi gia tri update stock
if(isset($_GET['Change']) && $_SERVER['REQUEST_METHOD']==='GET'){
     $id_button=$_GET['id'];
     $stock=$_GET['stock'];
     $update_datetime=date('Y-m-d h:m:i');
    // echo 'id button:'.$id_button;
    // echo 'stock:'.$stock;
}
try{
    $dbh= new PDO($dsn,$username,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    $dbh->beginTransaction();
    try{
            if(count($err_msg)===0 && $_SERVER['REQUEST_METHOD']==='POST'){
                $sql='insert into test_drink_master(drink_name,price,img,create_datetime)
                values(?,?,?,?)';
                $stmt=$dbh->prepare($sql);
                $stmt->bindValue(1,$drink_name,PDO::PARAM_STR);
                $stmt->bindValue(2,$price,PDO::PARAM_STR);
                $stmt->bindValue(3,$new_img_filename,PDO::PARAM_STR);
                $stmt->bindValue(4,$create_datetime,PDO::PARAM_STR);
                $stmt->execute();
                
                $sql='insert into test_drink_stock(stock,create_datetime)
                values(?,?)';
                $stmt=$dbh->prepare($sql);
                $stmt->bindValue(1,$stock,PDO::PARAM_STR);
                $stmt->bindValue(2,$create_datetime,PDO::PARAM_STR);
                $stmt->execute();
                $dbh->commit();
                print $dbh->lastInsertId();
            }
            if($_SERVER['REQUEST_METHOD']==='GET'){
                 $sql='update test_drink_stock set stock=?, update_datetime=? where drink_id=?';
                 $stmt=$dbh->prepare($sql);
                 $stmt->bindValue(1,$stock,PDO::PARAM_STR);
                 $stmt->bindValue(2,$update_datetime,PDO::PARAM_STR);
                 $stmt->bindValue(3,$id_button,PDO::PARAM_STR);
                 $stmt->execute();
                 $dbh->commit();
            }
            
    }catch(PDOException $e){
        $dbh->rollBack();
        throw $e;
        
    }
    $sql='select u.drink_name,u.price,u.img,v.stock,v.drink_id from test_drink_master u, test_drink_stock v where u.drink_id=v.drink_id order by v.drink_id DESC ';
    $res=$dbh->query($sql);
    $rows=$res->fetchAll();
    
}catch(PDOException $e){
    echo '接続できません。理由：'.$e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>drink_master</title>
        <link rel="stylesheet" href="drink_master.css">
    </head>
    <body>
        <h1 class="header">自動販売機管理シール</h1>
        <form method="post" enctype="multipart/form-data">
            <h2>新規商品追加</h2>
            <lable>名前：<input type="text" name="drink_name"></lable><br>
            <lable>値段：<input type="text" name="price"></lable><br>
            <lable>個数：<input type="text" name="stock"></lable><br>
            <lable><input type="file" name="new_img"></lable><br>
            <?php if( count($err_msg) !== 0){
                print '<p class="msg">'.$err_msg.'</p>';            
            }?>
            <input type="submit" value="商品を追加">
        </form>
        <h2 class="fotter">商品情報変更</h2>
        <p>商品一覧</p>
        <div class="group_list">
            <div class="image">商品画面</div>
            <div class="name">商品名</div>
            <div class="price">価格</div>
            <div class="stock">在庫数</div>
        </div>
        
        <?php if(is_array($rows)){?>
            <?php foreach ($rows as $read) {?>
            <!--Dat form de xac dinh id tung button-->
            <form method="get" enctype="multipart/form-data"> 
            <div class="group_list">
            <div class="image"><img src="<?php print $img_dir.$read['img']; ?>"></div>
            <div class="name"><?php print $read['drink_name']; ?></div>
            <div class="price"><?php print $read['price'] ;?>円</div>
            <div class="stock"><input class="store" type="text" name="stock" value="<?php print $read['stock'] ;?>">個
            <!--Dat input hidden de xac dinh gia tri id cho tung button-->
            <input type="hidden" name="id"  value="<?php print $read['drink_id']; ?>" name="Change" /><input type="submit" class="btn" id="<?php print $read['drink_id']; ?>" value="変更" name="Change"></div>
            </div>
            </form>
        <?php
        }
        ?>
        <?php
        }
        ?>
        
        
    </body>
</html>