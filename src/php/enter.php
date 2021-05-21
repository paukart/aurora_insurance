<?php
session_start();
include('db.php');
$worker = $_POST['workers'];
$_SESSION['id_worker'] = $worker;
$sql = "SELECT * FROM workers WHERE id_worker = :worker";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':worker', $worker);
$stmt->execute();
$res = $stmt->FETCHALL(PDO::FETCH_ASSOC);
print_r($res);
$_SESSION['worker_name'] = $res[0]['name'];
$_SESSION['worker_last_name'] = $res[0]['last_name'];
$_SESSION['worker_email'] = $res[0]['email'];
$_SESSION['worker_phone_number'] = $res[0]['phone_number'];
header('Location: http://localhost/bd_kurs/addpact.php');
