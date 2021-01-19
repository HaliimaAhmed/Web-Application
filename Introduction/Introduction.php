<!DOCTYPE html>
<html>
<head>
   <title>Halima Ahmed - Hello World GET method</title>
    <h2> Halima Ahmed - Hello World GET method </h2>
   </head>
   <body>
   <form method="get" action="Introduction.php">
    <br><br>
   Enter First Name: <input type="text" name="firstName" >
    <br><br>
	Enter Last Name: <input type="text" name="lastName" >
	   <br><br>

 <input type="submit" value="Submit Name">
 
 </form>

<?php

$firstName = isset($_GET['firstName']) ? $_GET['firstName']: '';
$lastName = isset($_GET['lastName']) ? $_GET['lastName']: '';
  
if (empty($firstName)) echo "Hello <b>please enter your name</b>,";
	   else{ 
		   if (empty($lastName)
		       { echo "Hello <b>$firstName</b>, please enter your last name"; 
			     }else { 
			       echo "Hello <b>$firstName $lastName</b>, its nice to meet you ";}
 }

?>
      
</body>
		
		 <a href="https://validator.w3.org/check?uri=referer"><img
          src="http://www.w3.org/Icons/valid-xhtml10"
          alt="Valid XHTML 1.0!" height="31" width="88" /></a>
</html>
