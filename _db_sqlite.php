<?php

$db_exists = file_exists("daypilot.sqlite");

$db = new PDO('sqlite:daypilot.sqlite');

if (!$db_exists) {
    //create the database
    $db->exec("CREATE TABLE IF NOT EXISTS tables (
                        id INTEGER PRIMARY KEY AUTOINCREMENT,
                        name TEXT,
                        capacity INTEGER,
                        status VARCHAR(30))");

    $db->exec("CREATE TABLE IF NOT EXISTS reservations (
                        id INTEGER PRIMARY KEY AUTOINCREMENT,
                        name TEXT,
                        start DATETIME,
                        end DATETIME,
                        table_id INTEGER,
                        status VARCHAR(30),
                        paid INTEGER)");

    $tables = array(
                    array('name' => 'Table 1',
                        'id' => 1,
                        'capacity' => 2,
                        'status' => 'vacant'),
                    array('name' => 'Table 2',
                        'id' => 2,
                        'capacity' => 2,
                        'status' => "vacant"),
                    array('name' => 'Table 3',
                        'id' => 3,
                        'capacity' => 4,
                        'status' => "Booked"),
                    array('name' => 'Table 4',
                        'id' => 4,
                        'capacity' => 4,
                        'status' => "vacant"),
                    array('name' => 'Table 5',
                        'id' => 5,
                        'capacity' => 6,
                        'status' => "Booked")
        );

    $insert = "INSERT INTO tables (id, name, capacity, status) VALUES (:id, :name, :capacity, :status)";
    $stmt = $db->prepare($insert);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':capacity', $capacity);
    $stmt->bindParam(':status', $status);

    foreach ($tables as $r) {
      $id = $r['id'];
      $name = $r['name'];
      $capacity = $r['capacity'];
      $status = $r['status'];
      $stmt->execute();
    }

}
