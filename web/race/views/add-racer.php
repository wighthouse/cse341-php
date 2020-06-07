<?php
require_once('../race/model/functions.php');
require_once('../race/model/racer-model.php');
$db = get_db();
print_r($_POST);


print_r($racers);


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
    <?php include '../race/common/race-header.php'; ?>
  </header>
  <main>
    <div class="main-container">
      <h2 class="page-title">Registration Information</h2>


      <h3><?php echo $first_name ?>, Here are your registration details.</h3><br />
      <ul>
        <li><strong>Name: </strong><?php echo $first_name . ' ' . $last_name ?></li>
        <li><strong>Email: </strong><?php echo $email ?></li>
        <li><strong>Event: </strong><?php echo $racers['event_name'] ?></li>
        <li><strong>Shirt size: </strong><?php echo $racers['size'] ?></li>
        <li><strong>Confirmation Code: </strong><?php echo $confirmation_id ?></li>
        <p>Please take note of your confirmation number. You will need it if you would like to modify your registration.</p>

    </div>


  </main>

  <footer>
  <?php include '../race/common/race-footer.php'; ?>
  </footer>
</body>

</html>