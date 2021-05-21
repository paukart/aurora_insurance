<?php
include('../db.php');
$id_order = $_POST['id_order'];
$order_name = $_POST['edit_order_name'];
$order_type = $_POST['edit_order_type'];
try {
    $conn->beginTransaction();
    $sql = "SELECT edit_orders(:id_order, :order_name, :order_type);";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_order', $id_order);
    $stmt->bindParam(':order_name', $order_name);
    $stmt->bindParam(':order_type', $order_type);
    $stmt->execute();
    $conn->commit();
} catch (PDOException $e) {
    $conn->rollBack();
}
