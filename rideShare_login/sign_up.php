<?php

$mysql = new mysqli(
    "webdev.iyaclasses.com",
    "anantvas",
    "Acad276_Vasudevan_7260004820",
    "anantvas_rideshare"
);

if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}

session_start();

//Then this php code is executed based on the form action calling on itself
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //isset determines if a variable has been declared and is different from a NULL
    //You are calling on
    if(isset($_POST['login'])){
        require 'login.php';
    }
    else if (isset($_POST['sign_up.php'])){
        require 'sign_up.php';
    }
}

$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['first_name'];
$_SESSION['last_name'] = $_POST['last_name'];
$_SESSION['username'] = $_POST['username'];


//Protects against hackers going into the backend to see the passwords and info
$first_name = $mysql->escape_string($_POST['first_name']);
$last_name = $mysql->escape_string($_POST['last_name']);
$username = $mysql->escape_string($_POST['username']);
$email = $mysql->escape_string($_POST['email']);
$password = $mysql->escape_string($_POST['telephone']);
//password_hash protects the password itself which takes in the parameter taking in the password and creates a random string
$password = $mysql->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
//md5 is to create a unique hash
$hash = $mysql->escape_string(md5(rand(0,1000)));

//Check if a user with that email already exist
$result = $mysql->query("SELECT * FROM users WHERE email='$email'") or die($mysql->error());

if ($result->num_rows > 0) {
    $message = 'User with this email already exists';
    echo  "<script type='text/javascript'>alert('$message');</script>";
}
else {
  $sql = "INSERT INTO users (first_name, last_name, email, username, telephone, password, hash)"
      . "VALUES ('$first_name', '$last_name', '$email', '$username', '$telephone', '$password', '$hash')";

  if ($mysql->query($sql)){
      $_SESSION['active'] = 0;
      $_SESSION['logged_in'] = true;
      $_SESSION['message'] = "Comfirmation link has been sent to $email, please click the link to verify";

  }


}

?>

<!DOCTYPE html>
<html>

<head>
    <title>RideShare</title>
    <link rel="icon" href="images/Frame.png">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/style.css" media="screen,projection" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <div class="container">
        <div class="row">

            <div class="col s12" id="header-home">
                <a href="homepage.html"><img src="images/Frame.png" class="logo_sign"></a>
                <a href="homepage.html"><img src="images/Hero-Content.png" class="logo_write_sign"></a>
            </div>
            <div class="row">
                <div class="col s4"></div>
                <div class="col s4">
                    <div class="signup">
                        <h3>Sign In</h3>
                        <div class="row">
                            <br>
                            <!--When this form is submitted, it calls itself  -->
                            <form class="col s12" action="sign_up.php" method="post" autocomplete="off">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input placeholder="Tommy Trojan" id="first_name" type="text" class="validate">
                                        <label for="first_name">First Name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input placeholder="Tommy Trojan" id="first_name" type="text" class="validate">
                                        <label for="first_name">Last Name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input placeholder="Traveler" id="first_name" type="text" class="validate">
                                        <label for="first_name">Username</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" class="validate">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="email" type="email" class="validate">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">phone</i>
                                    <input id="icon_telephone" type="tel" class="validate">
                                    <label for="icon_telephone">Telephone</label>
                                </div>
                                <button class="btn waves-effect waves-light findbtn" type="submit" name="sign_up">Verify
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col s4"></div>
            </div>
        </div>

        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.js"></script>
    </div>
</body>

</html>

