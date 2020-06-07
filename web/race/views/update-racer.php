<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
 require_once('../race/model/functions.php');
 require_once('../race/model/racer-model.php');
 $db = get_db();
print_r($_POST);
echo $event_id;
echo $shirt_size_id;
echo $confirmation_id;
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <title>CTE341 | Web Backend Development II | Update Racer</title>

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

      
      <h3><?php $first_name?>'s Updated Registration</h3>
      <p>Name: <?php echo $first_name . " " . $last_name?></p>
      <p>Email: <?php echo $email?></p> 
      <p>Event: <?php echo $event_name?></p>
      <p>Shirt size: <?php echo $shirt_size?></p>

      
      

      
    </div>


  </main>

  <footer>
  <?php include '../race/common/race-footer.php'; ?>
  </footer>
</body>

</html>