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
  

  //Build search form
  function search() {
    $events= getEvents();
    $eventList = buildEventList($events);
    echo "<form method='post' action='race-query-results.php'>";
    echo $eventList;
   
    echo "<input type='submit' value='Search'>";
    echo "</form>";
}
function getShirtSizes(){
  // Create a connection object from the connection function
  $db = get_db(); 
  // The SQL statement to be used with the database 
  $sql = 'SELECT size, id FROM public.shirt_size ORDER BY id'; 
  // The next line creates the prepared statement using the db connection      
  $stmt = $db->prepare($sql);
  // The next line runs the prepared statement 
  $stmt->execute(); 
  // The next line gets the data from the database and 
  // stores it as an array in the $events variable 
  $sizes = $stmt->fetchAll(); 
  // The next line closes the interaction with the database 
  $stmt->closeCursor(PDO::FETCH_ASSOC); 
  // The next line sends the array of data back to where the function 
  // was called (this should be the controller) 
  return $sizes;
 }

//Build the drop-down event select list
function buildShirtSizeList($sizes){
  $sizeList = "<select id='shirt_size_id' name='shirt_size_id'>";
  $sizeList .= "<option value='' selected disabled>Select a Size</option>";
  foreach ($sizes as $size) {
  
    $sizeList .= "<option value='$size[id]'>$size[size]</option>";
  }
  $sizeList .= "</select>";
  return $sizeList;
  }

function checkEmail($email)
{
  $valEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
  return $valEmail;
}

function createCode() {
  $db=get_db();
  $confirmation_id="";
  // The SQL statement to be used with the database 
  $sql = "SELECT array_to_string(array((
    SELECT SUBSTRING('ABCDEFGHJKLMNPQRSTUVWXYZ23456789'
                     FROM mod((random()*32)::int, 32)+1 FOR 1)
    FROM generate_series(1,8))),'')"; 
  // The next line creates the prepared statement using the db connection      
  $stmt = $db->prepare($sql);
  // The next line runs the prepared statement 
  $stmt->execute(); 
  // The next line gets the data from the database and 
  // stores it as an array in the $events variable 
  $confirmation_id = $stmt->fetch(); 
  // The next line closes the interaction with the database 
  $stmt->closeCursor(); 
  // The next line sends the array of data back to where the function 
  // was called (this should be the controller) 
  $confirmation_id= $confirmation_id[0];
  return $confirmation_id;
 }



/*This function will handle site registrations.*/
function regRacer($first_name, $last_name, $email, $shirt_size_id, $event_id)
{

    // Create a connection object using the acme connection function
    $db = get_db();
    $confirmation_id = "";
    $confirmation_id =createCode();
    // The SQL statement
    $sql = 'INSERT INTO participant (first_name, last_name, email, shirt_size_id, event_id, confirmation_id)
     VALUES (:first_name, :last_name, :email, :shirt_size_id, :event_id, :confirmation_id)';
    // Create the prepared statement using the acme connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':first_name', $first_name, PDO::PARAM_STR);
    $stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':shirt_size_id', $shirt_size_id, PDO::PARAM_INT);
    $stmt->bindValue(':event_id', $event_id, PDO::PARAM_INT);
    $stmt->bindValue(':confirmation_id', $confirmation_id, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}

   // Get client information by confirmation_id<>
   function getRacerInfo($confirmation_id)
   {
       $db = get_db();
       $sql = 'SELECT * FROM participant p JOIN shirt_size s ON p.shirt_size_id=s.id 
       JOIN event e ON p.event_id=e.id  WHERE confirmation_id = :confirmation_id';
       $stmt = $db->prepare($sql);
       $stmt->bindValue(':confirmation_id', $confirmation_id, PDO::PARAM_STR);
       $stmt->execute();
       $racerInfo = $stmt->fetch(PDO::FETCH_ASSOC);
       $stmt->closeCursor();
       return $racerInfo;
   }
   /*This function will handle account info updates.*/
   function updateRacer($first_name, $last_name, $email, $shirt_size_id, $event_id, $confirmation_id)
   {
       // Create a connection object using the acme connection function
       $db = get_db();
       // The SQL statement
       $sql = 'UPDATE participant SET first_name=:first_name, last_name=:last_name, email=:email, shirt_size_id=:shirt_size_id, event_id=:event_id
        WHERE confirmation_id=:confirmation_id' ;
       // Create the prepared statement using the acme connection
       $stmt = $db->prepare($sql);
       // The next four lines replace the placeholders in the SQL
       // statement with the actual values in the variables
       // and tells the database the type of data it is
       $stmt->bindValue(':first_name', $first_name, PDO::PARAM_STR);
       $stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
       $stmt->bindValue(':email', $email, PDO::PARAM_STR);
       $stmt->bindValue(':shirt_size_id', $shirt_size_id, PDO::PARAM_INT);
       $stmt->bindValue(':event_id', $event_id, PDO::PARAM_INT);
       $stmt->bindValue(':confirmation_id', $confirmation_id, PDO::PARAM_STR);
       
       // Insert the data
       $stmt->execute();
       // Ask how many rows changed as a result of our insert
       $rowsChanged = $stmt->rowCount();
       // Close the database interaction
       $stmt->closeCursor();
       // Return the indication of success (rows changed)
       return $rowsChanged;
       
   }

   //Build the MODIFY drop-down event select list
function buildShirtSizeList2($sizes, $racerInfo){
  $sizeList = "<select id='shirt_size_id' name='shirt_size_id'>";
  $sizeList .= "<option value='' selected disabled>Select a Size</option>";
  foreach ($sizes as $size) {
    if ($size['id']==$racerInfo['shirt_size_id']) {
      $sizeList .= "<option value='$size[id]' selected>$size[size]</option>";
  } else {
         $sizeList .= "<option value='$size[id]'>$size[size]</option>";
  }}
  $sizeList .= "</select>";
  return $sizeList;
  
}
//Build the MODIFY drop-down event select list
function buildEventList2($events, $racerInfo){
  $eventList = "<select id='event_id' name='event_id'>";
  $eventList .= "<option value='' selected disabled>Select an Event</option>";
  foreach ($events as $event) {
    if ($event['id']==$racerInfo['event_id']) {
      $eventList .= "<option value='$event[id] selected'>$event[event_name]</option>";
  } else {
    $eventList .= "<option value='$event[id]'>$event[event_name]</option>";
  }}
  $eventList .= "</select>";
  return $eventList;
  }