<?php
 require "./includes/data-collector.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trivia Quiz</title>
    <link rel="icon" type="image/x-icon" href="/resorces/favicon.ico">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header>   
    <?php include_once "./layout-components/header.php"; ?>
</header>
<main>
    <!-- Banner -->
    <?php include_once "./layout-components/banner.php"; ?>
    <!-- Cards -->
    <div class="indexpage">
        <div class="content-for-homepage">
            <div class="indexpage-box">
                <form class="formOne" action="questions.php" id="topic" name="topic" method="post">
                    <label  class="question-heading" for="topic">
                        <h1  class="question-heading">Select The Topic</h1>
                    </label><br>
                    <div class="input-group mb-3">
    <select class="form-select" name="topic" id="inputGroupSelect01">
        <option value="astronomy"> <p>Astronomy</p> </option> 
        <option value="animals"> <p>Animals</p> </option>
        <option value="ch-norris"> <p>Chuck Norris</p> </option>
        <option value="cinema"> <p>Cinema</p> </option>
        <option value="geography"> <p>Geography</p> </option>               
        <option value="history"> <p>History</p> </option>               
        <option value="tech"> <p>Technology</p> </option>                
        <option value="tierwelt"> <p>Tierwelt</p> </option>                
        <option value="werkzeuge"> <p>Werkzeuge</p> </option>               
                    
                    
                    
    </select>

                    </div>


                    <!-- number of questions -->
                    <label class="question-heading" for="questionNum">
                        <h1 class="question-heading">Number Of Questions</h1>
                    </label><br>
                    <input class="input-group mb-3" type="number" id="questionNum"  name="questionNum" min="1" max="50" value="" method="post><br><br>
                    
                    <!-- lastQuestionIndex: mit PHP gesetzt -->
                    
                    <input type="hidden" id="lastQuestionIndex" name="lastQuestionIndex" value="-1">
                    <!-- indexStep: mit JavaScript setIntValue(fieldId, value) verändert -->
                    <input type="hidden" id="indexStep" name="indexStep" value="1">


                    <input class="btn btn-primary" id="" type="submit" value="START QUIZ">
                </form>
            </div>
        </div>
    </div>
</main>
<footer>
    <?php include_once "./layout-components/footer.php"; ?>
</footer>
</body>
</html>
