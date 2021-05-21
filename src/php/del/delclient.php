<?php
include('../db.php');
$id_customer = $_POST['id_customer'];
try {
    $conn->beginTransaction();
    $sql = "DELETE FROM clients WHERE id_customer = :id_customer";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_customer', $id_customer);
    $stmt->execute();
    $conn->commit();
} catch (PDOException $e) {
    $conn->rollBack();
}