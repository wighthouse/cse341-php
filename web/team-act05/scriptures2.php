<?php 
   @require_once('teamFunctions.php');
   $topics=getTopics();  
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
    
        echo "<label class='above' id='chkTopics{$topic['id']}'>{$topic['topic']}<input type='checkbox' value={$topic['id']} name='chkTopics[]'></label>";
}?>
        <button type='submit'>Add Scripture</button>
        </form>   
           

    </main>

    <footer>
    <?php include '../Homepage/php/footer.php'; ?>
    </footer>
</body>

</html>