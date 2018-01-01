<h1>How Many Seconds in a year</h1>

<h3>
<?php

$daysInAYear = 365;
$hoursInADay = 24;
$minutesInAnHour = 60;
$secondsInAMinute = 60;

$secondsInAYear = $daysInAYear * $hoursInADay * $minutesInAnHour * $secondsInAMinute;

echo 'There are <strong style="color:blue;">'; 


echo number_format($secondsInAYear, 0, ',', ',');

echo '</strong> seconds in one year';

?>
</h3>

