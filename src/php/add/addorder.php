<?php
session_start();
include('../db.php');
$order_name = $_POST['order_name'];
$order_type = $_POST['order_type'];
try {
    $conn->beginTransaction();
    $sql = "SELECT set_orders(:order_name, :order_type);";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':order_name', $order_name);
    $stmt->bindParam(':order_type', $order_type);
    $stmt->execute();
    $conn->commit();
} catch (PDOException $e) {
    $conn->rollBack();
}
