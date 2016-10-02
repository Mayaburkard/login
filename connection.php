<?php
$dbCon = mysqli_connect("mysql32.unoeuro.com", "mayaburkard_dk", "elsker", "mayaburkard_dk_db");

if(mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_error();
    
}
?>