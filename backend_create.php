<?php
require_once '_db.php';

$stmt = $db->prepare("INSERT INTO reservations (name, start, end, table_id, status, paid) VALUES (:name, :start, :end, :table1, 'New', 0)");
$stmt->bindParam(':start', $_POST['start']);
$stmt->bindParam(':end', $_POST['end']);
$stmt->bindParam(':name', $_POST['name']);
$stmt->bindParam(':table1', $_POST['table1']);
$stmt->execute();

class Result {}

$response = new Result();
$response->result = 'OK';
$response->message = 'Created with id: '.$db->lastInsertId();
$response->id = $db->lastInsertId();

header('Content-Type: application/json');
echo json_encode($response);

?>
