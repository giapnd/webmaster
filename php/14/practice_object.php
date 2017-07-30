<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>課題</title>
    </head>
    <body>
        <?php
        class bmi{
            public $height;
            public $weight;
            function __construct($height,$weight){
                $this->height=$height;
                $this->weight=$weight;
            }
            function show(){
                print "たまの身長は{$this->height}cm、体重は{$this->weight}kgです。";
            }
        }
        $test = new bmi(80,30);
        $test -> show();
        ?>
    </body>
</html>