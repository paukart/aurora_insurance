<?php
include('../db.php');
$type = $_POST['type'];
$sort = $_POST['sort'];
$search = $_POST['search'];
if ($search){
$sql = "SELECT *, (workers.name || ' '::text) || workers.last_name AS worker_fio, (clients.name || ' '::text) || clients.last_name AS client_fio FROM pacts JOIN orders ON pacts.id_order = orders.id_order JOIN workers ON pacts.id_worker = workers.id_worker JOIN clients ON pacts.id_customer = clients.id_customer WHERE $type = :search ORDER BY $type $sort";
$stmt = $conn->prepare($sql);
$stmt -> bindParam(':search', $search);
}
else{
    $sql = "SELECT *, (workers.name || ' '::text) || workers.last_name AS worker_fio, (clients.name || ' '::text) || clients.last_name AS client_fio FROM pacts JOIN orders ON pacts.id_order = orders.id_order JOIN workers ON pacts.id_worker = workers.id_worker JOIN clients ON pacts.id_customer = clients.id_customer ORDER BY $type $sort";
    $stmt = $conn->prepare($sql);
}
$stmt->execute();
$res = $stmt->FETCHALL(PDO::FETCH_ASSOC);
foreach ($res as $row) {
    $menu['id_pact'][] = $row['id_pact'];
    $menu['date'][] = $row['date'];
    $menu['insured_sum'][] = $row['insured_sum'];
    $menu['insurance_object'][] = $row['insurance_object'];
    $menu['end_date'][] = $row['end_date'];
    $menu['id_customer'][] = $row['id_customer'];
    $menu['id_worker'][] = $row['id_worker'];
    $menu['active'][] = $row['active'];
    $menu['order_name'][] = $row['order_name'];
    $menu['client_fio'][] = $row['client_fio'];
    $menu['worker_fio'][] = $row['worker_fio'];
}
$out = array(
    'menu' => $menu
);
header('Content-Type: text/json; charset = utf-8');
echo json_encode($out);
