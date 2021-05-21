<?php
include('../db.php');
$sql = "SELECT * from get_all_workers";
$stmt = $conn->prepare($sql);
$stmt->execute();
$res = $stmt->FETCHALL(PDO::FETCH_ASSOC);
foreach ($res as $row) {
  $workers['id_worker'][] = $row['id_worker'];
  $workers['name'][] = $row['name'];
  $workers['last_name'][] = $row['last_name'];
  $workers['phone_number'][] = $row['phone_number'];
  $workers['email'][] = $row['email'];
  $workers['fio'][] = $row['fio'];
}
$out = array(
  'workers' => $workers
);
header('Content-Type: text/json; charset = utf-8');
echo json_encode($out);
