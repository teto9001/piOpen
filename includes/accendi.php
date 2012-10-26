<!-- v0001 -->
<?php
error_reporting(-1);
include("GPIO.php");
$gpio = new GPIO();
$tempo = $_GET["tempo"];
if (!isset($tempo)) {
	$tempo = 500;
}
if ($tempo>5000) {
	$tempo = 5000;
}
if ($tempo<100) {
	$tempo = 100;
}

$tempo = $tempo/1000;
$gpio->Value(4,0);
sleep($tempo);
$gpio->Value(4,1);
?>
