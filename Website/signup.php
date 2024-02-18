<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>medical</title>
    <link rel="stylesheet" type="text/css" href="signstyle.css">
</head>
<body>
    <h1>
        Signup Page
    </h1>
    <?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $servername="localhost";
        $username="root";
        $password="";
        $database="manage";

        $con= mysqli_connect($servername,$username,$password,$database);
        if($con -> connect_error)
        {
            echo "Database Connection Failed!!!<br/>";
            echo "Reason: ",$con -> connect_error;
            exit();
        }
        else
        {
            $un= $_POST["username"];
            $ph= $_POST["phone"];
            $em= $_POST["email"];
            $pass= $_POST["password"];
            $cnp= $_POST["cn_password"];
            $sql= "INSERT INTO `signup`(`Username`, `Phone`, `Email`, `Password`, `Cn_password`) VALUES ('$un','$ph','$em','$pass','$cnp')";
            $result= mysqli_query($con,$sql);

            if($result)
                echo "inserted successfully";
            else
                echo "Not inserted";
        }
    }
    ?>
    <div class="container">
    <form method="POST">
        <label>Username</label>
        <input type="text" id="Username" name="username" placeholder="Enter username">
        <br/>
        <label>Phone</label>
        <input type="number" id="Phone" name="phone" placeholder="Enter phone number">
        <br/>
        <label>Email</label>
        <input type="email" id="Email" name="email" placeholder="Enter Email">
        <br/>
        <label>Password</label>
        <input type="password" id="Password" name="password" placeholder="Enter Password">
        <br/>
        <label>Confirm Password</label>
        <input type="password" id="Cn_password" name="cn_password" placeholder="Re- Enter Password">
        <br/>
        <input type="submit" value="submit">
    </form>
</body>
</html>