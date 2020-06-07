<?php
 require_once('functions.php');
 $db = get_db();
print_r($_POST);


$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
  case 'updateRacer':

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
    $rowsChanged =updateRacer($first_name,
    $last_name,
    $email,
    $shirt_size_id,
    $event_id,
    $confirmation_id);
}
echo $rowsChanged;


case 'delete':
  $confirmation_id = filter_input(INPUT_GET, 'confirmation_id', FILTER_SANITIZE_STRING);
  $first_name = filter_input(INPUT_GET, 'first_name', FILTER_SANITIZE_STRING);
  $deleteResult = deleteRegistration($confirmation_id);
  if ($deleteResult) {
    $message = "<p class='notify'>$first_name was successfully deleted.</p>";
echo $message;
  }

  case 'default':
    header("Location: index.php");
    exit;
}
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
  <?php include '../race/common/race-header.php'; ?>
  </header>
  <main>
    <div class="main-container">
      <h2 class="page-title">Update Racer</h2>

      <?php
      echo "<h3>" . $first_name . "'s Registration Updated</h3><br/>";?>
      
      

      
    </div>


  </main>

  <footer>
  <?php include '../race/common/race-footer.php'; ?>
  </footer>
</body>

</html>