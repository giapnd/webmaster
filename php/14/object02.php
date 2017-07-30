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
            function __construct($name,$height,$weight){
                $this->name=$name;
                $this->height=$height;
                $this->weight=$weight;
            }
            function show(){
                print "{$this->name}の身長は{$this->height}cm、体重は{$this->weight}kgです<br>";
            }
        }
        $taro = new Dog('太郎',100,50);
        $taro->show();
        ?>
    </body>
</html>