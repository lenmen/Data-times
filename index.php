<?php namespace Test;

// Add files
require_once('class/myDateManager.php');

$object = new \MyDateManager\DateManager('d F Y');

echo '<br>Output: '. $object->Now('full');

echo '<br>Datum formaat: '. \MyDateManager\DateManager::$formatDate;
echo '<br>Tijd formaat: '. \MyDateManager\DateManager::$formatTime;
echo '<br>Week: '. \MyDateManager\DateManager::showWeek();

echo '<br> Dates  till next 12 days: <br><ul>';

for ($j = 1; $j <= 12; $j++) {
	echo '<li>'. \MyDateManager\DateManager::addDay(). '</li>';
} 

echo '</ul><br>';

echo '6 months ahead: <br><ul>';

for ($i = 1; $i <= 6; $i++) {
	echo '<li>'. \MyDateManager\DateManager::addMonth(). '</li>';	
}

echo '</ul><br>';

echo '3 years ahead: <br><ul>';

for ($k = 1; $k <= 3; $k++) {
	echo '<li>'. \MyDateManager\DateManager::addyear(). '</li>';	
}

echo '</ul><br>';

// Reset the date
\MyDateManager\DateManager::resetDate();

echo '<b>The date is now resetted to today!</b>';
echo '<br>The day is: '. \myDateManager\DateManager::showDay();

// Add again a day
\MyDateManager\DateManager::addDay();

// Display the new day
echo '<br>The next day is: '. \myDateManager\DateManager::showDay(). '<br>';

echo '<br>The month is: '. \myDateManager\DateManager::showMonth();

// Add again a day
\MyDateManager\DateManager::addMonth();

// Display the new day
echo '<br>The next month is: '. \myDateManager\DateManager::showMonth(). '<br>';
echo '<br>The year is: ' . \myDateManager\DateManager::showYear(). '<br>';

echo date('Y-m-d', strtotime(\myDateManager\DateManager::$today)). '<br>';

echo 'Difference between monday and sunday is: '. $object->diffDays('13-07-2015', '19-07-2015'). "<br>";
echo \MyDateManager\DateManager::$newDate. '<br>';
// Skip to another date
$object->moveTo(1, 3);

// Show the new date
echo \MyDateManager\DateManager::$newDate;