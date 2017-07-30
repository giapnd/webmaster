-- データになります。

DELETE FROM products;
INSERT INTO products
(id, name, price)
VALUES
(1, 'マウスパッド', 1200),(2, 'マウスウォッシュ', 900),(3, 'トラックパッド', 500),(4, 'ラバーマウスパッド2', 1400);

-- 1.nameが「マウスパッド」の商品データを取得する
SELECT * 
FROM products
WHERE name =  'マウスパッド'
LIMIT 0 , 30;

-- 2.nameに「パッド」の文字が含まれる商品データを取得する
SELECT * 
FROM products
WHERE name LIKE  '%パッド%'
LIMIT 0 , 30;

-- 3.nameに「パッド」が入っていない、かつpriceが500円以上の商品データを取得する

SELECT * 
FROM products
WHERE price >500
AND name NOT 
IN (
'パッド'
)
LIMIT 0 , 30;
