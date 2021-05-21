<?php
include('../db.php');
$id_worker = $_POST['id_worker'];
$worker_name = $_POST['edit_worker_name'];
$worker_last_name = $_POST['edit_worker_last_name'];
$worker_email = $_POST['edit_worker_email'];
$worker_phone_number = $_POST['edit_worker_phone_number'];
try {
    $conn->beginTransaction();
    $sql = "SELECT edit_workers(:id_worker, :worker_name, :worker_last_name, :worker_phone_number, :worker_email);";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_worker', $id_worker);
    $stmt->bindParam(':worker_name', $worker_name);
    $stmt->bindParam(':worker_last_name', $worker_last_name);
    $stmt->bindParam(':worker_email', $worker_email);
    $stmt->bindParam(':worker_phone_number', $worker_phone_number);
    $stmt->execute();
    $conn->commit();
} catch (PDOException $e) {
    $conn->rollBack();
}
