<?php
    session_start();

//Connect to DB
$db = mysqli_connect("mysql32.unoeuro.com", "mayaburkard_dk", "elsker", "mayaburkard_dk_db");



if (isset($_POST ['register_btn'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);
    
    if ($password == $password2) {
        //create user
        //$password = md5($password); //hash bruger man normalt til at gøre det sikkert for brugeren at kodeordet ikke er tilgængeligt for alle. Jeg har valgt at udkommentere det fordi at jeg ikke kunne få det til at fungere.
        $sql = "INSERT INTO members(username, password) VALUES('$username', '$password')";
        mysqli_query($db, $sql);
        $_SESSION['message'] = "Du er nu logget ind";
        $_SESSION['username'] = $username;
        header("location: index.php"); //redirect to home page ( forbinder med index fil)
    }
    else {
        //failed
        $_SESSION['message'] = "Kodeordene er ikke ens";
    }
    
}

?>





<!DOCTYPE html>
<html>
<head>
    <title>Brugerform</title>
</head>
<body>
    
<div class="header">
    <h1>Brugerform</h1>
</div>        

<form method="post" action="create.php">
    <table>
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username" class="textInput>"</td>
        </tr>
    
        
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" class="textInput>"</td>
        </tr>
        
        <tr>
            <td>Password again:</td>
            <td><input type="password" name="password2" class="textInput>"</td>
        </tr>
        
        <tr>
            <td></td>
            <td><input type="submit" name="register_btn" value="Register"></td>
        </tr>
        
    </table>
</form>
        
</body>
</html>