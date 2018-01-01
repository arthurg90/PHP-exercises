<h1>People Array</h1>

<h3>
<?php

$peopleAndPlacesArray = [
						'Oli' => 'Bedminster',   //key[0,1,2,3] => value
						'Kye' => 'St Phillips',
						'Paul' => 'Worcester',
						'Nicola' => 'Clifton',
						'Ellie' => 'Clifton',
						'Arthur' => 'Southville',
						'Daniel' => 'Gloucester Rd',
						'David' => 'Stokes Croft',
						'Liz' => 'Montpellier'			
						
						];

foreach($peopleAndPlacesArray AS $value => $key) {
	echo $value. ' lives in '.$key.'<br />';
}

?>
</h3>

