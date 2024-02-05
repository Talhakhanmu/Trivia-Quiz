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

    $query ="SELECT `id` FROM `questions` WHERE `topic` = '$topic' ORDER BY RAND() LIMIT $questionNum";

    $sqlStatement = $dbConn->query($query);
    $rows = $sqlStatement-> fetchAll(PDO::FETCH_COLUMN, 0);

    return $rows;

}

function fetchQuestionById($id, $dbConn){
    $sqlStatement = $dbConn->query("SELECT * FROM `questions` WHERE `id`= $id");
    $row = $sqlStatement->fetch(PDO::FETCH_ASSOC);
    // print_r($row);


    return $row;
}
?>