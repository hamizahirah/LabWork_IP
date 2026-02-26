<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticket Price</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            font-family: 'Poppins', ital;
            background-image: url("https://static.vecteezy.com/system/resources/previews/038/147/459/non_2x/people-on-auto-station-man-woman-standing-near-transport-waiting-for-passenger-boarding-citizen-urban-infrastructure-concept-illustration-vector.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 80vh;
            width: 100%;
            margin: 0;
            padding: 0;
        }
        main {
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 0;
        }
        .ticket-checker {
            text-align: center;
            margin: 20px auto;
            padding: 60px;
            width: 500px;
            backdrop-filter: blur(25px);
            background-color: rgba(0, 0, 0, 0.2);
            border: 3px solid #F8C471;
            border-radius: 15px;
            color: #FDFEFE;
        }
        input[type="submit"] {
            text-align: center;
            display: block;
            margin: 10px auto;
            padding: 5px 10px;
            background-color: #F8C471;
            color: #1C2833;
            border: none;
            border-radius: 15px;
            cursor: pointer;
        }
        .output {
            margin-top: 20px;
        }
        h1 {
            text-align: center;
            color: #154360
        }
        legend {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #F8C471;
            width: 350px;
            height: 70px;
            border-radius: 0 0 20px 20px;
            font-size: 30px;
            color: #2874A6;
        }
        .list_box select {
        display: inline-block;
        width: 120px; 
        margin-right: 10px; 
		}
        footer p {
            text-align: center;
            color: #FDFEFE;
        }
        .back {
            text-align: center;
            display: block;
            margin: 10px auto;
            padding: 5px 10px;
            background-color: #F8C471;
            color: #1C2833;
            border: none;
            border-radius: 15px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<header>
    <h1>Bus Ticket Price</h1>
</header>

<main>
    <div class="ticket-checker">
        <legend><b>Bus Ticket Checker</b></legend>

        <!-- Message prompting the user to choose the day and time -->
        <p class="message">Please choose the departure day and time:</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class=list_box>
                <label for="day">Departure day:</label>

                <select id="day" name="day">
                    <option value="">-- Select day --</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                </select><br>

                <label for="time">Departure time:</label>
                <select id="time" name="time">
                    <option value="">-- Select time --</option>
                    <option value="7">07:00</option>
                    <option value="10">10:00</option>
                    <option value="13">13:00</option>
                    <option value="16">16:00</option>
                    <option value="19">19:00</option>
                </select><br>
            </div>

            <input type="submit" value="Calculate Ticket Price">
        </form>

        <?php
        $ticketingTable = [
            "Saturday" => [7 => 8, 10 => 8, 13 => 8, 16 => 8, 21 => 6],
            "Sunday" => [7 => 8, 10 => 8, 13 => 8, 16 => 8, 21 => 6],
            "Monday" => [7 => 6, 10 => 6, 13 => 6, 16 => 6, 21 => 5],
            "Tuesday" => [7 => 6, 10 => 6, 13 => 6, 16 => 6, 21 => 5],
            "Wednesday" => [7 => 6, 10 => 6, 13 => 6, 16 => 6, 21 => 5],
            "Thursday" => [7 => 6, 10 => 6, 13 => 6, 16 => 6, 21 => 5],
            "Friday" => [7 => 6, 10 => 6, 13 => 6, 16 => 6, 21 => 5]
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $day = $_POST["day"];
            $time = $_POST["time"];

            if (empty($day) || empty($time)) {
                echo "<p style='color: red;'>Invalid day or time selected.</p>";
            } else {
				
                $time = intval($time); 
				
                if (array_key_exists($day, $ticketingTable) && array_key_exists($time, $ticketingTable[$day])) {
                    echo "<p>Departure day: $day</p>";
                    echo "<p>Departure time: $time:00</p>";
                    $ticketPrice = $ticketingTable[$day][$time];

                    echo "<p>Ticket price: RM $ticketPrice</p>";
                }
            }
        }
        ?>
    </div>
</main>

<footer>
    <p>&copy; 2024 Bus Ticket Price</p>
</footer>
</body>
</html>
