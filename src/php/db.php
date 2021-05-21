<?php
$host = 'localhost';
$user = 'postgres';
$pwsd = '898989';
$db = 'insurance_agency';
$port = 5432;
try {
  $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pwsd);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "You have an error: " . $e->getMessage() . "<br>";
  echo "On line: " . $e->getLine();
}
?>