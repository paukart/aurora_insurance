<?php
include('../db.php');
$id_pact = $_POST['id_pact'];
try {
    $conn->beginTransaction();
    $sql = "DELETE FROM pacts WHERE id_pact = :id_pact";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_pact', $id_pact);
    $stmt->execute();
    $conn->commit();
} catch (PDOException $e) {
    $conn->rollBack();
}