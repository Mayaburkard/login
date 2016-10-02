<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

if ($_POST['submit']) {
    include_once("connection.php");
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    
    $sql = "SELECT id, username, password FROM members WHERE username = '$username' AND activated ='1' LIMIT 1";
    
    $query = mysqli_query($dbCon, $sql);
    
    if ($query) {
        $row = mysqli_fetch_row($query);
        $userID = $row[0];
        $dbUsername = $row[1];
        $dbPassword = $row[2];
        
    }
    
    if ($username == $dbUsername && $password == $dbPassword) {
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $userID;
        header('Location: user.php');
    }
    
    else {
        echo "Forkert brugernavn eller kodeord";
    }
}
?>

<!DOCTYPE hrml>
<html>
<head>
    <title>PHP/MYSQL Login</title>
</head>    
<body>

<h1>Login</h1>
    
        <form method="post" action="index.php">
            <input type="text" placeholder="Username" name="username" /> <br/>
            <input type="password" placeholder="Password" name="password" /> <br/>
            <input type="submit" name="submit" value="log in" />
            
            
        </form>
   

</body>
</html>