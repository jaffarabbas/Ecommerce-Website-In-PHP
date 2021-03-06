CREATE VIEW SHOW_USER_ORDER_ALL_DATA
AS
SELECT  uo.oid ,u.id as user_id,concat(u.firstname ,'_', u.lastname) as user_name,u.email,u.status as user_status , u.created_at as user_created,
        uo.uid ,uo.iid , uo.quantity as order_quantity , uo.total_price , uo.status as uo_status ,uo.created_at as order_created_at,
        p.pid as product_id , p.name , JSON_EXTRACT(p.image,'$[0]') as image,p.price , p.quantity as inventory , p.cid as category , p.status as product_status , p.created_on as product_created_at
FROM user_orders uo
        INNER JOIN products p ON uo.iid = p.pid
        INNER JOIN users u ON uo.uid = u.id;

select * from show_user_order_all_data;


CREATE VIEW SHOW_TEMP_USER_ORDER_ALL_DATA
AS
SELECT tu.*,p.pid, p.name as 'product name', p.description, p.price, JSON_EXTRACT(p.image,'$[0]') as image, p.quantity 'product quantity', p.status as 'product status', p.created_on, p.cid FROM temp_user_orders tu
    INNER JOIN products p ON tu.iid = p.pid;

select  * from show_temp_user_order_all_data;

SELECT COUNT(*) as 'active products' FROM products WHERE status = 1;
SELECT COUNT(*) as 'active users' FROM users WHERE status = 1;
select TAX from setting;

select total_price as 'order' ,created_at as 'created_at' from user_orders group by created_at;

select sum(total_price) as 'order' ,substring_index(orderat,' ',1) as 'created_at' from temp_user_orders group by orderat;

select sum()
select * from user_orders

select count(*) from user_orders group by created_at