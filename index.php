<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=	, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    This is the login page <br>
    <a href="home.php">This goes to the homepage</a><br>

    <form action="index.php" method="post">
        <label for="username">Username</label><br>
        <input type="text" name="username"><br>
        <label for="password">Password</label><br>
        <input type="password" name="password"><br>
        <input type="submit" name="login" value="login">


    </form>
</body>
</html>
<?php
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];

    echo $_SESSION["username"] . "<br>";
    echo $_SESSION["password"] . "<br>";
?>