<?php
// Connection credentials for the database
// You can find the credentials in docker-compose.yml
$dbName = getenv('DB_NAME');
$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');
$dbHost = getenv('DB_HOST');

try {
    // Create a connection to the database
    $dbConn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo $e->getMessage(); // display error message
}

function fetchQuestionIdSequence($topic, $questionNum, $dbConn){

    $query ="SELECT `id` FROM `questions` WHERE `topic` = :topic ORDER BY RAND() LIMIT :questionNum";

    $stmt = $dbConn->prepare($query);
    $stmt->bindParam(':topic', $topic, PDO::PARAM_STR);
    $stmt->bindParam(':questionNum', $questionNum, PDO::PARAM_INT);
    $stmt->execute();
    
    $rows = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

    return $rows;

}

function fetchQuestionById($id, $dbConn){
    $query = "SELECT * FROM `questions` WHERE `id`= :id";
    $stmt = $dbConn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}
?>
