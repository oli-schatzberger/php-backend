<?php
header("Access-Control-Allow-Origin: *");

// connect to database
$data = json_decode(file_get_contents('php://input'), true);

// trim data
$id = trim($data['id']);


// connect to database
try {
    $pdo = new PDO('mysql:host=localhost;dbname=api', 'web', 'HHZ8W4c5NmusMt7');
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    $sql = "DELETE FROM emp WHERE id='$id'";

    // use exec() because no results are returned
    $pdo->exec($sql);
    echo $sql;
} catch (PDOException $e) {
    echo "<br>" . $e->getMessage();
}


