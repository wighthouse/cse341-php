<?php
 require_once('functions.php');
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
//   // This is just for testing to make sure we have the correct text
//   //echo "<h1>" . $_POST['bookToFind'] . "</h1>";
//   // Validate & sanitize the input
//   $searchRacers = validateInput($_POST['event_id']);
//   // Now run the query to find the text in the database, and then save the results as a variable
//   $racers = searchQuery($searchRacers, $db);
//   // Change the method name
//   // print_r($racers);


// }
// If POST is set, then do the following
if(isset($_POST)) {

    // Moved all this to a function.  Why?  Because we are going to have to do the same work on the scripturesStretchChallenge.php page
    regRacer($first_name,
    $last_name,
    $email,
    $shirt_size_id,
    $event_id);

    // Now redirect to the new page.  Technically you'd want to check if values were inserted, and if successfull redirect the user, but this works for now
    // finally, redirect them to a new page to actually show the topics
    
    // header("Location: index.php");

    // die(); // we always include a die after redirects. In this case, there would be no
    //        // harm if the user got the rest of the page, because there is nothing else
    //        // but in general, there could be things after here that we don't want them
    //        // to see.

}

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
    <?php include '../Homepage/php/header.php'; ?>
  </header>
  <main>
    <div class="main-container">
      <h2 class="page-title">Race Query Results</h2>

      <?php
      echo "<h3>{$racers[0]['event_name']} Race Participants</h3><br/>";
      foreach ($racers as $row) {
        echo "<strong>" . $row['participant_first_name'] . ' ' . $row['participant_last_name'] . '</strong>';

        echo '<br/><br/>';
      }

      ?>
    </div>


  </main>

  <footer>
    <?php include '../Homepage/php/footer.php'; ?>
  </footer>
</body>

</html>