<!-- Create a function that takes Twitter username in any form, e.g.: 
oliward
@OLIWARD
Format and return in form '@oliward' (lowercase)
Hint: see PHP's built-in strtolower() function and str_replace()

Advanced:
Also account for user inputting:
https://twitter.com/oliward
http://twitter.com/@oliward
https://twitter.com/oliward#home


Think 'white list' and 'black list';
White list will be more efficient time wise


 -->

<?php 

//test the inputs with various wrong inputs

$testCases = [];

$testCases[] = 'Arth@urg';
$testCases[] = '@arthurG';
$testCases[] = 'ARTHURG';
$testCases[] = 'aRtHuRg';
$testCases[] = 'ar14t45h6ur\g1411"3';
$testCases[] = 'a11RthUrg';
$testCases[] = '@@art	字-ま_۳hurg';
$testCases[] = '@@ar~?thurg';
$testCases[] = '-.,!@ar  thurg#$%^&*()';
$testCases[] = '__안녕하ar세요thurg#$%^&*()';
$testCases[] = 'https://twitter.com/aRtHuRg';
$testCases[] = 'http://twitter.com/@arth//urg';
$testCases[] = 'http://twitter.com/arthu#rg';


//function to format the username: 

// function twit_format($inputUsername){
	//function to add:'@' at the beginning of string
	//function to make it lowercase
	//function to remove invalid characters

	//function to remove everything before final / in twitter.com: regular expression or preg_replace?

	$test = 'http://twitter.coM/arthu#rg';
	$find = 'com/';
	$addressFree = strpbrk($test, $find);
	echo $addressFree;



// 	$pattern = '/[\d\W]/'; //pattern selects numbers/special characters/underscores
// 	$replacement = '';
// 	$inputUsername = preg_replace($pattern, $replacement, $addressFree); //reg ex used to remove all non-alphanumeric characters and spaces
// 	$outputUsername = "@".strtolower($inputUsername); //put it last so it lowercases everything and adds an @ at the start
	
// 	//find the com/ at the end of twitter address

// 	return $outputUsername;	//returns the formatted string
// }

// //example output for testing: 

// foreach ($testCases as $testCase) {     //loop for displaying each test case
// 	echo $testCase. ' ==> '.twit_format($testCase);
// 	echo '<br>';
// }


// ?>