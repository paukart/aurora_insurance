<?php
include('../db.php');
$id_worker = $_POST['id_worker'];
try {
    $conn->beginTransaction();
    $sql = "DELETE FROM workers WHERE id_worker = :id_worker";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_worker', $id_worker);
    $stmt->execute();
    $conn->commit();
} catch (PDOException $e) {
    $conn->rollBack();
}