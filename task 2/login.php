<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
include 'dbconnect.php';

$email = "";
$password = "";
$error = "";  // To store error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = trim($_POST["email"]); // Trim leading/trailing whitespace from email
  $password = $_POST["password"];

  // Validate form data (optional)
  // You can add checks for empty email or invalid format here

  if (empty($email) || empty($password)) {
    $error = "Please fill in all required fields.";
  } else {
    // Secure password comparison
    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";

    $stmt = mysqli_prepare($db, $sql);  // Prepare SQL statement with placeholders

    if ($stmt) {
      mysqli_stmt_bind_param($stmt, "ss", $email, $password); // Bind parameters

      if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
          $showAlert = true; // Login successful
        } else {
          $error = "Invalid email or password.";
        }
      } else {
        $error = "Error executing query: " . mysqli_stmt_error($stmt);
      }

      mysqli_stmt_close($stmt);  // Close prepared statement
    } else {
      $error = "Error preparing statement: " . mysqli_error($db);
    }
  }
}

// Display error message (if any)
if (!empty($error)) {
  echo "<p class='error'>$error</p>";
}

// (rest of your code using $email, etc. or handling successful login)

?>

    <div class="outer">

        <div class="container">
            <div class="left">
                <img src="eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg" alt="">
            </div>
            <div class="right">
                <h1>Login</h1>
                <form action="login.php" method="post">
                    <table>
                        <tr>
                            <td><label for="email">Email :</label></td>
                            <td><input type="text" placeholder="Email"></td>
                          </tr>
                        <tr>
                          <td><label for="password">Password :</label></td>
                          <td><input type="text" placeholder="Password"></td>
                        </tr>
                      </table>
                      <button type="button" class="loginbtn">Login</button>
                </form>
                <p>Don't have account <a href="./register.html">click here</a></p>
    
            </div>
        </div>
    </div>

    <script>
    </script>
</body>
</html>