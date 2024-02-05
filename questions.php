<?php
include './includes/data-collector.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header>   
    <?php
        include_once "./layout-components/header.php"
    ?>
</header>
<main>

<!-- Banner -->
    <?php
        include_once "./layout-components/banner.php"
    ?>
<?php
        //Hole die $id der aktuellen Fragen aud $qiuz
        if( isset($quiz["questionIdSequence"])){
            $id = $quiz ["questionIdSequence"][$currentQuestionIndex];
          
          
            // Hole alle Datenfelder zur Frage mit $id von der Datanbank

            $question = fetchQuestionById($id, $dbConn);

            // prettyPrint($question,"Question");
        }
    ?>



<div class="content">
    
<div class="questions-chart">

<div class="question">



<!-- QUESTION NUMBER---------------------------------------------------------------- -->

    <div class="question-heading">Frage  <?php echo ($currentQuestionIndex + 1); ?> von <?php echo $quiz["questionNum"]; ?></div>







<!-- QUESTION---------------------------------------------------------------- -->

    <div class="question-layout">
    <p> <?php echo $question["question_text"]; ?></p>
    </div>









<!-- OPTIONS---------------------------------------------------------------- -->

<form class="form-questions" id="quiz-form" method="post" action="<?php echo $actionUrl?>" > 

    <?php
 // Zerlege den String mit den richtigen Antworten in ein Array mit id-String.
        // Vermeide Leerschläge in den id-String

        $correct = $question["correct"]; //funktioniert bei  single choice questions und Multiple choice questions.
        $pattern = "/\s*,\s*/"; //Regular Expression- Search pattern.
        $correctItems = preg_split($pattern, $correct);
      
        //Verwandle die id-String in id-Nummmern
        foreach($correctItems as $i => $item){
            $correctItems[$i] = intval($item);
        }

        // ...
        if(count($correctItems) > 1 )$multipleChoice = true;
        else $multipleChoice = false;//Bedautet Single Choise

        for ($a = 1; $a <= 5 ; $a++) {
            $answerColumnName = "answer_".$a;

            if (isset($question[$answerColumnName]) && !empty($question[$answerColumnName])) {
                $answerText = $question[$answerColumnName];

                if(in_array($a, $correctItems, true)) $value = 1;
                else $value = 0;

                if (in_array($a, $correctItems, true)) {
                    $value = 1;
                } else {
                    $value = 0;
                }
                
                echo "\n<div class='options-layout'>\n";
                
                if ($multipleChoice) {
                    echo "<input class='options' type='checkbox' name='$answerColumnName' id='$answerColumnName' value='$value'>\n";
                } else {
                    echo "<input class='options' type='radio' name='single-choice' id='$answerColumnName' value='$value'>\n";
                }
                
                // Add a class to the label
                echo "<label class='options-label' for='$answerColumnName'>$answerText</label>\n";
                
                echo "</div>";
                
            }
        }

        
            
    ?>


    <input type="hidden"  id="questionNum" name="questionNum" value="<?php echo $quiz["questionNum"];?>">
    <input type="hidden"  id="lastQuestionIndex"  name="lastQuestionIndex" value="<?php echo $currentQuestionIndex;?>">
    <input type="hidden"  id="multipleChoice" name="multipleChoice" value="<?php echo $multipleChoice ?  'true' : 'false'; ?>">
    <input type="hidden"  id="indexStep" name="indexStep" value="1">
<!-- BUTTONS-------------------------------------------------------------- -->

<div class="buttons">
    
    <button type="submit" class="btn btn-primary"> Next</button>
 
</div>



</form>


</div>

</div>
</div>
  </main>


  <footer>
  <?php
    include_once "./layout-components/footer.php"
    ?>
  </footer>
        <?php prettyPrint($_SESSION, "\$_SESSION"); ?>
</body>
</html>