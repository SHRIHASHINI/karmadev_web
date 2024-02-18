<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
$host = "localhost";
$user = "root";
$password = "";
$database = "manage";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{


    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql="INSERT INTO `login`(`Username`, `Password`) VALUES ('$username','$password')";
    $result = mysqli_query($conn, $sql);
    if ($result === TRUE) {
        echo "Logined successfully!!!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Create new account? <a href="http://localhost/sample/signup.php">Sign up</a></p>
    </div>
</body>
</html>
