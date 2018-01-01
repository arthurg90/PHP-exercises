<!-- "Write a script that prints the numbers from 1 to 100. But for multiples of three print "Fizz" instead of the number and for the multiples of five print "Buzz". For numbers which are multiples of both three and five print "FizzBuzz""
 -->


<!-- <?php 

for($i=1; $i<100; $i++) {
	if ($i%3==0 && $i%5==0) {
		echo 'Fizzbuzz'.'<br />';
	} elseif ($i%3==0) {
		echo 'Fizz'.'<br />';
	} elseif ($i%5==0) {
		echo 'Buzz'.'<br />';	
	} else {
		echo $i.'<br />';	
	}	
}

?>

 -->
<?php 

for($i=1; $i<=100; $i++) {
	$mul3 = $i%3==0;
	$mul5 = $i%5==0;
	echo ($mul5 && $mul3 ? 'Fizzbuzz' : ($mul3 ? 'Fizz' : ($mul5 ? 'Buzz' : $i))).'<br />';
}

?>