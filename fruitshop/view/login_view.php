<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <titleログインページ</title>
        <link rel="stylesheet" href="./view/login_view.css">
    </head>
    <body>
        
        <form method= "post" action ="#" class="create_form">
            <div>
            　　<a href="/"><img class="logo" src="./view/images/logo.png"></a>
                <p class="sologun">熱帯フルーツに味をウェイクアップする</p>
            </div>
            <table>
                <tr>
                    <td>メールアドレス：</td>
                    <td><input type="textbox" name="email"></td>
                </tr>
                <tr>
                    <td>パスワード：</span></td>
                    <td><input type="password" name="password"></td>
                </tr>
            </table>
            <?php if (count($err_msg)!==0){?>
                <?php foreach($err_msg as $key => $value) {?>
                <p class="msg"><?php print $value; ?></p>
                <?php }?>
            <?php }?>
            <?php if(count($message)!==0){?>
                <p class="msg"><?php print $message ;?></p>
            <?php }?>
            <input class="btn_login" type="submit" value="■□■□ログイン■□■□" >
            <p class="msg">Not a member? <a href="./register.php">Sign up</a> for an account.</p>
        </form>
    </body>
</html>