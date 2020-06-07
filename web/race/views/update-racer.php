<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../race/model/functions.php');
require_once('../race/model/racer-model.php');
$db = get_db();

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <title>CTE341 | Web Backend Development II | Registration Details</title>

  <link rel="stylesheet" href="css/race.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&Oswald&display=swap" rel="stylesheet">

</head>

<body>
  <header>
    <?php include '../race/common/race-header.php'; ?>
  </header>
  <main>
    <div class="main-container">
      <h2 class="page-title">Registration Details</h2>


      <h3><?php echo $first_name ?>'s Updated Registration</h3>
      <ul>
        <li><strong>Name: </strong><?php echo $first_name . ' ' . $last_name ?></li>
        <li><strong>Email: </strong><?php echo $email ?></li>
        <li><strong>Event: </strong><?php echo $racers['event_name'] ?></li>
        <li><strong>Shirt size: </strong><?php echo $racers['size'] ?></li>
        <li><strong>Confirmation Code: </strong><?php echo $confirmation_id ?></li>
      </ul>
      <p>Your confirmation number has not changed. You will need it if you would like to modify your registration.</p>



    </div>


  </main>

  <footer>
    <?php include '../race/common/race-footer.php'; ?>
  </footer>
</body>

</html>