<?php

session_start();

include 'tools.php';
include 'db.php';



if (isset($_SESSION["quiz"])) $quiz = $_SESSION["quiz"];
else $quiz = null;



if(isset($_POST["lastQuestionIndex"])){
    $lastQuestionIndex = intval($_POST["lastQuestionIndex"]);

        //collecting the data
    if($lastQuestionIndex >= 0){
        $questionName = "question-" . $lastQuestionIndex;
        $_SESSION[$questionName] = $_POST;
    }

}else{
    $lastQuestionIndex = -1;

}

// Abhängig von der aktuellen Hauptseite: Bereite die benötigten Seitendaten vor.
$scriptName = $_SERVER['SCRIPT_NAME']; // https://www.php.net/manual/en/reserved.variables.server.php

// index.php---------------------------------------
if(str_contains($scriptName, 'index')){

    session_unset();



    $quiz = null;

}
// question.php---------------------------------------
else if (str_contains($scriptName,'question')){


    if ($quiz === NULL ) {

        $questionNum = intval($_POST["questionNum"]);
    
        // we pick the sequence of the question id from the database
        $questionIdSequence = fetchQuestionIdSequence(
            $_POST["topic"], 
            $questionNum, 
            $dbConn
        ); 
    
        // calculate the real number of questions
        $questionNum = count($questionIdSequence);





        $quiz = array(
            "topic" =>$_POST["topic"],
            "questionNum" => $questionNum,
            "lastQuestionIndex" => $lastQuestionIndex,
            "currentQuestionIndex" => -1,
            "questionIdSequence" => $questionIdSequence
    
        );
    
        $_SESSION["quiz"] = $quiz;
    
    }

    $currentQuestionIndex = $lastQuestionIndex + 1;

    if($currentQuestionIndex >= $quiz["questionNum"] -1){
        // Auf die result.php Seite springen
        $actionUrl = "result.php";

    }else{
        $actionUrl = "questions.php";
    }


}

// result.php---------------------------------------

else if (str_contains($scriptName,'result')){

    
}






