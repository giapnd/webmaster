<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ユーザ登録ページ</title>
        <link rel="stylesheet" href="./view/register_view.css">
        <link rel="stylesheet" href="./view/css/style.css">
    </head>
    <body>
        
        <form method ="post" action ="#" class="create_form">
            <div><img class="logo" src="./view/images/logo.png"></div>
            <table>
                <tr>
                    <td class="items">お名前「全角」<span id="red">*</span></td>
                    <td><input type="textbox" placeholder="姓" name="kanji_lastname" required="required"></td>
                    <td><input type="textbox" placeholder="名" name="kanji_firstname" required="required"></td>
                </tr>
                <tr>
                    <td class="items">お名前フリガナ「全角」<span id="red">*</span></td>
                    <td><input type="textbox" placeholder="姓" name="furi_lastname" required="required"></td>
                    <td><input type="textbox" placeholder="名" name="furi_firstname" required="required"></td>
                </tr>
                <tr>
                    <td class="items">郵便番号 <span id="red">*</span></td>
                    <td><input type="textbox" name="post_first" required="required"></td>
                    <td><input type="textbox" name="post_last" required="required"></td>
                    <td><p id="font12">郵便番号を入力して「郵便番号から住所入力」ボタンを押してください。</p></td>
                </tr>
                <tr>
                    <td class="items">電話番号「半角数字」 <span id="red">*</span></td>
                    <td><input type="textbox" name="mobile_first" required="required"></td>
                    <td><input type="textbox" name="mobile_mid" required="required"></td>
                    <td><input type="textbox" name="mobile_last" required="required"></td>
                </tr>
                <tr>
                    <td class="items">メールアドレス「半角英数」<span id="red">*</span></td>
                    <td><input type="textbox" name="email" required="required"></td>
                </tr>  
                <tr>
                    <td class="items">パスワード「半角英数」<span id="red">*</span></td>
                    <td>
                        <div>
                            <input type="password" name="password" required="required"><br>
                            <input type="password" name="re_password" required="required">
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
            <?php if(count($msg)!==0){?>
                <p class="msg"><?php print $msg ;?></p>
            <?php }?>
            <input type="submit" name="btn_sumit" value="■□■□■□■□確認■□■□■□■□" >
        </form>
    </body>
</html>