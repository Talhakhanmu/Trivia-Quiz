<?php
// Including the data collector file
require "./includes/data-collector.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Linking the external CSS file -->
    <link rel="stylesheet" href="styles.css">
    <!-- Linking Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Linking Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header>   
    <?php
        // Including header component
        include_once "./layout-components/header.php"
    ?>
</header>
<main>
    <!-- Including banner component -->
    <?php
        include_once "./layout-components/banner.php"
    ?>

    <div class="content">
        
        <div class="questions-chart">
        
            <div class="question">
                <!-- Displaying the result heading -->
                <div class="question-heading"> RESULT</div>

                <?php
                    // Initializing variables to calculate total points
                    $totalPoints = 0;
                    $maxTotalPoints = 0;

                    // Looping through session data to calculate points
                    foreach($_SESSION as $questionKey => $data){
                        if(str_contains($questionKey, 'question-')){ 
                            if($data["multipleChoice"] === 'true'){ 
                                // For multiple choice questions
                                foreach($data as $key => $value){
                                    if (str_contains($key, 'answer_')){
                                        $points = intval($value);
                                        $totalPoints += $points;
                                    }
                                }
                            } else if ($data["multipleChoice"] === 'false'){
                                // For single choice questions
                                if (isset($data["single-choice"])){
                                    $points = intval($data["single-choice"]);
                                    $totalPoints += $points;
                                }
                            }
                            // Calculating maximum possible points
                            $maxTotalPoints = $maxTotalPoints + intval($data["maxPoints"]);
                        }
                    }

                    // Calculate percentage
                    $percentage = ($totalPoints / $maxTotalPoints) * 100;

                    // Determine feedback based on percentage
                    if ($percentage < 40) {
                        $feedback = "😕Better luck next time! 🍀";
                    } elseif ($percentage >= 40 && $percentage < 60) {
                        $feedback = "😊Keep improving! 📈";
                    } elseif ($percentage >= 60 && $percentage < 90) {
                        $feedback = "😃Good job! 👍";
                    } else {
                        $feedback = "🥳Excellent work! 🎉";
                    }
                ?>

                <!-- Displaying feedback and points earned -->
                <div class="result-sentence-box"> 
                    <h3 class="result-sentence">
                        <?php echo $feedback; ?></h3>
                    <h3 class="points"> You got <?php echo $totalPoints;?>
                        out of <?php echo $maxTotalPoints;?> total Points. </h3>
                </div>

                <!-- Button to try the quiz again -->
                <form action="index.php">
                  <div class="buttons">
                      <button type="submit" class="btn btn-primary">Restart Quiz</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</main>
<footer>
    <?php
        // Including footer component
        include_once "./layout-components/footer.php"
    ?>
</footer>
</body>
</html>
