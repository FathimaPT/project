
<?php
session_start();

// initializing variables
$username = "";
$email = "";
$phone_number = ""; // Added variable for phone number
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']); // Get phone number
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($phone_number)) { array_push($errors, "Phone number is required"); } // Add phone number validation
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }
  // Username validation
  if (preg_match('/[^a-zA-Z0-9_-]/', $username)) {
    array_push($errors, "Username can only contain letters, numbers, underscores, and hyphens");
  }

      // Password validation (enhanced for stronger passwords)
      if (strlen($password_1) < 8) {
        array_push($errors, "Password must be at least 8 characters long");
      }
      
  // Phone number validation (optional, add more as needed)
  if (!preg_match('/^[0-9]{10}$/', $phone_number)) { // This checks for 10-digit phone numbers
    array_push($errors, "Invalid phone number format");
  }

  // First check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO users (username, email, phone_number, password) 
              VALUES('$username', '$email', '$phone_number', '$password')"; // Add phone number to query
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: login.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: tour.php');
    } else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

?>
