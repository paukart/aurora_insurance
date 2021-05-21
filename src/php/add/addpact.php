<?php
session_start();
include('../db.php');
$insurance_object = $_POST['insurance_object'];
$date = $_POST['date'];
$date = strtotime($date);
$end_date = strtotime('+1 Year', $date);
$end_date = date('d-m-y', $end_date);
$date = date('d-m-y', $date);
$insured_sum = $_POST['insured_sum'];
$client_name = $_POST['client_name'];
$client_last_name = $_POST['client_last_name'];
$client_email = $_POST['client_email'];
$client_phone_number = $_POST['client_phone_number'];
$worker_name = $_POST['worker_name'];
$worker_last_name = $_POST['worker_last_name'];
$worker_email = $_POST['worker_email'];
$worker_phone_number = $_POST['worker_phone_number'];
$id_order = $_POST['id_order'];
try {
    $conn->beginTransaction();
    $sql = "SELECT set_pacts(:client_name, :client_last_name, :client_phone_number, :client_email, :date, :insured_sum, :end_date, :insurance_object, :id_worker, :id_order);";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':client_name', $client_name);
    $stmt->bindParam(':client_last_name', $client_last_name);
    $stmt->bindParam(':client_phone_number', $client_phone_number);
    $stmt->bindParam(':client_email', $client_email);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':insured_sum', $insured_sum);
    $stmt->bindParam(':end_date', $end_date);
    $stmt->bindParam(':insurance_object', $insurance_object);
    $stmt->bindParam(':id_worker', $_SESSION['id_worker']);
    $stmt->bindParam(':id_order', $id_order);
    $stmt->execute();
    $conn->commit();
} catch (PDOException $e) {
    $conn->rollBack();
}
