<?php
 require_once('../race/model/functions.php');
 require_once('../race/model/racer-model.php');
 $db = get_db();
// try {
//   $dbUrl = getenv('DATABASE_URL');

//   $dbOpts = parse_url($dbUrl);

//   $dbHost = $dbOpts["host"];
//   $dbPort = $dbOpts["port"];
//   $dbUser = $dbOpts["user"];
//   $dbPassword = $dbOpts["pass"];
//   $dbName = ltrim($dbOpts["path"], '/');

//   $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

//   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $ex) {
//   echo 'Error!: ' . $ex->getMessage();
//   die();
// }



function validateInput($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function updateQuery($confirmation_id, $db)
{
  // $db=dbConnection();    
  $stmt = $db->prepare('SELECT * FROM participant p JOIN shirt_size s ON p.shirt_size_id=s.id JOIN event e ON p.event_id=e.id  WHERE confirmation_id = :confirmation_id');

  $stmt->bindValue(':confirmation_id', $confirmation_id, PDO::PARAM_STR);
  $stmt->execute();
  $racers = $stmt->fetch(PDO::FETCH_ASSOC);
  return $racers;
}

// If the page loads as a POST request, look for this variable, and if it is set
if (isset($_POST['confirmation_id'])) {
  // This is just for testing to make sure we have the correct text
  //echo "<h1>" . $_POST['bookToFind'] . "</h1>";
  // Validate & sanitize the input
  $updateRacers = validateInput($_POST['confirmation_id']);
  // Now run the query to find the text in the database, and then save the results as a variable
  $racerInfo = updateQuery($updateRacers, $db);
  // Change the method name
  print_r($racerInfo);


}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <title>CTE341 | Web Backend Development II | Modify Registration</title>

  <link rel="stylesheet" href="css/race.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&Oswald&display=swap" rel="stylesheet">

</head>

<body>
  <header>
  <?php include '../race/common/race-header.php'; ?>
  </header>
  <main>
    <div class="main-container">
      <h2 class="page-title">Modify Your Registration</h2>
      <form class="formContainer" action="update-racer.php" method="post" >
      <h3 class="formHeading">Modify Race Registration</h3>
                <p>Make the necessary changes below.</p>

                <label class="above">First name<input type="text" name="first_name" required <?php if (isset($first_name)) {
                                                                                                echo "value='$first_name'";
                                                                                            } elseif (isset($racerInfo['first_name'])) {
                                                                                                echo "value='$racerInfo[first_name]'";
                                                                                            } ?>></label>

                <label class="above">Last name<input type="text" name="last_name" required <?php if (isset($last_name)) {
                                                                                            echo "value='$last_name'";
                                                                                        } elseif (isset($racerInfo['last_name'])) {
                                                                                            echo "value='$racerInfo[last_name]'";
                                                                                        } ?>></label>
                <label class="above">Email address<input type="email" name="email" required <?php if (isset($email)) {
                                                                                                echo "value='$email'";
                                                                                            } elseif (isset($racerInfo['email'])) {
                                                                                                echo "value='$racerInfo[email]'";
                                                                                            } ?>></label>
                <label class="above">Race<?php
                    $events= getEvents();
                    $eventList = buildEventList2($events, $racerInfo);
                    echo $eventList; ?></label>
                <label class="above">Shirt<?php
                    $sizes= getShirtSizes();
                    $sizeList = buildShirtSizeList2($sizes, $racerInfo);
                    echo $sizeList; ?></label>
                <input type="submit" name="submit" class="button" value="Update Registration">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="updateRacer">
                <input type="hidden" name="confirmation_id" value="<?php if (isset($confirmation_id)) {
                                                                echo $confirmation_id;
                                                            } elseif (isset($racerInfo['confirmation_id'])) {
                                                              echo $racerInfo['confirmation_id'];
                                                            } ?>">
<a href="delete-registration.php?action=delete&id="{$confirmation_id}."" class='button' title='Click to delete'>Delete</a>
                <a href="index.php" class="button">Cancel</a>
            </form>
      
    </div>


  </main>

  <footer>
  <?php include '../race/common/race-footer.php'; ?>
  </footer>
</body>

</html>