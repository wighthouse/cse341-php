<?php
    
    @require_once('teamFunctions.php');
   
   

    function validateInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

// If POST is set, then do the following
if(isset($_POST)) {
    $book = $_POST['book'];
    $chapter = $_POST['chapter'];
    $verse = $_POST['verse'];
    $content = $_POST['content'];
    $topicIds = $_POST['chkTopics'];

    echo "Adding to DB";

    // Call this method to add scriptures & topics to the database
    addScripture($book, $chapter, $verse, $content, $topicIds);

    // Now redirect to the new page.  Technically you'd want to check if values were inserted, and if successfull redirect the user, but this works for now
    // finally, redirect them to a new page to actually show the topics
    header("Location: show-topics.php");

    die(); // we always include a die after redirects. In this case, there would be no
    //        // harm if the user got the rest of the page, because there is nothing else
    //        // but in general, there could be things after here that we don't want them
    //        // to see.

}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>CTE341 | Web Backend Development II | Add Scriptures</title>

    <link rel="stylesheet" href="../Homepage/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&Oswald&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <?php include '../Homepage/php/header.php'; ?>
    </header>
    <main>
        <div class="main-container">
            <h2 class="page-title">Insert Scriptures</h2>
         
       
        </div>
           

    </main>

    <footer>
    <?php include '../Homepage/php/footer.php'; ?>
    </footer>
</body>

</html>