<?php
$name = htmlspecialchars($_POST["userName"]);
$email = htmlspecialchars($_POST["userEmail"]);
$major = htmlspecialchars($_POST["major"]);
$comments = htmlspecialchars($_POST["comments"]);
$places = $_POST["places"];

$information = array(
    array("North America", "9,449,000 square miles", "Mount McKinley, Alaska, U.S.: 20,320 feet", "Death Valley, California, U.S.: 282 feet (86 m) below sea level"),
    array("South America", "South America is below North America.  It is very beautiful and has a very long and interesting history", "","" ),
    array("Europe is amazing.","","",""), 
    array("Asia"),
    array("Australia") ,
    array("Africa") ,
    array("Antartica"));
 ​// "Europe is amazing.  It unfortunetly has been the site of 2 World Wars.  There are many historical sites worth visiting though." => "2",
    // "Asia is a very beautiful place.  There are many types of activities for all, between the nightlife, beaches, and quiet places to meditate." => "3",
    // "Australia: Kangaroos, koalas, and the Great Barrier Reef. So many different places to visit." => "4",
    // "Since you have visited Africa, you know that it is the 2nd largest continent in both land and in population.  There are only a few parts of the continent that you'd consider cold." => "5",
    // "Antartica.  Guess what? Its cold.  And penguins.  Lots of ice.  But it has penguins!" => "6", 
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <title>Team Activity 03</title>
    <meta name=viewport content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
</head>
<body id="mainBody">
    <p><b>Name: </b><span><?php echo $name ?></span></p>
    <p><b>Email: </b><span><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></span></p>
    <p><b>Major: </b><span><?php echo $major ?></span></p>
    <p><b>Comments: </b><span><?php echo $comments ?></span></p>
    <p><b>Continents you've visited: </b><br><span>
    <?php 
             if(!empty($places))
            {
                foreach ($places as $visited)
                {
                    $visited_clean = htmlspecialchars($visited);
                    echo $information[$visited][0] . "<br>";
                }
            }
            
    ?>
    </span></p>
    <h4>Basic info on the continents you've visited:</h4>

 <?php
 echo "<table>
 <tr>
   <th>Continent</th>
   <th>Area</th>
   <th>Highest Point</th>
   <th>Lowest Point</th>
 </tr>";
 if(!empty($places)){
       
        foreach($places as $visited) {
            $visited_clean = htmlspecialchars($visited);
            
            echo "<b>Continent: </b>".$information[$visited][0] ."<b> Area: </b>".
             $information[$visited][1]."<b> Highest Point: </b>".
           $information[$visited][2]."<b> Lowest Point: </b>".
            $information[$visited][3]."<br>";
                                
        }
        echo "</table>";
    };
    ?> 
</body>
</html>

<!-- echo "<tr><td>". $information[$visited][0] ."</td>
            <td>". $information[$visited][1]."</td>
            <td>".$information[$visited][2]."</td>
            <td>".$information[$visited][3]>"</td></tr>"; -->