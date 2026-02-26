<?php
$page_title = 'Speed Converter';
include ('includes/header.html');
function calculate_speed($input){
//Calculate speed
global $kph;
$kph = $input * 1.609;
}
?>
<form action="speed_func.php" method="post">
<h1>Speed Converter</h1>
<p><b>Speed :</b> <input type="text" name="mph" size="20" maxlength="40" /></p>
<p><b>From :Miles per Hour (MPH)</b></p>
<p><b>To:Kilometer per Hour (KPH)</b></p>
<div align="left"><input type="submit" name="submit" value="Convert" /></div>
</form>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$mph = $_POST['mph']; //retrieve the input from user
calculate_speed($mph); //calculate
echo"<h1>Conversion result </h1><br /> $mph Miles per hour == $kph kilometer per hour";
//display
}
include ('includes/footer.html');
?>
