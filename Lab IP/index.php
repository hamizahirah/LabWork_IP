<?php # index.php
$page_title = 'Welcome to this Site!';
include ('includes/header.html');

function create_menu() {
	echo '<h1>Welcome to My PHP Labwork Collections</h1>

	<p>Here are the pages that I\'ve created: </p>
	<p>1. Program Registration</p>
	<p>2. Register Detail User</p>
	<p>3. View Current User</p>
	<p>4. Tax Calculator</p>
	<p>5. Speed Converter</p>
	<p>6. Bus Ticket</p>';

} // End of the function definition.

// Call the function:
create_menu();


include ('includes/footer.html');
?>