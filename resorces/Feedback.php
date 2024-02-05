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
        include_once "./header.php"
    ?>
</header>
<main>

<!-- Banner -->
    <?php
        include_once "./banner.php"
    ?>



<div class="content">
    
<div class="questions-chart">

<div class="question">
    <div class="question-heading"> <h1>FEEDBACK</h1></div>
        <div class="question-layout">
            <p>How was the Test for you?</p>
        </div>
    <label  class="flabel" for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname"><br><br>
    <label  class="flabel" for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname"><br><br>
    <label class="flabel"  for="Bemerkung" class="uberschriften">FEEDBACK</label><br>
          <textarea
            class="felder-1"
            name="feedback"
            id="feedback"
            placeholder=""
            maxlength="500"
          ></textarea>

  
</div>

</div>
</div>
  </main>


  <footer>
  <?php
    include_once "./footer.php"
    ?>
  </footer>
</body>

</html>