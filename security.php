<?php

$sql = "SELECT * FROM users WHERE 1=1 ";

if ($_REQUEST['username'] != "") {
    $sql .= " AND username ='" . $_REQUEST['username'] . "'";
}
}
if ($_REQUEST['password'] != "") {
    $sql .= " AND password ='" . $_REQUEST['password'] . "'";
}

$results = $mysql->query($sql);

if (!$results) {
    echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
    echo "SQL Error: " . $mysql->error . "<hr>";
    exit();
}

while($currentrow = $results->fetch_assoc()) {
    $username =  $currentrow["username"];
    $password = $currentrow["password"];
}


session_start();

if($_SESSION["loggedin"] == "yes") {
    // all good
    echo "(Access allowed)";
}
else if (!empty($_REQUEST["password"])) {
    if($_REQUEST["password"]== $password AND $_REQUEST["username"]== $username) {
        // VALID login
        $_SESSION["loggedin"]="yes";

    }
    else {
        // INVALID login
        echo "Incorrect username/password";
        exit();
    }
}
else 	{ // NOT logged in and has NOT submitted form/login
    // include login form
    include "login.php";
    exit();
    // STOP the page
}

?>