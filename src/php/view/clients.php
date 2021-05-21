<?php
include('../db.php');
$type = $_POST['type'];
$sort = $_POST['sort'];
$search = $_POST['search'];
if ($search){
$sql = "SELECT * FROM clients WHERE $type = :search ORDER BY $type $sort";
$stmt = $conn->prepare($sql);
$stmt -> bindParam(':search', $search);
}
else{
    $sql = "SELECT * FROM clients ORDER BY $type $sort";
    $stmt = $conn->prepare($sql);
}
$stmt->execute();
$res = $stmt->FETCHALL(PDO::FETCH_ASSOC);
foreach ($res as $row) {
    $menu['id_customer'][] = $row['id_customer'];
    $menu['name'][] = $row['name'];
    $menu['last_name'][] = $row['last_name'];
    $menu['phone_number'][] = $row['phone_number'];
    $menu['email'][] = $row['email'];
}
$out = array(
    'menu' => $menu
);
header('Content-Type: text/json; charset = utf-8');
echo json_encode($out);
