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
        $topics = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        // The next line closes the interaction with the database 
        $stmt->closeCursor(); 
        // The next line sends the array of data back to where the function 
        // was called (this should be the controller) 
        return $topics;
       }

       $topics=getTopics();
      
   

//     function addScriptures() {
//         $topics=getTopics();
//         print_r($topics);
//         echo "<form method='post' action='add-scriptures.php'>";
//         echo "<label class='above'>Book<input type='text' name='book'></label>";
//         echo "<label class='above'>Chapter<input type='text' name='chapter'></label>";
//         echo "<label class='above'>Verse<input type='text' name='verse'></label>";
//         echo "<input type='textarea' name='content'>";
// foreach ($topics as $topic) {
//         echo "<input type='checkbox' value={$topic['id']} name={$topic['topic']}>";
//   }
//         echo "<button type='submit'>Add Scripture</button>";
//         echo "</form>";   
//     }
    function get_db(){
        $db=NULL;
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
    return $db;
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
        <?php include '../Homepage/php/header.php'; ?>
    </header>
    <main>
        <div class="main-container">
            <h2 class="page-title">Scripture Resources</h2>

          
        </div>
            <?php search(); 
           ?>
             <form method='post' action='add-scriptures.php'>
        <label class='above'>Book<input type='text' name='book'></label>
        <label class='above'>Chapter<input type='text' name='chapter'></label>
        <label class='above'>Verse<input type='text' name='verse'></label>
        <label class='above'>Text<input type='textarea' name='content'>
<?php foreach ($topics as $topic) {
    //  $topics=getTopics();
        echo "<label class='above'>{$topic['topic']}<input type='checkbox' value={$topic['id']} name={$topic['topic']}></label>";
}?>
        <button type='submit'>Add Scripture</button>
        </form>   
           

    </main>

    <footer>
    
    </footer>
</body>

</html>