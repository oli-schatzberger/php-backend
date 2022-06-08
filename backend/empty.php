<?php
header("Access-Control-Allow-Origin: *");
$pdo = new PDO('mysql:host=localhost;dbname=api', 'web', 'HHZ8W4c5NmusMt7');

// Bekomme den JSON Body der Anfrage
$data = json_decode(file_get_contents('php://input'), true);

$title = '';
$body = '';
$author = '';
$author_picture = '';
$created_at = '';

$statement = $pdo->prepare("INSERT INTO emp (title, body, author, author_picture, created_at) 
    VALUES (:title, :body, :author, :author_picture, :created_at)");
$statement->bindParam(':title', $title);
$statement->bindParam(':body', $body);
$statement->bindParam(':author', $author);
$statement->bindParam(':author_picture', $author_picture);
$statement->bindParam(':created_at', $created_at);
$ok = $statement->execute();
echo json_encode(["valid" => $ok]);