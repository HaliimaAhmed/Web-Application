<!DOCTYPE html>
<html lang="en">
<head>
        <title>temperature converter.PHP</title>
		  <h2> Halima Ahmed - Temperature converter.php </h2>
	</head>
	<body>		
					
		<form method="post" action="Week7Lab_Task2_HalimaAhmed.php" >
		<table>
			<tr>
				<td>
				Temperature
				</td>
				<td>
				<input type= "text" name = "temperature" id= "temperature">
				</td>
			</tr>
			
			<tr>
				<td>
					fahrenheit<input type="radio" name= "temperature_unit" id="fahrenheit" value ="fahrenheit" >
					<br>
					celsius<input type = "radio" name = "temperature_unit" id = "celsius" value = "celsius">
				</td>
				
			</tr>
			
			<tr>
				<td><input type="submit" name ="Submit" id = "Submit" value = "convert"></td>
			</tr>
			
		</table>
		</form>
		
		<?php
			$Temperature = @$_POST['temperature'];
			$temperature_unit = @$_POST['temperature_unit'];
			
			function Converter($Temperature, $temperature_unit){
				
				if($temperature_unit === 'fahrenheit'){
					$tempafter = $Temperature * 1 +32;
					print($Temperature. '°F  is equal to '. $tempafter. '°C');
					echo "   ";
				}
				
				if($temperature_unit === 'celsius'){
					$tempafter = ($Temperature - 32)/1;
					print($Temperature.'°C is equal to '. $tempafter. ' °F');
					echo "   ";

				}	
			} 
			
			if(isset($_POST['Submit'])&& isset($Temperature)){
				if(!(is_numeric($Temperature))){
				
						echo "Error. Please enter a number ";
						echo "   ";

					}else{
						if(isset($temperature_unit))
							Converter($Temperature, $temperature_unit);
						else
							echo "Error. Please choose a temperature";
						echo "   ";
					}
			}
			
			?>
			
		</body>
		
		 <a href="https://validator.w3.org/check?uri=referer"><img
          src="http://www.w3.org/Icons/valid-xhtml10"
          alt="Valid XHTML 1.0!" height="31" width="88" /></a>
</html>	
