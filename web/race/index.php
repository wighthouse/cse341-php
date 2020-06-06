<?php
require_once('functions.php');
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
            <h2 class="page-title">Registration Information Page</h2>


        </div>
        <div class="main-form search">
            <h3>Search for Race Participants by event.</h3>

            <?php
            $searchBox = search();
            echo $searchBox;
            ?>
        </div>

        <div class="main-form register">
            <h3>Register for an event.</h3>

            <a href="race-registration.php" class="button">Go to Registration Page</a>
        </div>

        <div class="main-form modify">
            <form class="formContainer" action="race-modify.php" method="post">
                <h3 class="formHeading">Modify your Registration</h3>
                <label class="above">Confirmation Id*<input type="text" name="confirmation_id" required></label>
                <input type="submit" name="submit" class="button" value="Modify">
        </div>
    </main>

    <footer>
    <?php include '../race/common/race-footer.php'; ?>
    </footer>
</body>

</html>