<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>スコープ</title>
    </head>
    <body>
        <?php
        $str = 'スコープテスト';
        function test_scope(){
            //global $str;
        print $_SERVER['REQUEST_METHOD'];
            // $str = 'スコープテスト';
        }
        test_scope();
        // print $str;
        ?>
    </body>
</html>