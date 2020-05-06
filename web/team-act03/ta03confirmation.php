<?php
$name = htmlspecialchars($_POST["userName"]);
$email = htmlspecialchars($_POST["userEmail"]);
$major = htmlspecialchars($_POST["major"]);
$comments = htmlspecialchars($_POST["comments"]);
$places = $_POST["places"];

$information = array(
    array("North America", "9,449,000 square miles", "Mount McKinley, Alaska, U.S.: 20,320 feet", "Death Valley, California, U.S.: 282 feet (86 m) below sea level"),
    array("South America", "6,879,000 square miles (17,819,000 sq km)", "Mount Aconcagua, Argentina: 22,834 feet (6,960 m)","Valdes Peninsula, Argentina: 131 feet (40 m) below sea level" ),
    array("Europe","3,837,000 square miles (9,938,000 sq km)","Mount Elbrus, bordering Russia and Georgia: 18,510 feet (5,642 m)","Caspian Sea, bordering Russia and Kazakhstan: 92 feet (28 m) below sea level"), 
    array("Asia","17,212,000 square miles (44,579,000 sq km)","Mount Everest, bordering China and Nepal: 29,035 feet (8,850 m)","Dead Sea, bordering Israel and Jordan: 1,349 feet (411 m) below sea level"),
    array("Australia","3,132,000 square miles (8,112,000 sq km)","Mount Kosciusko, Australia: 7,316 feet (2,228 m)","Lake Eyre, Australia: 52 feet (16 m) below sea level") ,
    array("Africa","11,608,000 square miles (30,065,000 sq km)","Mount Kilimanjaro, Tanzania: 19,340 feet (5,895 m)","Lake Assal, Djibouti: 512 feet (156 m) below sea level") ,
    array("Antartica","5,100,000 square miles (13,209,000 sq km)","Vinson Massif: 16,066 feet (4,897 m)","Ice covering: 8,327 feet (2,538 m) below sea level"));
 ​
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
 
 if(!empty($places)){
       
        foreach($places as $visited) {
            $visited_clean = htmlspecialchars($visited);
            
            echo "<b>Continent: </b>".$information[$visited][0] ."<b> Area: </b>".
             $information[$visited][1]."<b> Highest Point: </b>".
           $information[$visited][2]."<b> Lowest Point: </b>".
            $information[$visited][3]."<br><br>";
                                
        }
        echo "</table>";
    };
    ?> 
</body>
</html>
<!-- echo "<table>
 <tr>
   <th>Continent</th>
   <th>Area</th>
   <th>Highest Point</th>
   <th>Lowest Point</th>
 </tr>"; -->
<!-- echo "<tr><td>". $information[$visited][0] ."</td>
            <td>". $information[$visited][1]."</td>
            <td>".$information[$visited][2]."</td>
            <td>".$information[$visited][3]>"</td></tr>"; -->