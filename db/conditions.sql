-- データになります。

DELETE FROM products;
INSERT INTO products
(id, name, price)
VALUES
(1, 'マウスパッド', 3000), (2, 'イヤホン', 1500), (3, '傘', 1000), (4, 'お茶', 150), (5, 'PC', 50000);

-- 1.priceが500円以上から1,000円以下の商品データを取得する

SELECT * 
FROM products
WHERE price
BETWEEN 500 
AND 1000 
LIMIT 0 , 30;

-- 2.idが3以上で、priceが500円以上の商品データを取得する

SELECT * 
FROM products
WHERE id >3
AND price >500
LIMIT 0 , 30;


-- priceが1,500円以下で、「傘」を除く商品データを取得する

SELECT * 
FROM products
WHERE price <1500
AND name NOT 
IN (
'傘'
)
LIMIT 0 , 30;