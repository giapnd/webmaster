<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ひとこと掲示板</title>
    </head>
    <body>
        <form method="post">
            <table>
                <tr>
                    <td>名前：</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>ひとこと：</td>
                    <td><input type="text" name="comment"></td>
                </tr>
            </table>
             <?php if (count($err_msg)!==0){?>
                <?php foreach($err_msg as $key => $value) {?>
                <p><?php print $value; ?></p>
                <?php }?>
            <?php }?>
            <input type="submit" name "submit" value="送信">
        </form>
        <?php if(is_array($get_list_comment)){?>
            <?php foreach ($get_list_comment as $read) {?>
            <p><?php print '●'.$read[0].':'.$read[1].'-'.$read[2] ;?></p>
        <?php
        }
        ?>
        <?php
        }
        ?>

    </body>
    
</html>