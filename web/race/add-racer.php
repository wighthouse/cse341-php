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
echo $event_id;
$confirmation_id = createCode();
echo $confirmation_id;
//  $emailMatch = checkEmailMatch($email);

//  // Check for existing email address in the table
//  if ($emailMatch) {
//    $message = '<p class="notify">That email address already exists. Do you want to modify your registration instead?</p>';
//    $_SESSION['message'] = $message;
//    include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/login.php';
//    exit;
//  }

// Check for missing data
//  if (empty($first_name) || empty($last_name) || empty($$email) || empty($shirt_size_id) || empty($event_id)) {
//    $message = '<p class="notify">Please provide information for all empty fields.</p>';
//    $_SESSION['message'] = $message;
//    include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/registration.php';
//    exit;
//  }

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
if (isset($_POST)) {

  
  regRacer(
    $first_name,
    $last_name,
    $email,
    $shirt_size_id,
    $event_id);

    $racers = getRacerInfo($confirmation_id);
    print_r($racers);
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <title>CTE341 | Web Backend Development II | Registration Info</title>

  <link rel="stylesheet" href="css/race.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&Oswald&display=swap" rel="stylesheet">

</head>

<body>
  <header>
    <?php include '../Homepage/php/header.php'; ?>
  </header>
  <main>
    <div class="main-container">
      <h2 class="page-title">Registration Information</h2>


      <h3><?php echo $first_name ?>, Here are your registration details.</h3><br />
      <ul>
        <li><strong>Name: </strong><?php echo $first_name . ' ' . $last_name ?></li>
        <li><strong>Email: </strong><?php echo $email ?></li>
        <li><strong>Event: </strong><?php echo $racers['event_name'] ?></li>
        <li><strong>Shirt size: </strong><?php echo $racers['shirt_size'] ?></li>
        <li><strong>Confirmation Code: </strong><?php echo $confirmation_id ?></li>
        <p>Please take note of your confirmation number. You will need it if you would like to modify your registration.</p>

    </div>


  </main>

  <footer>
    <?php include '../Homepage/php/footer.php'; ?>
  </footer>
</body>

</html>