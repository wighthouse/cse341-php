<?php
 require_once('functions.php');
 $db = get_db();
print_r($_POST);

 // Filter and store the data
 $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
 $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
 $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
 $shirt_size_id = filter_input(INPUT_POST, 'shirt_size_id', FILTER_SANITIZE_NUMBER_INT);
 $event_id = filter_input(INPUT_POST, 'event_id', FILTER_SANITIZE_NUMBER_INT);
 $confirmation_id = filter_input(INPUT_POST, 'confirmation_id', FILTER_SANITIZE_STRING);
 echo $event_id;
 echo $shirt_size_id;
 echo $confirmation_id;

// If POST is set, then do the following
if(isset($_POST)) {

    // Moved all this to a function.  Why?  Because we are going to have to do the same work on the scripturesStretchChallenge.php page
    updateRacer($first_name,
    $last_name,
    $email,
    $shirt_size_id,
    $event_id,
    $confirmation_id);

    // Now redirect to the new page.  Technically you'd want to check if values were inserted, and if successfull redirect the user, but this works for now
    // finally, redirect them to a new page to actually show the topics
    
    // header("Location: index.php");

    // die(); // we always include a die after redirects. In this case, there would be no
    //        // harm if the user got the rest of the page, because there is nothing else
    //        // but in general, there could be things after here that we don't want them
    //        // to see.

}
echo $rowsChanged;

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <title>CTE341 | Web Backend Development II | Add Racer</title>

  <link rel="stylesheet" href="css/race.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&Oswald&display=swap" rel="stylesheet">

</head>

<body>
  <header>
    <?php include '../Homepage/php/header.php'; ?>
    <?php include '../race/common/header.php'; ?>
  </header>
  <main>
    <div class="main-container">
      <h2 class="page-title">Update Racer</h2>

      <?php
      echo "<h3>" . $racers['first_name'] . "'s Registration Updated</h3><br/>";
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