<?php
header("Access-Control-Allow-Origin: *");
$pdo = new PDO('mysql:host=localhost;dbname=api', 'web', 'HHZ8W4c5NmusMt7');

// Bekomme den JSON Body der Anfrage
$data = json_decode(file_get_contents('php://input'), true);

// Extrahiere den Text
$title = trim(isset($data['title']) ? $data['title'] : 'missing title');
$body = trim(isset($data['body']) ? $data['body'] : 'missing body');
$author = trim(isset($data['author']) ? $data['author'] : 'missing author');
$author_picture = trim(isset($data['author_picture']) ? $data['author_picture'] : 'missing author picture');
$created_at = trim(isset($data['created_at']) ? $data['created_at'] : 'missing created at');


if (strlen($title) == 0) {
    echo json_encode(["valid" => false]);
} else {
    $statement = $pdo->prepare("INSERT INTO emp (title, body, author, author_picture, created_at) 
    VALUES (:title, :body, :author, :author_picture, :created_at)");
    $statement->bindParam(':title', $title);
    $statement->bindParam(':body', $body);
    $statement->bindParam(':author', $author);
    $statement->bindParam(':author_picture', $author_picture);
    $statement->bindParam(':created_at',  $created_at);
    $ok = $statement->execute();
    echo json_encode(["valid" => $ok]);
}