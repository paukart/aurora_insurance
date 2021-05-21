<?php
session_start();
include('../db.php');
$client_name = $_POST['client_name'];
$client_last_name = $_POST['client_last_name'];
$client_email = $_POST['client_email'];
$client_phone_number = $_POST['client_phone_number'];
try {
    $conn->beginTransaction();
    $sql = "SELECT set_clients(:client_name, :client_last_name, :client_phone_number, :client_email);";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':client_name', $client_name);
    $stmt->bindParam(':client_last_name', $client_last_name);
    $stmt->bindParam(':client_phone_number', $client_phone_number);
    $stmt->bindParam(':client_email', $client_email);
    $stmt->execute();
    $conn->commit();
} catch (PDOException $e) {
    $conn->rollBack();
}
