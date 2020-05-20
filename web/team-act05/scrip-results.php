<?php
    function validateInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // If the page loads as a POST request, look for this variable, and if it is set
if(isset($_POST['bookToFind'])) {
    // This is just for testing to make sure we have the correct text
    echo "<h1>" . $_POST['bookToFind'] . "</h1>";
    // Validate & sanitize the input
    $searchText = validateInput($_POST['bookToFind']);
    // Now run the query to find the text in the database, and then save the results as a variable
   // $books = week5query($searchText);
  // Change the method name
  }

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>CTE341 | Web Backend Development II | Scripture Resources</title>

    <link rel="stylesheet" href="/Homepage/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&Oswald&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <?php include 'Homepage/php/header.php'; ?>
    </header>
    <main>
        <div class="main-container">
            <h2 class="page-title">Scripture Resources Results</h2>
         
        </div>
           

    </main>

    <footer>
    
    </footer>
</body>

</html>