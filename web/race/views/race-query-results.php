<?php
 require_once('../race/model/functions.php');
 require_once('../race/model/racer-model.php');
 $db = get_db();


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <title>CTE341 | Web Backend Development II | Race Query Results</title>

  <link rel="stylesheet" href="css/race.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&Oswald&display=swap" rel="stylesheet">

</head>

<body>
  <header>
  <?php include '../race/common/race-header.php'; ?>
  </header>
  <main>
    <div class="main-container">
      <h2 class="page-title">Race Query Results</h2>

      <?php
      echo "<h3>{$racers[0]['event_name']} Race Participants</h3><br/>";
      foreach ($racers as $row) {
        echo '<strong>' . $row['first_name'] . ' ' . $row['last_name'] . ' ' . '</strong>';

        echo '<br/><br/>';
      }

      ?>
    </div>


  </main>

  <footer>
  <?php include '../race/common/race-footer.php'; ?>
  </footer>
</body>

</html>