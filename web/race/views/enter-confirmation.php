<?php
require_once('../race/model/functions.php');
require_once('../race/model/racer-model.php');
$db = get_db();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>CTE341 | Web Backend Development II | Enter Confirmation Number</title>

    <link rel="stylesheet" href="css/race.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&Oswald&display=swap" rel="stylesheet">

</head>

<body>
    <header>
    <?php include '../race/common/race-header.php'; ?>
    </header>
    <main>
        <div class="main-container">
            <h2 class="page-title">Retrieve Registration Information</h2>
        </div>
        
        <div class="main-form modify">
            <form class="formContainer" action="/race/index.php" method="post">
                <h3 class="formHeading">Please Enter Your Confirmation Id</h3>
                <label class="above">Confirmation Id*<input type="text" name="confirmation_id" required></label>
                <input type="hidden" name="action" value="race-modify">
                <input type="submit" name="submit" class="button" value="Modify">
        </div>
    </main>

    <footer>
    <?php include '../race/common/race-footer.php'; ?>
    </footer>
</body>

</html>