<?php
 require "./includes/data-collector.php"
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



<div class="content">
    
<div class="questions-chart">

<div class="question">
    <div class="question-heading"> <h1>RESULT</h1></div>
        
          <div class="result-sentence-box">
            <p class="result-sentence">You have done a good job! 	&#128515;</p>
            <p class="result-sentence">Best of luck next time	&#128542</p>
          </div>


</div>
</div>
  </main>


  <footer>
  <?php
    include_once "./layout-components/footer.php"
    ?>
  </footer>
</body>

</html>