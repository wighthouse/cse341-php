<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>CTE341 | Web Backend Development II | Assignments</title>

    <link rel="stylesheet" href="/Homepage/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&Oswald&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <?php include '/Homepage/php/header.php'; ?>
    </header>
    <main>
        <div class="main-container">
            <h2 class="page-title">Scripture Resources</h2>

            <?php   try
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
foreach ($db->query('SELECT username, password FROM note_user') as $row)
{
  echo 'user: ' . $row['username'];
  echo ' password: ' . $row['password'];
  echo '<br/>';
}

echo '<h3>Example 2</h3>';

$statement = $db->query('SELECT username, password FROM note_user');
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  echo 'user: ' . $row['username'] . ' password: ' . $row['password'] . '<br/>';
}
echo '<h3>Example 3</h3>';

$statement = $db->query('SELECT username, password FROM note_user');
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
print_r($results);

foreach ($results as $row)
{
  echo 'user: ' . $row['username'];
  echo ' password: ' . $row['password'];
  echo '<br/>';
}


echo '<h2>Next Section</h2>';

$stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo $rows;





?>
        </div>

    </main>

    <footer>
        <?php include '/Homepage/php/footer.php'; ?>
    </footer>
</body>

</html>