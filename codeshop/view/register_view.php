<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ユーザ登録ページ</title>
        <link rel="stylesheet" href="./view/register_view.css">
    </head>
    <body>
        
        <form method ="post" action ="#" class="create_form">
            <div><img class="logo" src="./view/image/logo.png"></div>
            <table>
                <tr>
                    <td>お名前「全角」<span id="red">*</span></td>
                    <td><input type="textbox" placeholder="姓" name="kanji_lastname"></td>
                    <td><input type="textbox" placeholder="名" name="kanji_firstname"></td>
                </tr>
                <tr>
                    <td>お名前フリガナ「全角」<span id="red">*</span></td>
                    <td><input type="textbox" placeholder="姓" name="furi_lastname"></td>
                    <td><input type="textbox" placeholder="名" name="furi_firstname"></td>
                </tr>
                <tr>
                    <td>郵便番号 <span id="red">*</span></td>
                    <td><input type="textbox" name="post_first"></td>
                    <td><input type="textbox" name="post_last"></td>
                    <td><p id="font12">郵便番号を入力して「郵便番号から住所入力」ボタンを押してください。</p></td>
                </tr>
                <tr>
                    <td>電話番号「半角数字」 <span id="red">*</span></td>
                    <td><input type="textbox" name="mobile_first"></td>
                    <td><input type="textbox" name="mobile_mid"></td>
                    <td><input type="textbox" name="mobile_last"></td>
                </tr>
                <tr>
                    <td>メールアドレス「半角英数」<span id="red">*</span></td>
                    <td><input type="textbox" name="email"></td>
                </tr>  
                <tr>
                    <td>パスワード「半角英数」<span id="red">*</span></td>
                    <td>
                        <div>
                            <input type="password" name="password"><br>
                            <input type="password" name="re_password">
                        </div>
                    </td>
                    <td></td>
                    <td><p id="font12">確認のためパスワードをもう一度入力してください。</p></td>
                </tr>
            </table>
            <div></div>
            <?php if (count($err_msg)!==0){?>
                <?php foreach($err_msg as $key => $value) {?>
                <p class="msg"><?php print $value; ?></p>
                <?php }?>
            <?php }?>
            <?php if(count($message)!==0){?>
                <p class="msg"><?php print $message ;?></p>
            <?php }?>
            <input type="submit" name="btn_sumit" value="■□■□■□■□確認■□■□■□■□" >
        </form>
    </body>
</html>