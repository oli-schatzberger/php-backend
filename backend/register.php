<?php
header("Access-Control-Allow-Origin: *");

// connect to database
$pdo = new PDO('mysql:host=localhost;dbname=api', 'web', 'HHZ8W4c5NmusMt7');
$postdata = json_decode(file_get_contents('php://input'), true);

// trim data
$username1 = trim(isset($postdata['username']) ? $postdata['username'] : 'missing username');
$usermail1 = trim(isset($postdata['mail']) ? $postdata['mail'] : 'missing mail');
$userpassword1 = trim(isset($postdata['password']) ? $postdata['password'] : 'missing password');

// select data from database
$statement = $pdo->prepare("INSERT INTO user_data (username, usermail, userpassword) VALUES ('$username1', '$usermail1', '$userpassword1')");
$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);



