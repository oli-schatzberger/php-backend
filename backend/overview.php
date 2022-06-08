<?php
header("Access-Control-Allow-Origin: *");
$pdo = new PDO('mysql:host=localhost;dbname=api', 'web', 'HHZ8W4c5NmusMt7');
$statement = $pdo->prepare("SELECT * FROM emp ORDER BY id");
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);

