<?php
header("Access-Control-Allow-Origin: *");

// connect to database
$data = json_decode(file_get_contents('php://input'), true);

// trim data
$id = trim($data['id']);
$title = trim(isset($data['title']) ? $data['title'] : 'missing title');
$body = trim(isset($data['body']) ? $data['body'] : 'missing body');
$author = trim(isset($data['author']) ? $data['author'] : 'missing author');
$author_picture = trim(isset($data['author_picture']) ? $data['author_picture'] : 'missing author picture');
$created_at = trim(isset($data['created_at']) ? $data['created_at'] : 'missing created at');

try {
    $pdo = new PDO('mysql:host=localhost;dbname=api', 'web', 'HHZ8W4c5NmusMt7');
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE emp SET title = '$title', body = '$body', author = '$author', author_picture = '$author_picture', created_at = '$created_at' WHERE id = '$id'";

    // Prepare statement
    $stmt = $pdo->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . "set UPDATED successfully";
} catch(PDOException $e) {
    echo "<br>" . $e->getMessage();
}



