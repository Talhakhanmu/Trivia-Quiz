<?php

// Starting session
session_start();

// Including necessary files
include 'tools.php';
include 'db.php';

// Checking if 'quiz' session variable is set, if not, set it to null
if (isset($_SESSION["quiz"])) {
    $quiz = $_SESSION["quiz"];
} else {
    $quiz = null;
}

// Checking if lastQuestionIndex is set in POST data
if (isset($_POST["lastQuestionIndex"])) {
    // Converting lastQuestionIndex to integer
    $lastQuestionIndex = intval($_POST["lastQuestionIndex"]);

    // Collecting data
    if ($lastQuestionIndex >= 0) {
        $questionName = "question-" . $lastQuestionIndex;
        $_SESSION[$questionName] = $_POST;
    }
} else {
    $lastQuestionIndex = -1;
}

// Depending on the current main page, prepare the required page data
$scriptName = $_SERVER['SCRIPT_NAME']; // Getting the current script name

// If index.php is the current page
if (str_contains($scriptName, 'index')) {
    // Unset session data to reset quiz
    session_unset();
    $quiz = null;
}
// If question.php is the current page
else if (str_contains($scriptName, 'question')) {
    // If quiz is not set, initialize quiz with data
    if ($quiz === NULL) {
        $questionNum = intval($_POST["questionNum"]);
        $questionIdSequence = fetchQuestionIdSequence(
            $_POST["topic"],
            $questionNum,
            $dbConn
        );
        $questionNum = count($questionIdSequence);

        $quiz = array(
            "topic" => $_POST["topic"],
            "questionNum" => $questionNum,
            "lastQuestionIndex" => $lastQuestionIndex,
            "currentQuestionIndex" => -1,
            "questionIdSequence" => $questionIdSequence
        );

        $_SESSION["quiz"] = $quiz;
    }

    // Calculating current question index
    $currentQuestionIndex = $lastQuestionIndex + 1;

    // Determining action URL based on current question index
    if ($currentQuestionIndex >= $quiz["questionNum"] - 1) {
        // Redirect to result.php
        $actionUrl = "result.php";
    } else {
        $actionUrl = "questions.php";
    }
}
// If result.php is the current page
else if (str_contains($scriptName, 'result')) {
}


?>
