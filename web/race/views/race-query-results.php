<?php
 require_once('../race/model/functions.php');
 require_once('../race/model/racer-model.php');
 $db = get_db();



// function validateInput($data)
// {
//   $data = trim($data);
//   $data = stripslashes($data);
//   $data = htmlspecialchars($data);
//   return $data;
// }

// function searchQuery($eventId, $db)
// {
//   // $db=dbConnection();    
//   $stmt = $db->prepare('SELECT * FROM participant p JOIN shirt_size s ON p.shirt_size_id=s.id JOIN event e ON p.event_id=e.id  WHERE event_id = :event_id');

//   $stmt->bindValue(':event_id', $eventId, PDO::PARAM_INT);
//   $stmt->execute();
//   $racers = $stmt->fetchAll(PDO::FETCH_ASSOC);
//   return $racers;
// }

// // If the page loads as a POST request, look for this variable, and if it is set
// if (isset($_POST['event_id'])) {
 
//   // Validate & sanitize the input
//   $searchRacers = validateInput($_POST['event_id']);
//   // Now run the query to find the text in the database, and then save the results as a variable
//   $racers = searchQuery($searchRacers, $db);
//   // Change the method name
  print_r($racers);




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