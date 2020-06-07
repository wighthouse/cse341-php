<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
//This is the Race Controller

 //Create or access a Session 
 session_start();

 require_once('../race/model/functions.php');
 require_once('../race/model/racer-model.php');

 $db = get_db(); 

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}


switch ($action) {
    case 'race-query':
        $searchRacers = validateInput($_POST['event_id']);
        // Now run the query to find the text in the database, and then save the results as a variable
        $racers = searchQuery($searchRacers, $db);
        break;

    case 'race-registration':

        break;

    case 'add-racer':

        break;
        
    case 'race-modify':

        break;  
        
    case 'updateRacer':
        // Filter and store the data
 $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
 $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
 $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
 $shirt_size_id = filter_input(INPUT_POST, 'shirt_size_id', FILTER_SANITIZE_NUMBER_INT);
 $event_id = filter_input(INPUT_POST, 'event_id', FILTER_SANITIZE_NUMBER_INT);
 $confirmation_id = filter_input(INPUT_POST, 'confirmation_id', FILTER_SANITIZE_STRING);

    //Attempt the update
    $updateResult =updateRacer($first_name,
    $last_name,
    $email,
    $shirt_size_id,
    $event_id,
    $confirmation_id);

if ($updateResult === 1) {
    $message = "<p class='notify'>You have successfully updated $first_name's registration.</p>";
    $_SESSION['message'] = $message;
    header('location: ../race/views/update-racer');
    exit;
  } else {
    $message = "<p>Sorry, the product was not updated. Please try again.</p>";
    $_SESSION['message'] = $message;
  }
  include ('views/update-racer.php');
  exit;

break;
        
    case 'delete-registration':
        $confirmation_id = filter_input(INPUT_GET, 'confirmation_id', FILTER_SANITIZE_STRING);
        $first_name = filter_input(INPUT_GET, 'first_name', FILTER_SANITIZE_STRING);
        $deleteResult = deleteRegistration($confirmation_id);
        if ($deleteResult) {
          $message = "<p class='notify'>$first_name was successfully deleted.</p>";
          $_SESSION['message'] = $message;
        }
        break; 
        
    case 'delete-confirmation':

        break; 

    default: 
    
        include '../race/views/home.php';
}


//var_dump($categories);
//	exit;



//echo $navList;
//exit;


