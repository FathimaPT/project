<?php
session_start();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create user_preferences table if not exists
$sql = "CREATE TABLE IF NOT EXISTS user_preferences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    climate VARCHAR(255),
    travel_mode VARCHAR(255),
    budget VARCHAR(255),
    food_type VARCHAR(255),
    travel_experience VARCHAR(255),
    activities VARCHAR(255),
    days INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!mysqli_query($db, $sql)) {
    echo "Error creating table: " . mysqli_error($db);
}

// Check if the form is submitted
if(isset($_POST['sub'])) {
    // Retrieve user preferences from the form
    $interest1 = isset($_POST['interest1']) ? $_POST['interest1'] : '';
    $interest2 = isset($_POST['interest2']) ? $_POST['interest2'] : '';
    $interest3 = isset($_POST['interest3']) ? $_POST['interest3'] : '';
    $interest4 = isset($_POST['interest4']) ? $_POST['interest4'] : '';
    $interest5 = isset($_POST['interest5']) ? $_POST['interest5'] : '';
    $interest6 = isset($_POST['interest6']) ? $_POST['interest6'] : '';
    $day = isset($_POST['day']) ? $_POST['day'] : '';

    // Escape user inputs to prevent SQL injection
    $interest1 = mysqli_real_escape_string($db, $interest1);
    $interest2 = mysqli_real_escape_string($db, $interest2);
    $interest3 = mysqli_real_escape_string($db, $interest3);
    $interest4 = mysqli_real_escape_string($db, $interest4);
    $interest5 = mysqli_real_escape_string($db, $interest5);
    $interest6 = mysqli_real_escape_string($db, $interest6);
    $day = mysqli_real_escape_string($db, $day);

    // Get username from session
    $username = $_SESSION['username'];

    // Insert user preferences into the database
    $query = "INSERT INTO user_preferences (username, climate, travel_mode, budget, food_type, travel_experience, activities, days) VALUES ('$username', '$interest1', '$interest2', '$interest3', '$interest4', '$interest5', '$interest6', '$day')";
    if (!mysqli_query($db, $query)) {
        echo "Error inserting data: " . mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionnaire</title>
    <link rel="stylesheet" href="./quest.css">
    <!-- Include your CSS files here -->
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body style="background-image: url('background_image.jpg'); background-size: cover;">
    <!-- Your HTML content here -->
    <div class="container-xxl py-5">
        <div class="container">
            <!-- Questionnaire form -->
            <form method="post">
                <div class="col-lg-12 col-sm-6" data-wow-delay="0.1s">
                    <h5>Which type of climate are you most comfortable with during your vacation?</h5>
                    <!-- Input field for climate -->
                    <input type="text" name="interest1" placeholder="Enter your answer">
                </div>
                <div class="col-lg-12 col-sm-6" data-wow-delay="0.1s">
                    <h5>How do you plan to get around your destination?</h5>
                    <!-- Input field for travel mode -->
                    <input type="text" name="interest2" placeholder="Enter your answer">
                </div>
                <div class="col-lg-12 col-sm-6" data-wow-delay="0.1s">
                    <h5>What is your budget for the trip?</h5>
                    <!-- Input field for budget -->
                    <input type="text" name="interest3" placeholder="Enter your answer">
                </div>
                <div class="col-lg-12 col-sm-6" data-wow-delay="0.1s">
                    <h5>Which type of cuisine are you most excited to indulge in?</h5>
                    <!-- Input field for cuisine -->
                    <input type="text" name="interest4" placeholder="Enter your answer">
                </div>
                <div class="col-lg-12 col-sm-6" data-wow-delay="0.1s">
                    <h5>What kind of travel experience are you seeking?</h5>
                    <!-- Input field for travel experience -->
                    <input type="text" name="interest5" placeholder="Enter your answer">
                </div>
                <div class="col-lg-12 col-sm-6" data-wow-delay="0.1s">
                    <h5>How many days are you planning?</h5>
                    <!-- Input field for number of days -->
                    <input type="number" name="day" placeholder="Enter number of days">
                </div>
                <br>
                <div class="col-5">
                    <button class="btn btn-primary w-100 py-3" type="submit" name="sub">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
