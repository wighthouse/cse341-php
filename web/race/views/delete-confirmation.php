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
            <h2 class="page-title">Registration Deletion Confirmation</h2>
        </div>
        
        
                <h3>Your registration has been successfully deleted.</h3>
                <h3>THANK YOU!</h3>
                
        </div>
    </main>

    <footer>
    <?php include '../race/common/race-footer.php'; ?>
    </footer>
</body>

</html>