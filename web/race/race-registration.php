<?php 
  require_once('functions.php');
   $db = get_db();
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
            <h2 class="page-title">Hennepin County Peanuts Run</br>Race Participants Search</h2>

          
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
        
        <?php 
        $searchBox = search();
        echo $searchBox;
        ?>
        </div>

        <div class="main-form modify">
        <h3>Modify your Registration.</h3>
        
        <?php 
        $searchBox = search();
        echo $searchBox;
        ?>
        </div>
    </main>

    <footer>
    <?php include '../Homepage/php/footer.php';?>
    </footer>
</body>

</html>