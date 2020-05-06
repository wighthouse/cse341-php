<?php
$major=array("CS"=>"Computer Science","WebDev"=>"Web Design and Development","CIT"=>"Computer Information Technology", "CE"=> "Computer Engineering");
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <title>Team Activity 03</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
</head>
<body id="mainBody">
    <form action="ta03confirmation.php" method="post">
        <!--User Name and Email-->
        <fieldset>
        <legend>Contact Info</legend>
        <label for="userName">Name: <input type="text" name="userName"></label><br>
        <label for="userEmail">Email: <input type="text" name="userEmail"></label><br>
        
</fieldset>
            
        <!-- New and Improved Radio List - with associative array-->
       <fieldset>
           <legend>What is your major?</legend> 
           <?php
                foreach($major as $x=>$x_value)
            {
                echo "<input type='radio' name='major' value='{$x_value}'>{$x_value}<br>";
  
            }
            ?>
</fieldset>
<!--Which countries did the user visit?-->
<fieldset>
           <legend>What continents have you visited?</legend> 
        <input type="checkbox" name="places[]" id="northAmerica" value="0"><label for="northAmerica">North America</label><br />
        <input type="checkbox" name="places[]" id="southAmerica" value="1"><label for="southAmerica">South America</label><br />
        <input type="checkbox" name="places[]" id="europe" value="2"><label for="europe">Europe</label><br />
        <input type="checkbox" name="places[]" id="asia" value="3"><label for="Asia">Asia</label><br />
        <input type="checkbox" name="places[]" id="australia" value="4"><label for="australia">Australia</label><br />
        <input type="checkbox" name="places[]" id="africa" value="5"><label for="africa">Africa</label><br />
        <input type="checkbox" name="places[]" id="antarctica" value="6"><label for="Antarctica">Antarctica</label><br />
        </fieldset>
        <!--User thoughts-->
        <fieldset>
           <legend>Additional Comments:</legend> 
        <label for="comments"><textarea name="comments" cols="20" rows="4"></textarea></label><br>
        </fieldset>
        <input class="button" type="submit" name="submit" value="Submit">
    </form>
</body>
</html>