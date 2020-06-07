<?php

//Check for existing email address
function checkEmailMatch($email)
{
    $db = get_db();
    $sql = 'SELECT email FROM participant WHERE email = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
    $stmt->closeCursor();
    if (empty($matchEmail)) {
        return 0;
    } else {
        return 1;
    }
}

// Filter and store the data
$first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
$last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$shirt_size_id = filter_input(INPUT_POST, 'shirt_size_id', FILTER_SANITIZE_NUMBER_INT);
$event_id = filter_input(INPUT_POST, 'event_id', FILTER_SANITIZE_NUMBER_INT);

// $emailMatch = checkEmailMatch($email);

// // Check for existing email address in the table
// if ($emailMatch) {
//   $message = '<p class="notify">That email address already exists. Do you want to modify your registration instead?</p>';
//   $_SESSION['message'] = $message;
//   include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/login.php';
//   exit;
// }

// // Check for missing data
// if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
//   $message = '<p class="notify">Please provide information for all empty fields.</p>';
//   $_SESSION['message'] = $message;
//   include $_SERVER['DOCUMENT_ROOT'] . '/acme/view/registration.php';
//   exit;
// }

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

function deleteRegistration($confirmation_id){
  // Create a connection object using the acme connection function
  $db = get_db();
  // The SQL statement
  $sql = 'DELETE FROM participant WHERE confirmation_id = :confirmation_id';
  // Create the prepared statement using the acme connection
  $stmt = $db->prepare($sql);
  // The next line replaces the placeholders in the SQL
  // statement with the actual values in the variables
  // and tells the database the type of data it is
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