<?php 
  require_once('functions.php');
   $db = get_db();
 // $events= getEvents();
 
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>CTE341 | Web Backend Development II | Race Registration</title>

    <link rel="stylesheet" href="/Homepage/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&Oswald&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <?php include '../Homepage/php/header.php'; ?>
    </header>
    <main>
        <div class="main-container">
            <h2 class="page-title">Race Partipants Search</h2>

          
        </div>
        <h3>Search for Race Participants by event.</h3>
        
        <?php 
        $searchBox = search();
        echo $searchBox;
        ?>

    </main>

    <footer>
    <?php include '../Homepage/php/footer.php';?>
    </footer>
</body>

</html>