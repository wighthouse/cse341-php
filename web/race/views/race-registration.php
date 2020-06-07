<?php 
  require_once('../race/model/functions.php');
  require_once('../race/model/racer-model.php');
   $db = get_db();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>CTE341 | Web Backend Development II | Race Registration</title>

    <link rel="stylesheet" href="css/race.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&Oswald&display=swap" rel="stylesheet">

</head>

<body>
    <header>
    <?php include '../race/common/race-header.php'; ?>
    </header>
    <main>
        <div class="main-container">
            <h2 class="page-title">Race Registration</h2>

          
        <div class="main-form register">
        <form class="formContainer" action="/race/index.php" method="post" >
                <h3 class="formHeading">Register for a Race</h3>

                <label class="above">First name*<input type="text" name="first_name" required 
                ></label>
                <label class="above">Last name*<input type="text" name="last_name" required 
                ></label>
                <label class="above">Email address*<input type="email" name="email" required 
                ></label>
                <label class="above">Race*<?php
                    $events= getEvents();
                    $eventList = buildEventList($events);
                    echo $eventList; ?></label>
                <label class="above">Shirt*<?php
                    $sizes= getShirtSizes();
                    $sizeList = buildShirtSizeList($sizes);
                    echo $sizeList; ?></label>
                
                <p>*All fields are required</p>
                <input type="hidden" name="action" value="add-racer">
                <input type="submit" name="submit" class="button" value="Register">
                <!-- Add the action name - value pair -->
                <!-- <input type="hidden" name="action" value="register-racer"> -->
                <h3>Already registered, and need to change something? Modify your registration, instead.</h3>
                <a href="/race/index.php" class="button">Return to Home</a>
            </form>

           

        
        </div>

    </main>

    <footer>
    <?php include '../race/common/race-footer.php'; ?>
    </footer>
</body>

</html>