<?php
 require_once('../race/model/functions.php');
 require_once('../race/model/racer-model.php');
 $db = get_db();

 
  print_r($racerInfo);


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
      <form class="formContainer" action="/race/index.php" method="post" >
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
                 <label class="above">Confirmation ID<input type="text" name="confirmation_id" value="<?php if (isset($confirmation_id)) {
                                                                echo $confirmation_id;
                                                            } elseif (isset($racerInfo['confirmation_id'])) {
                                                              echo $racerInfo['confirmation_id'];
                                                            } ?>">   
                <input type="submit" name="submit" class="button" value="Update Registration">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="update-racer">
                <!-- <input type="hidden" name="confirmation_id" value="<?php if (isset($confirmation_id)) {
                                                                echo $confirmation_id;
                                                            } elseif (isset($racerInfo['confirmation_id'])) {
                                                              echo $racerInfo['confirmation_id'];
                                                            } ?>"> -->
<p>Click <span id='delete'>Delete<span> to return without making changes.</p>
<a href="/race/index.php?action=delete-registration" class='button warning' title='Click to delete'>Delete</a>
<p>Click cancel to return without making changes.</p>
                <a href="/race/index.php" class="button cancel">Cancel</a>
            </form>
      
    </div>


  </main>

  <footer>
  <?php include '../race/common/race-footer.php'; ?>
  </footer>
</body>

</html>