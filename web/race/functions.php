<?php
function get_db() {
  $db = NULL;
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





function getEvents(){
    // Create a connection object from the connection function
    $db = get_db(); 
    // The SQL statement to be used with the database 
    $sql = 'SELECT event_name, id FROM public.event ORDER BY event_name ASC'; 
    // The next line creates the prepared statement using the db connection      
    $stmt = $db->prepare($sql);
    // The next line runs the prepared statement 
    $stmt->execute(); 
    // The next line gets the data from the database and 
    // stores it as an array in the $events variable 
    $events = $stmt->fetchAll(); 
    // The next line closes the interaction with the database 
    $stmt->closeCursor(PDO::FETCH_ASSOC); 
    // The next line sends the array of data back to where the function 
    // was called (this should be the controller) 
    return $events;
   }

//Build the drop-down event select list
function buildEventList($events){
  $eventList = "<select id='event_id' name='event_id'>";
  $eventList .= "<option value='' selected disabled>Select an Event</option>";
  foreach ($events as $event) {
    $eventList .= "<option value='$event[id]'>$event[event_name]</option>";
  }
  $eventList .= "</select>";
  return $eventList;
  }
  //echo $eventList;

   function search() {
    $events= getEvents();
    $eventList = buildEventList($events);
    echo "<form method='post' action='race-query-results.php'>";
    echo $eventList;
   
    echo "<input type='submit' value='Search'>";
    echo "</form>";
}


