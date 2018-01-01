<!-- Write php function code here -->


<?php

$default = '?'; //default variable for answer
$a = 0;
$b = 0;
$operation = '+'; 

if ($_POST){	//upon post method - show feedback 
	$first = $_POST['a'];
	$second = $_POST['b'];
    // they have submitted the form
	if (($first=='') OR ($second=='')){
        // they've filled only 1 field
        echo 'Please fill in the form';;
    }elseif (($first=='') AND ($second=='')){
    	// they've not filled either field
    	echo 'Please fill in the form';
    }

    if($_POST['operators']) {
    	switch ($_POST['operators']) {
    		case '+':
    			$output = $first + $second;
    			break;
    		case '-':
    			$output = $first - $second;
    			break;	
    		case '*':
    			$output = $first * $second;
    			break;	
    		case '÷':
    			$output = $first / $second;
    			break;
    		case '^':
    			$output = $first ^ $second;
    			break;	  	
    	}
    	$default = $output;
    }
}

?>

<h3>Calculator form</h3>
<form action="calculator.php" method="post">
	<input type="number" name="a" size="2" value="<?php echo $a; ?>" />
	<select name="operators">
	  <option value="+"<?php if('+' == $operation) echo ' selected="selected" '; ?>>+</option> 
	  <option value="*"<?php if('*' == $operation) echo ' selected="selected" '; ?>>*</option>
	  <option value="÷"<?php if('÷' == $operation) echo ' selected="selected" '; ?>>÷</option>
	  <option value="^"<?php if('^' == $operation) echo ' selected="selected" '; ?>>^</option>
	</select>
	<input type="number" name="b" size="2" value="<?php echo $b; ?>" />  
	= <?php echo $default ?>
	</br>
	</br>
	<input type="submit" value="Calculate">
</form>





<!--

<html>
    <head>
        <link rel="stylesheet">
    </head>
    <body>
    <?php
        // setting some default variables
        $x = 0;
        $y = 0;
        $answer = '?';
        $operation = '+';

        if ($_POST){
            // they have submitted the form
            $x = $_POST['x'];
            $y = $_POST['y'];
            $operation = $_POST['operation'];

            if (($x) AND ($y)){
                switch($operation){
                    case '+':
                        $answer = $x + $y;
                        break;
                    case '-':
                        $answer = $x - $y;
                        break;
                    // default:
                    //     break;
                }
            }
        } ?>

        <form action="" method="post">
            <div>
                <input type="text" name="x" size="2" value="<?php echo $x; ?>" />

                <select name="operation">
                    <option value="+"<?php if('+' == $operation) echo ' selected="selected" '; ?>>x+y</option>
                    <option value="-"<?php if('-' == $operation) echo ' selected="selected" '; ?>>x-y</option>
                    <option value="*"<?php if('x' == $operation) echo ' selected="selected" '; ?>>x*y</option>
                    <option value="÷"<?php if('÷' == $operation) echo ' selected="selected" '; ?>>x÷y</option>
                    <option value="^"<?php if('^' == $operation) echo ' selected="selected" '; ?>>x^y</option>
                </select>

                <input type="text" name="y" size="2" value="<?php echo $y; ?>" /> = <?php echo $answer; ?>
            </div>

            <div>
                <input type="submit" value="Calculate" />
            </div>
        </form>
    </body>
</html>



