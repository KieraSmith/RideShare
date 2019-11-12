<?php

$mysql = new mysqli(
    "webdev.iyaclasses.com",
    "anantvas",
    "Acad276_Vasudevan_7260004820",
    "anantvas_rideshare"
);
?>

<?php

if ($mysql->connect_errno) {
echo "db connection error : " . $mysql->connect_error;
exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>RideShare</title>
    <link rel="icon" href="images/Frame.png">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
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
        <div class="col s12">
            <a href="home.html"><img src="images/Frame.png" class="space_logo"></a>
            <a href="home.html"><img class="right_writing" src="images/Hero-Content.png"></a>
            <i class="small material-icons makein boat">person</i>
            <h6 class="makein boat">About</h6>
            <h6 class="makein boat" id="">New Trip</h6>
        </div>
        <div class="col s12 title">
            <div class="title_trip">
                <h4>Tell us about your trip</h4>
            </div>
        </div>
        <div class="col s4">
            <h5>Your flight date</h5>
            <input placeholder="Select your date" type="text" class="datepicker" name="date">
        </div>
        <div class="col s4">
        </div>
        <div class="col s4" id="arrival">
            <h5 id="arrival_time">Airport arrival time frame</h5>
            <div class="spacetop">
                <h6>Arrival time</h6>
                <input type="text" placeholder="Select Arrival Time" class="timepicker" name="arrival">
            </div>
            <div class="spacetop">
                <h6>Latest</h6>
                <input type="text" placeholder="Select Latest Pickup Time" class="timepicker" name="latest">
            </div>
            <div class="spacetop">
                <i class="tiny material-icons">info_outline</i>
                <h7 class="makein">Arrival time is the time in which your flight's departure. Latest means you must be picked up no later than the time period.</h7>
            </div>
        </div>
        <form action = "matches.php">
        <div class="col s12">
            <h5 class="space_subtitle">Pickup location</h5>
            <div class="col s4" id="space_drop">
                <div class="input-field col s12">
                    <select name="pickup_first">
                        <?php
                        $sql = "SELECT DISTINCT pickup_point FROM pickup_points";

                        $results = $mysql->query($sql);

                        if(!$results) {
                            echo "SQL error: ". $mysql->error;
                            exit();
                        }
                        echo "<option value='ALL'>First Choice</option>";
                        while($currentrow = $results->fetch_assoc()) {
                            echo "<option>" . $currentrow["pickup_point"]. "</option>";
                        }
                        ?>
                    </select>
                    <label>First Choice</label>
                </div>
                <div>
                    <i class="tiny material-icons space_subtitle">map</i>
                    <h7 class="makein">Click to view map</h7>
                </div>
            </div>
            <div class="col s4" id="space_drop">
                <div class="input-field col s12">
                    <select>
                        <?php
                        $sql = "SELECT DISTINCT pickup_point FROM pickup_points";

                        $results = $mysql->query($sql);

                        if(!$results) {
                            echo "SQL error: ". $mysql->error;
                            exit();
                        }
                        echo "<option value='ALL'>Second Choice</option>";
                        while($currentrow = $results->fetch_assoc()) {
                            echo "<option>" . $currentrow["pickup_point"]. "</option>";
                        }
                        ?>
                    </select>
                    <label>Second Choice</label>
                </div>
            </div>
            <div class="col s4" id="space_drop">
                <div class="input-field col s12">
                    <select>
                        <?php
                        $sql = "SELECT DISTINCT pickup_point FROM pickup_points";

                        $results = $mysql->query($sql);

                        if(!$results) {
                            echo "SQL error: ". $mysql->error;
                            exit();
                        }
                        echo "<option value='ALL'>Third Choice</option>";
                        while($currentrow = $results->fetch_assoc()) {
                            echo "<option>" . $currentrow["pickup_point"]. "</option>";
                        }
                        ?>
                    </select>
                    <label>Third Choice</label>
                </div>
            </div>
        </div>
        <div class="col s12">
            <h5 class="space_subtitle">Bags</h5>
        </div>
        <div class="col s4" id="space_drop">
            <i class="medium material-icons">card_travel</i>
            <h6>Large</h6>

                <p class="range-field">
                    <input type="range" id="test5" min="0" max="5" name="bag_large" />
                </p>

        </div>
        <div class="col s4" id="space_drop">
            <i id="SPACEtwo" class="small material-icons">card_travel</i>
            <h6>Small</h6>
                <p class="range-field">
                    <input type="range" id="test5" min="0" max="5" name="bag_small" />
                </p>
        </div>
        <div class="col s12" id="SPACE">
            <a href="matches.php"><input type="submit" value="Find a rideshare" class="blue-button"></input></a>

        </div>
    </div>
</div>
</form>
<script>
    // use {} for default options
    document.addEventListener('DOMContentLoaded', function() {
        const Calender = document.querySelectorAll('.datepicker');
        M.Datepicker.init(Calender, {});
    });

    document.addEventListener('DOMContentLoaded', function() {
        var Clock = document.querySelectorAll('.timepicker');
        M.Timepicker.init(Clock, {});
    });

    document.addEventListener('DOMContentLoaded', function() {
        var Drop = document.querySelectorAll('select');
        M.FormSelect.init(Drop, {});
    });
</script>
<!--JavaScript at end of body for optimized loading-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body></html>


