<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>オブジェクト指向</title>
    </head>
    <body>
        <?php
        class Dog{
            public $name;
            public $height;
            public $weight;
            function show(){
                print "{$this->name}の見長は{$this->height}cm、体重は{$this->weight}kgです。<br>";
            }
        }
        $taro = new Dog();
        $taro->name='太郎';
        $taro->height=100;
        $taro->weight=50;
        $taro->show();
        $jiro = new Dog();
        $jiro->name='地色';
        $jiro->height=90;
        $jiro->weight=45;
        $jiro->show();
        ?>
    </body>
</html>