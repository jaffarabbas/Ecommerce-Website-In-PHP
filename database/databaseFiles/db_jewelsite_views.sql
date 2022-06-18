CREATE VIEW SHOW_USER_ORDER_ALL_DATA
AS
SELECT  uo.oid ,u.id as user_id,concat(u.firstname ,'_', u.lastname) as user_name,u.email,u.status as user_status , u.created_at as user_created,
        uo.uid ,uo.iid , uo.quantity as order_quantity , uo.total_price , uo.status as uo_status ,uo.created_at as order_created_at,
        p.pid as product_id , p.name , JSON_EXTRACT(p.image,'$[0]') as image,p.price , p.quantity as inventory , p.cid as category , p.status as product_status , p.created_on as product_created_at
FROM user_orders uo
        INNER JOIN products p ON uo.iid = p.pid
        INNER JOIN users u ON uo.uid = u.id;

select * from show_user_order_all_data;


SELECT COUNT(*) as 'active products' FROM products WHERE status = 1;
SELECT COUNT(*) as 'active users' FROM users WHERE status = 1;
select TAX from setting


select sum(total_price) from user_orders