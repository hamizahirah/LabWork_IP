<?php # register.php
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Register';
include ('includes/header.html');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Initialize an error array.
	
	// Check for a first name:
	if (empty($_POST['first_name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = trim($_POST['first_name']);
	}
	
	// Check for a last name:
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = trim($_POST['last_name']);
	}

	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = trim($_POST['email']);
	}
	
	// Check for an address:
	if (empty($_POST['address'])) {
		$errors[] = 'You forgot to enter your address.';
	} else {
		$address = trim($_POST['address']);
	}
	
	// Check for a city:
	if (empty($_POST['city'])) {
		$errors[] = 'You forgot to enter your city.';
	} else {
		$city = trim($_POST['city']);
	}
	
	// Check for a state:
	if (empty($_POST['state'])) {
		$errors[] = 'You forgot to enter your state.';
	} else {
		$state = trim($_POST['state']);
	}
	
	// Check for a phone:
	if (empty($_POST['phone'])) {
		$errors[] = 'You forgot to enter your phone.';
	} else {
		$phone = trim($_POST['phone']);
	}
	
	//Add check-in and check-out date, adult, and children
	$c_in = $_POST['cin'];
	$c_out = $_POST['cout'];
	$adult = $_POST['adult'];
	$children = $_POST['children'];
	
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		include ('../mysqli_connect.php'); // Connect to the db.

		// Make the query:
		$q = "INSERT INTO users (first_name, last_name, email, address, city, state, phone, registration_date, c_in, c_out, adult, children) VALUES ('$fn', '$ln', '$e','$address', '$city', '$state', '$phone', NOW(), '$c_in', '$c_out', '$adult', '$children')";		
		$r = mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.

			// Print a message:
			echo '<h1>Thank you!</h1>
		<p>You are now registered!</p><p><br /></p>';	

		} else { // If it did not run OK.
	
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
	
			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
				
		} // End of if ($r) IF.
		
		mysqli_close($dbc); // Close the database connection.
		
		// Include the footer and quit the script:
		include ('includes/footer.html'); 
		exit();
		
	} else { // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.

} // End of the main Submit conditional.
?>
<h1>Register</h1>
<form action="register.php" method="post">
	<p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
	<p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
	<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
	<p>Address: <input type="text" name="address" size="30" maxlength="100" value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>"  /></p>
	<p>City: <input type="text" name="city" size="15" maxlength="50" value="<?php if (isset($_POST['city'])) echo $_POST['city']; ?>"  /></p>
	<p>State:
	<select name="state">
	<option value="Johor">Johor</option>
	<option value="Kedah">Kedah</option>
	<option value="Kelantan">Kelantan</option>
	<option value="Melaka">Melaka</option>
	<option value="Negeri Sembilan">Negeri Sembilan</option>
	<option value="Pahang">Pahang</option>
	<option value="Perak">Perak</option>
	<option value="Perlis">Perlis</option>
	<option value="Pulau Pinang">Pulau Pinang</option>
	<option value="Sabah">Sabah</option>
	<option value="Sarawak">Sarawak</option>
	<option value="Selangor">Selangor</option>
	<option value="Terengganu">Terengganu</option>
	<option value="Kuala Lumpur">Kuala Lumpur</option>
	<option value="Labuan">Labuan</option>
	<option value="Putrajaya">Putrajaya</option>
	</select></p>
	<p>Phone: <input type="text" name="phone" size="15" maxlength="20" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>"  /></p>
	<p>Check-In: <input type="date" name="cin" size="10" maxlength="20" value="<?php if (isset($_POST['cin'])) echo $_POST['cin']; ?>"  /> Check-Out: <input type="date" name="cout" size="10" maxlength="20" value="<?php if (isset($_POST['cout'])) echo $_POST['cout']; ?>"  /> </p>
	<p>Adult:
	<select name="adult">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	</select> 
	<p>Children:
	<select name="children">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	</select>
	<p><input type="submit" name="submit" value="Register" /></p>
</form>
<?php include ('includes/footer.html'); ?>