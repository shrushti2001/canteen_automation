<?php
require_once '_db.php';

$capacity = isset($_POST['capacity']) ? $_POST['capacity'] : '0';

$stmt = $db->prepare("SELECT * FROM tables WHERE capacity = :capacity OR :capacity = '0' ORDER BY name");
$stmt->bindParam(':capacity', $capacity); 
$stmt->execute();
$tables = $stmt->fetchAll();

class Table {}

$result = array();

foreach($tables as $table1) {
  $r = new Table();
  $r->id = $table1['id'];
  $r->name = $table1['name'];
  $r->capacity = $table1['capacity'];
  $r->status = $table1['status'];
  $result[] = $r;
  
}

header('Content-Type: application/json');
echo json_encode($result);

?>
