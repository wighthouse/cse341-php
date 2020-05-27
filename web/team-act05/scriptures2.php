<?php 
    function search() {
        echo "<form method='post' action='scrip-results.php'>";
        echo "<input type='text' name='bookToFind'>";
        echo "<button type='submit'>Search</button>";
        echo "</form>";

        
    }

    function getTopics() {
        // Create a connection object from the connection function
        $db = get_db(); 
        // The SQL statement to be used with the database 
        $sql = 'SELECT topic, id FROM topics ORDER BY topic ASC'; 
        // The next line creates the prepared statement using the db connection      
        $stmt = $db->prepare($sql);
        // The next line runs the prepared statement 
        $stmt->execute(); 
        // The next line gets the data from the database and 
        // stores it as an array in the $topic's variable 
        $topics = $stmt->fetchAll(); 
        // The next line closes the interaction with the database 
        $stmt->closeCursor(PDO::FETCH_ASSOC); 
        // The next line sends the array of data back to where the function 
        // was called (this should be the controller) 
        return $topics;
       }



    

    function addScriptures() {
        $topics=getTopics();

        echo "<form method='post' action='add-scriptures.php'>";
        echo "<input type='text' name='book'>";
        echo "<input type='text' name='chapter'>";
        echo "<input type='text' name='verse'>";
        echo "<input type='textarea' name='content'>";
foreach ($topics as $topic) {
        echo "<input type='checkbox' value={$topic['id']} name={$topic['topic']}>";
  }
        echo "<button type='submit'>Add Scripture</button>";
        echo "</form>";   
    }

    try
    {
      $dbUrl = getenv('DATABASE_URL');
    
      $dbOpts = parse_url($dbUrl);
    
      $dbHost = $dbOpts["host"];
      $dbPort = $dbOpts["port"];
      $dbUser = $dbOpts["user"];
      $dbPassword = $dbOpts["pass"];
      $dbName = ltrim($dbOpts["path"],'/');
    
      $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $ex)
    {
      echo 'Error!: ' . $ex->getMessage();
      die();
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
            <h2 class="page-title">Scripture Resources</h2>

          
        </div>
            <?php search(); ?>

            <?php addScriptures(); ?>

    </main>

    <footer>
    
    </footer>
</body>

</html>