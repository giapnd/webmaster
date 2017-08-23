<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>トップ（商品一覧）ページ</title>
        <link rel="stylesheet" href="./view/html5reset.css">
        <link rel="stylesheet" href="./view/itemlist.css">
        
    </head>
    <body>
        <header class="header">
            <form method="get" enctype="multipart/form-data">
                <table class="search_main">
                    <tr>
                        <td>
                            <a href="./itemlist.php"><img class="logo" src="./view/image/logo.png"></a>
                            <p class="sologun">熱帯フルーツに味をウェイクアップする</p>
                        </td>
                        <td>
                            <input type="text" id="text_search" name="search_name" value="<?php print $search_name ;?>" placeholder="商品検索" size="40">
                            <input type="submit" id="btn_search" value="■□検索■□">
                        </td>
                        <td>
                            <span class="font14"><a href="./cart.php">カート</span><img class="icon" src="./view/image/shopping_cart.png">
                        </td>
                        <td>
                            <span class="font14"><?php if(isset($_COOKIE['account_name'])) {?>
                                <?php print '<a href="./logout.php">'.$_COOKIE['account_name'].'<img class="icon" src="./view/image/logout.png">';?> 
                                <?php }else {?>
                                <?php print '<a href="./login.php">ログイン<img class="icon" src="./view/image/login.png">'; ?>
                                <?php }?>
                        </td>
                    </tr>
                </table>
                <div class="container">
                <ul>
                    <?php foreach ($list_infomation as $read) {?>
                    <li name="<?php print $read['name'] ;?>" value="<?php print $read['id'] ;?>"><a href="/codeshop/itemlist.php?information_id=<?php print $read['id'] ;?>"><?php print $read['name']; ?></a></li>
                    <?php }?>
                    <?php if(isset($_COOKIE['permisions'])) {?>
                        <?php if($_COOKIE['permisions']==1) {?>
                            <?php print '<li><a href="./admin.php">商品管理ページ</li>'; ?>
                        <?php }?>
                    <?php }?>
                </ul>
                </div>
            </form>
        </header>
       
        <div class="mainview">
        <img class="main_image" src="./view/image/slide1.jpeg">
        </div>
        <main class="main">
            <nav class="nav">
                <section>
                    <h1 class="category">熱帯のフルーツ</h1>
                    <?php foreach ($list_category as $read) {?>
                    <p class="items" name="<?php print $read['name'] ;?>"><a href="/codeshop/itemlist.php?category_id=<?php print $read['id'] ;?>" ><?php print $read['name']; ?></a></p>
                    <?php }?>
                </section>
            </nav>
            <article class="article">
                <section>
                    <?php if ($information_id==1||$information_id==2||$information_id==3||$information_id==4) {?>
                    <?php foreach ($list_item_information as $read) {?>
                    <h1 class="category"><?php print $read['name']?></h1>
                    <?php }?>
                    <?php } else {?>
                    <?php if ($category_id=='' && $search_name=='') {?>
                    <h1 class="category">熱帯のフルーツ</h1>
                    <?php } else {?>
                    <?php foreach ($get_item_category as $read) {?>
                    <h1 class="category"><?php print $read['name']?></h1>
                    <?php }?>
                    <?php }?>
                    <?php if($search_name!='') {?>
                        <h1 class="category">検索結果</h1>
                    <?php }?>
                    <?php }?>
                </section>
                <form method="post" action ="./finish.php">
                <div id="group_product">
                    <?php if ($information_id==1||$information_id==2||$information_id==3||$information_id==4) {?>
                        <?php foreach ($list_item_information as $read) {?>
                            <p><?php print $read['description']?></p>
                        <?php } ?>
                    <?php } else {?>
                        <?php if ($search_name !='' && count($result_search)==0){ ?>
                            <span><?php print 結果がありません ;?></span>     
                        <?php }else { ?>
                               <?php foreach ($list_item_product as $read) {?>
                                
                                <div class="product" >
                                    <span class="img_size"><img src="<?php print $img_dir.$read['img']; ?>"></span>
                                    <span>名前：<?php print $read['name']; ?></span>
                                    <span>価格：<?php print $read['price'] ; ?>円</span>
                                    <?php if(isset($_COOKIE['account_name'])) {?>
                                        <?php if ($read['stock']==0) {?> 　
                                        <span class="text_cart"><?php print '売り切り' ;?></span>
                                        <?php } else {?>
                                        <span class="text_cart"><input type="checkbox" value="<?php print $read['id']?>" class="chb_cart" name="chb_cart[]">カートに入れる</span>
                                        <?php }?>
                                    <?php }?>
                                </div>
                                
                                <?php } ?>
                                <div id="submit">
                                    <input type="submit" name="btn_buy" id="btn_buy" value="□ ■ □ ■購入□ ■ □ ■">
                                </div> 
                        <?php } ?>
                    <?php }?>
                </div>
                </form>
            </article>
        </main>
        <script language="javascript">
            var btn_search = document.getElementById("btn_search");
            var btn_buy =document.getElementById("btn_buy");
            btn_search.onclick = function(){
                var text_search =document.getElementById("text_search").value;
                if(text_search==''){
                    alert('検索入力してください！');
                }
            }
            btn_buy.onclick = function(){
                    alert('購入しましたのでカートを確認してください！');
                }
            ;
        </script>
        <footer>
            <ul class="footer">
                <?php foreach ($list_infomation as $read) {?>
                <li name="<?php print $read['name'] ;?>" value="<?php print $read['id'] ;?>"><a href="/codeshop/itemlist.php?information_id=<?php print $read['id'] ;?>"><?php print $read['name']; ?></a></li>
                <?php }?>
            </ul>
           <p id="copyright"><small>Copyright&CodeCamp All Right Reserved</small></p>
        </footer>
    </body>
</html>