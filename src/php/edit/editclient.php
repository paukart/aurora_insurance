<?php
include('../db.php');
$id_customer = $_POST['id_customer'];
$client_name = $_POST['edit_client_name'];
$client_last_name = $_POST['edit_client_last_name'];
$client_email = $_POST['edit_client_email'];
$client_phone_number = $_POST['edit_client_phone_number'];
try {
    $conn->beginTransaction();
    $sql = "SELECT edit_clients(:id_customer, :client_name, :client_last_name, :client_phone_number, :client_email);";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_customer', $id_customer);
    $stmt->bindParam(':client_name', $client_name);
    $stmt->bindParam(':client_last_name', $client_last_name);
    $stmt->bindParam(':client_email', $client_email);
    $stmt->bindParam(':client_phone_number', $client_phone_number);
    $stmt->execute();
    $conn->commit();
} catch (PDOException $e) {
    $conn->rollBack();
}
