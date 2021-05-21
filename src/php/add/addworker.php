<?php
session_start();
include('../db.php');
$worker_name = $_POST['worker_name'];
$worker_last_name = $_POST['worker_last_name'];
$worker_email = $_POST['worker_email'];
$worker_phone_number = $_POST['worker_phone_number'];
try {
    $conn->beginTransaction();
    $sql = "SELECT set_workers(:worker_name, :worker_last_name, :worker_phone_number, :worker_email);";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':worker_name', $worker_name);
    $stmt->bindParam(':worker_last_name', $worker_last_name);
    $stmt->bindParam(':worker_phone_number', $worker_phone_number);
    $stmt->bindParam(':worker_email', $worker_email);
    $stmt->execute();
    $conn->commit();
} catch (PDOException $e) {
    $conn->rollBack();
}
