<?php 

for($i=0; $i<=23; $i++) { 
	switch ($i) {
		case 0: 
			echo $i.":00". " is dark</br>";
			break;
		case 1: 
			echo $i.":00". " is dark</br>";
			break;
		case 2: 
			echo $i.":00". " is dark</br>";
			break;
		case 3: 
			echo $i.":00". " is dark</br>";
			break;
		case 4: 
			echo $i.":00". " is dark</br>";
			break;
		case 5: 
			echo $i.":00". " is dark</br>";
			break;
		case 6: 
			echo $i.":00". " is dark</br>";
			break;
		case 7: 
			echo $i.":00". " is light</br>";
			break;	
		case 8: 
			echo $i.":00". " is light</br>";
			break;
		case 9: 
			echo $i.":00". " is light</br>";
			break;
		case 10: 
			echo $i.":00". " is light</br>";
			break;
		case 11: 
			echo $i.":00". " is light</br>";
			break;
		case 12: 
			echo $i.":00". " is light</br>";
			break;
		case 13: 
			echo $i.":00". " is light</br>";
			break;
		case 14: 
			echo $i.":00". " is light</br>";
			break;
		case 15: 
			echo $i.":00". " is light</br>";
			break;
		case 16: 
			echo $i.":00". " is light</br>";
			break;
		case 17: 
			echo $i.":00". " is light</br>";
			break;
		case 18: 
			echo $i.":00". " is light</br>";
			break;
		case 19: 
			echo $i.":00". " is dark</br>";
			break;	
		case 20: 
			echo $i.":00". " is dark</br>";
			break;	
		case 21: 
			echo $i.":00". " is dark</br>";
			break;	
		case 22: 
			echo $i.":00". " is dark</br>";
			break;	
		case 23: 
			echo $i.":00". " is dark</br>";
			break;	
     		echo " ";
	}
}
?>



<!--SHORTER switch -->

<?php 

for($i=0; $i<=23; $i++) { 
	switch ($i) {
		case 0; 			
		case 1; 
		case 2; 
		case 3; 
		case 4; 
		case 5; 
		case 6; 
		case 7;
		case 18:
		case 19: 
		case 20:
		case 21:
		case 22:
		case 23:		
			echo $i.":00 is dark</br>";
			break;
		case 8: 
		case 9: 
		case 10: 
		case 11: 
		case 12: 
		case 13: 
		case 14: 
		case 15: 
		case 16: 
		case 17: 
			echo $i.":00 is light</br>";
			break;
	}
}

