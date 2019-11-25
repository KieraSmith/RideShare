<?php

?>

.<!DOCTYPE html>
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
                    <h3>Log In</h3>
                    <div class="row">
                        <br>
                        <form class="col s12" action="dashboard.php">
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
                        </form>
                        <button class="btn waves-effect waves-light findbtn" type="submit" name="login">Log In
                        </button>
                    </div>
                </div>
            </div>
            <div class="col s4"></div>
        </div>
    </div>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.js"></script>
</div>
</body></html>

