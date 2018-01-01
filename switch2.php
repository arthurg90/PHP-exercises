<!--SHORTEST switch -->
<?php 
for($i=0; $i<=23; $i++) { 
	switch ($i) {
		case 0:	case 1:	case 2:	case 3:	case 4:	case 5:	case 6:	case 7:	case 18: case 19: case 20: case 21:	case 22: case 23:		
			echo $i.":00 is dark</br>";
			break;
		case 8:	case 9: case 10: case 11: case 12: case 13: case 14: case 15: case 16: case 17: 
			echo $i.":00 is light</br>";
			break;		
	}
}
?>