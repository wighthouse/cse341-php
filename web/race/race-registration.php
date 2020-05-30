<?php 
  require_once('functions.php');
   $db = get_db();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>CTE341 | Web Backend Development II | Race Registration</title>

    <link rel="stylesheet" href="css/race.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&Oswald&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <?php include '../Homepage/php/header.php'; ?>
    </header>
    <main>
        <div class="main-container">
            <h2 class="page-title">Hennepin County Peanuts Run</br>Race Registration Page</h2>

          
        <div class="main-form register">
        <h3>Register for an event.</h3>
        <form class="formContainer" action="add-racer.php" method="post" >
                <h3 class="formHeading">Register for a Race</h3>

                <label class="above">First name*<input type="text" name="first_name" required 
                ></label>
                <label class="above">Last name*<input type="text" name="last_name" required 
                ></label>
                <label class="above">email address*<input type="email" name="email" required 
                ></label>
                
                <p>*All fields are required</p>
                <input type="submit" name="submit" class="button" value="Create Account">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="register-user">
                <h3>Already have an account? Login instead.</h3>
                <a href="http://localhost/acme/accounts/index.php?action=login" class="button">Go to Login Page</a>
            </form>
        
        </div>

    </main>

    <footer>
    <?php include '../Homepage/php/footer.php';?>
    </footer>
</body>

</html>