<!--
Create a function that takes CreditCard numbers in any form, e.g.: 
41112222333344445
4111 2222 3333 4444
4111x2222x3333x4444
4111-2222-3333-4444
4111-2222-3333-4444-5555
Format and return in form '4111-2222-3333-4444'
Hint: see PHP's built-in substr() function
-->


<?php 

//test the inputs with various wrong inputs

$testCases = [];

$testCases[] = '41112222333344445';
$testCases[] = '4111 2222 3333 4444';
$testCases[] = '4111x2222x3333x4444';
$testCases[] = '4111-2222-3333-4444';
$testCases[] = '4111-2222-3333-4444-5555';


function credit_format($inputCardNumber){
	//remove invalid characters
	$pattern = '/\D/'; //pattern selects everything not a digit
	$replacement = '';
	$inputCardNumber = preg_replace($pattern, $replacement, $inputCardNumber);
	
	//card number length checker
	if (strlen($inputCardNumber)>=16) {
		$outputCardNumber = substr($inputCardNumber, 0, 16);
		// return $outputCardNumber;
	}
	else return "Card number should be minimum 16 digits long";

	$outputCardNumber1 = substr($inputCardNumber, 0, 4);
	$outputCardNumber2 = substr($inputCardNumber, 4, 4);
	$outputCardNumber3 = substr($inputCardNumber, 8, 4);
	$outputCardNumber4 = substr($inputCardNumber, 12, 4);
	return $outputCardNumber1."-".$outputCardNumber2."-".$outputCardNumber3."-".$outputCardNumber4;	
}

//display output

foreach ($testCases as $testCase) {     //loop for displaying each test case
	echo $testCase. ' ==> '.credit_format($testCase);
	echo '<br>';
}