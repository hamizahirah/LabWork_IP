<?php
$page_title = 'Tax Form'; 
require ('includes/header.html');

function cal_tax ($q, $p, $t){ //func definition
    $total = $q * $p;
    $total = $total + ($total * ($t/100)); // Calculate and add the tax.
    $total = number_format($total, 2);
    return $total; // Return the calculated total
}

if(isset($_POST['submit'])){
    $error = false; // Flag to check if there are any errors

    // Validate quantity
    if (!empty($_POST['quantity'])) {
        $quantity = $_POST['quantity'];
    } else {
        $quantity = NULL;
        echo '<p><b>You forgot to enter your quantity!</b></p>';
        $error = true;
    }

    // Validate price
    if (!empty($_POST['price'])) {
        $price = $_POST['price'];
    } else {
        $price = NULL;
        echo '<p><b>You forgot to enter your price!</b></p>';
        $error = true;
    }

    // Validate tax
    if (!empty($_POST['tax'])) {
        $tax = $_POST['tax'];
    } else {
        $tax = NULL;
        echo '<p><b>You forgot to enter your tax!</b></p>';
        $error = true;
    }

    // If everything is okay, print the message.
    if (!$error) {
        $total = cal_tax($quantity, $price, $tax);
        // Print the results.
        echo '<h1>Tax Amount</h1><p>You are purchasing <b>'. $quantity. '</b> widget(s) at a cost of <b>RM'. $price. '</b> each. With tax, the total comes to <b>RM'. $total. '</b>.</p>';
    } else { // One form element was not filled out properly.
        echo '<p><font color="red">Please go back and fill out the form again.</font></p>';
    }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <h1>Calculate tax</h1>
    <p><b>Quantity:</b> <input type="text" name="quantity" size="20" maxlength="40" value="<?php if (isset($_POST['quantity'])) echo $_POST['quantity'];?>"/></p>
    <p><b>Price(RM):</b> <input type="text" name="price" size="20" maxlength="40" value="<?php if (isset($_POST['price'])) echo $_POST['price'];?>"/></p>
    <p><b>Tax rate(%):</b> <input type="text" name="tax" size="20" maxlength="40" value="<?php if (isset($_POST['tax'])) echo $_POST['tax'];?>"/></p>
    <div align="left"><br><input type="submit" name="submit" value="Calculate" /></div>
</form>

<?php
include ('includes/footer.html');
?>