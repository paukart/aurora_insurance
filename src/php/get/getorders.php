<?php
include('../db.php');
$sql = "SELECT * from get_all_orders";
$stmt = $conn->prepare($sql);
$stmt->execute();
$res = $stmt->FETCHALL(PDO::FETCH_ASSOC);
foreach ($res as $row) {
  $orders['id_order'][] = $row['id_order'];
  $orders['order_name'][] = $row['order_name'];
  $orders['order_type'][] = $row['order_type'];
}
$out = array(
  'orders' => $orders
);
header('Content-Type: text/json; charset = utf-8');
echo json_encode($out);
