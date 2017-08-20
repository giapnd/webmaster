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
                            <input type="text" id="text_value" name="search_name" value="<?php print $search_name ;?>" placeholder="商品検索" size="40">
                            <input type="submit" id="btn_search" value="■□検索■□">
                        </td>
                        <td>
                            <span class="font14">カート</span><img class="icon" src="./view/image/shopping_cart.png">
                        </td>
                        <td>
                            <span class="font14"><?php if(isset($_COOKIE['account_name'])) {?>
                            <?php print '<a href="./logout.php">'.$_COOKIE['account_name'];?> 
                            <?php print '</span><img class="icon" src="./view/image/logout.png">';?>
                            <?php }else {?>
                            <?php print '<a href="./login.php">ログイン'; ?>
                            <?php print '</span><img class="icon" src="./view/image/login.png">';?>
                            <?php }?>
                            
                        </td>
                    </tr>
                </table>
                <div class="container">
                <ul>
                    <?php foreach ($list_infomation as $read) {?>
                    <li name="<?php print $read['name'] ;?>" value="<?php print $read['id'] ;?>"><a href="/codeshop/itemlist.php?information_id=<?php print $read['id'] ;?>"><?php print $read['name']; ?></a></li>
                    <?php }?>
                </ul>
                </div>
            </form>
        </header>
        <script language="javascript">
            var button = document.getElementById("btn_search");
            button.onclick = function()
            {
                var text_value =document.getElementById("text_value").value;
                if(text_value==''){
                    alert('検索入力してください！');
                }
            };
        </script>
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
                <div id="group_product">
                    <?php if ($information_id==1||$information_id==2||$information_id==3||$information_id==4) {?>
                        <?php foreach ($list_item_information as $read) {?>
                            <p><?php print $read['description']?></p>
                        <?php } ?>
                    <?php } else {?>
                    <?php if ($category_id=='' && $search_name=='') {?>
                        <?php foreach ($list_product as $read) {?>
                        <form method="post">
                        <div class="product" >
                            <span class="img_size"><img src="<?php print $img_dir.$read['img']; ?>"></span>
                            <span>名前：<?php print $read['name']; ?></span>
                            <span>価格：<?php print $read['price'] ; ?>円</span>
                            <?php if(isset($_COOKIE['account_name'])) {?>
                                <?php if ($read['stock']==0) {?> 　
                                <span><?php print '売り切り' ;?></span>
                                <?php } else {?>
                                <span><input type="submit" value="カートに入れる"></span>
                                <?php }?>
                            <?php }?>
                        </div>
                        </form>
                        <?php } ?>
                    <?php } else{?>
                    <?php foreach ($list_item_category as $read) {?>
                    <div class="product" >
                        <span class="img_size"><img src="<?php print $img_dir.$read['img']; ?>"></span>
                        <span>名前：<?php print $read['name']; ?></span>
                        <span>価格：<?php print $read['price'] ; ?>円</span> 
                        <?php if(isset($_COOKIE['account_name'])) {?>
                            <?php if ($read['stock']==0) {?> 　
                            <span><?php print '売り切り' ;?></span>
                            <?php } else {?>
                            <span><input type="submit" value="カートに入れる"></span>
                            <?php }?>
                        <?php }?>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    <?php if ($search_name !=''){ ?>
                        <?php if(count($result_search)==0) {?>
                            <span><?php print 結果がありません ;?></span>     
                        <?php }else {?>
                            <?php foreach ($result_search as $read) {?>
                            <div  >
                                <span class="img_size"><img src="<?php print $img_dir.$read['img']; ?>"></span>
                                <span>名前：<?php print $read['name']; ?></span>
                                <span>価格：<?php print $read['price'] ; ?>円</span>
                                <span>価格：<?php print $read['description'] ;?></span>
                                <?php if(isset($_COOKIE['account_name'])) {?>
                                    <?php if ($read['stock']==0) {?> 　
                                    <span><?php print '売り切り' ;?></span>
                                    <?php } else {?>
                                    <span><input type="submit" value="カートに入れる"></span>
                                    <?php }?>
                                <?php }?>
                            </div>
                        <?php }?>
                        <?php }?>
                    <?php }?>
                    <?php }?>
                </div>
               
            </article>   
        </main>
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