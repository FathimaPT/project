<?php
session_start();

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create the user_preferences table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS user_preferences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    climate VARCHAR(50),
    travel_mode VARCHAR(50),
    budget VARCHAR(50),
    food_type VARCHAR(50),
    travel_experience VARCHAR(50),
    days INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!mysqli_query($db, $sql)) {
    echo "Error creating table: " . mysqli_error($db);
}

// Handle form submission
if (isset($_POST['sub'])) {
    // Retrieve user inputs from the form and sanitize them
    $interest1 = mysqli_real_escape_string($db, $_POST['interest1'] ?? '');
    $interest2 = mysqli_real_escape_string($db, $_POST['interest2'] ?? '');
    $interest3 = mysqli_real_escape_string($db, $_POST['interest3'] ?? '');
    $interest4 = mysqli_real_escape_string($db, $_POST['interest4'] ?? '');
    $interest5 = mysqli_real_escape_string($db, $_POST['interest5'] ?? '');
    $day = mysqli_real_escape_string($db, $_POST['day'] ?? '');

    // Get the username from the session
    $username = $_SESSION['username'];

    // Insert user preferences into the user_preferences table
    $query = "INSERT INTO user_preferences (username, climate, travel_mode, budget, food_type, travel_experience, days)
              VALUES ('$username', '$interest1', '$interest2', '$interest3', '$interest4', '$interest5', '$day')";

    if (!mysqli_query($db, $query)) {
        echo "Error inserting data: " . mysqli_error($db);
    } else {
        echo "Data submitted successfully!";

        // Now that user preferences are inserted, query other tables based on the preferences
        // Query the hotels table based on user preferences
        $hotelsQuery = "SELECT * FROM hotels
                        WHERE climate = '$interest1'
                        AND food_type = '$interest4'
                        AND budget_range = '$interest3'";
        $hotelsResult = mysqli_query($db, $hotelsQuery);
        
        echo "<h3>Recommended Hotels:</h3>";
        while ($hotel = mysqli_fetch_assoc($hotelsResult)) {
            echo "Hotel Name: " . $hotel['name'] . "<br>";
            echo "Description: " . $hotel['description'] . "<br>";
            echo "Address: " . $hotel['address'] . "<br>";
            echo "<br>";
        }
        
        // Query the activities table based on user preferences
        $activitiesQuery = "SELECT * FROM activities
                            WHERE climate = '$interest1'
                            AND travel_mode = '$interest2'
                            AND activity_type = '$interest5'";
        $activitiesResult = mysqli_query($db, $activitiesQuery);
        
        echo "<h3>Recommended Activities:</h3>";
        while ($activity = mysqli_fetch_assoc($activitiesResult)) {
            echo "Activity Name: " . $activity['name'] . "<br>";
            echo "Description: " . $activity['description'] . "<br>";
            echo "Address: " . $activity['address'] . "<br>";
            echo "<br>";
        }
        
        // Query the maps table based on user preferences
        $mapsQuery = "SELECT * FROM maps
                      WHERE travel_mode = '$interest2'";
        $mapsResult = mysqli_query($db, $mapsQuery);
        
        echo "<h3>Recommended Maps:</h3>";
        while ($map = mysqli_fetch_assoc($mapsResult)) {
            echo "Map Name: " . $map['name'] . "<br>";
            echo "Location: " . $map['location'] . "<br>";
            echo "Directions: " . $map['directions'] . "<br>";
            echo "<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Questionnaire</title>
    <link rel="stylesheet" href="./quest.css">




</head>
<body>
    <!-- Questionnaire form -->
    <form method="post">
        <h5>Which type of climate are you most comfortable with during your vacation?</h5>
        <select name="interest1">
            <option value="Tropical">Tropical</option>
            <option value="Temperate">Temperate</option>
            <option value="Cold">Cold</option>
        </select>

        <h5>How do you plan to get around your destination?</h5>
        <select name="interest2">
            <option value="Car">Car</option>
            <option value="Bike">Bike</option>
            <option value="Public Transport">Public Transport</option>
        </select>

        <h5>What is your budget for the trip?</h5>
        <select name="interest3">
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select>

        <h5>Which type of cuisine are you most excited to indulge in?</h5>
        <select name="interest4">
            <option value="Indian">Indian</option>
            <option value="Continental">Continental</option>
            <option value="Asian">Asian</option>
        </select>

        <h5>What kind of travel experience are you seeking?</h5>
        <select name="interest5">
            <option value="Adventure">Adventure</option>
            <option value="Cultural">Cultural</option>
            <option value="Relaxation">Relaxation</option>
        </select>

        <h5>How many days are you planning?</h5>
        <input type="number" name="day" placeholder="Enter number of days" required>

        <button type="submit" name="sub">Submit</button>
    </form>
</body>
</html>
