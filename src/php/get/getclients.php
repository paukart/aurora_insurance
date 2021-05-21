<?php
include('../db.php');
$sql = "SELECT * from get_all_clients";
$stmt = $conn->prepare($sql);
$stmt->execute();
$res = $stmt->FETCHALL(PDO::FETCH_ASSOC);
foreach ($res as $row) {
  $clients['id_customer'][] = $row['id_customer'];
  $clients['name'][] = $row['name'];
  $clients['last_name'][] = $row['last_name'];
  $clients['phone_number'][] = $row['phone_number'];
  $clients['email'][] = $row['email'];
  $clients['fio'][] = $row['fio'];
}
$out = array(
  'clients' => $clients
);
header('Content-Type: text/json; charset = utf-8');
echo json_encode($out);
