CREATE VIEW SHOW_USER_ORDER_ALL_DATA
AS
SELECT u.*,p.*,uo.oid , uo.uid , uo.iid , uo.quantity as order_quantity , uo.total_price , uo.status
 , uo.created_at FROM user_orders uo
INNER JOIN products p ON uo.iid = p.pid
INNER JOIN users u ON uo.uid = u.id;