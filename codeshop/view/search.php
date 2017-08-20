<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>検索ページ</title>
        <link rel="stylesheet" href="./html5reset.css">
        <link rel="stylesheet" href="./itemlist.css">
        
    </head>
    <body>
        <header class="header">
            <form >
                <table class="search_main">
                    <tr>
                        <td>
                            <img class="logo" src="./image/logo.png">
                            <p class="sologun">熱帯フルーツに味をウェイクアップする</p>
                        </td>
                        <td>
                            <input type="text" name="search" placeholder="商品検索" size="40">
                            <input type="submit" value="■□検索■□">
                        </td>
                        <td>
                            <span class="font14">カート</span><img class="icon" src="./image/shopping_cart.png">
                        </td>
                        <td>
                            <span class="font14">ログイン</span><img class="icon" src="./image/login.png">
                        </td>
                    </tr>
                </table>
            </form>
            <div class="container">
            <ul>
                <li>ニュース</li>
                <li>事業内容</li>
                <li>プライバシーポリシー</li>
                <li id='contact'>お問い合わせ</li>
            </ul>
            </div>
        </header>
        <div class="mainview">
        <img class="main_image" src="./image/slide1.jpeg">
        </div>
        <main class="main">
            <nav class="nav">
                <section>
                    <h1 class="category">ベトナムのフルーツ</h1>
                    <p class="items">バナナ</p>
                    <p class="items">オレンジ</p>
                    <p class="items">ぶどう</p>
                    <p class="items">みかん</p>
                    <p class="items">パイナップル</p>
                    <p class="items">パパイア</p>
                    <p class="items">ザボン</p>
                </section>
                <section>
                    <h1 class="category">タイプのフルーツ </h1>
                    <p class="items">マンゴスチン</p>
                    <p class="items">ココナッツ</p>
                    <p class="items">ランプータン</p>
                    <p class="items">アプリコット</p>
                </section>
            </nav>
            <article class="article">
                <section>
                    <h1 class="category">検索結果</h1>
                </section>  
                <section>
                    カテゴリ：
                    <select>
                        <option>バナナ</option>
                        <option>オレンジ</option>   
                    </select>
                    地域：
                    <select>
                        <option>ベトナム</option>
                        <option>タイプ</option>   
                    </select>
                    <input class="btn_search" type="submit" value="■□■□検索■□■□" >
                </section>
                <section>
                    <table class="list_product">
                        <tr>
                            <td><span><img src="./image/banana1.png"></span></td>
                            <td>
                                <p>名前：バナナ1</p>
                                <p>価格：500円</p>
                                <span><input type="submit" value="カートに入れる"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><span><img src="./image/banana2.jpeg"></span></td>
                            <td>
                                <p>名前：バナナ2</p>
                                <p>価格：500円</p>
                                <span><input type="submit" value="カートに入れる"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><span><img src="./image/banana3.jpeg"></span></td>
                            <td>
                                <p>名前：バナナ3</p>
                                <p>価格：500円</p>
                                <span><input type="submit" value="カートに入れる"></span>
                            </td>
                        </tr>
                    </table>
                </section>
            </article>   
        </main>
        <footer>
            <ul class="footer">
                <li>ニュース</li>
                <li>事業内容</li>
                <li>プライバシーポリシー</li>
                <li style="border-right:none">お問い合わせ</li>
            </ul>
           <p id="copyright"><small>Copyright&CodeCamp All Right Reserved</small></p>
        </footer>
    </body>
</html>