<?php
header("Access-Control-Allow-Origin: *");

// connect to database
$pdo = new PDO('mysql:host=localhost;dbname=api', 'web', 'HHZ8W4c5NmusMt7');
$postdata = json_decode(file_get_contents('php://input'), true);

// trim data
$mail = trim(isset($postdata['mail']) ? $postdata['mail'] : 'missing mail');
$password = trim(isset($postdata['password']) ? $postdata['password'] : 'missing password');

// select data from database
$statement = $pdo->prepare("SELECT * FROM user_data WHERE usermail = '$mail' AND userpassword = '$password'");
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);



