<?php

//if(empty($_REQUEST['date'])) {
//    echo "Please go through search page. (or redirect)";
//    exit();
//}

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

echo "Departure Date: " . $_REQUEST["date"] . "<br>";
echo "Latest arrival time: " . $_REQUEST["arrival"] . "<br>";
echo "Latest arrival time: " . $_REQUEST["latest"] . "<br>";
echo "1st Pickup location: " . $_REQUEST["pickup_first"] . "<br>";

echo $results->num_rows . " results. <br><br>";


?>

<?php


$sql = "SELECT * FROM departures_results WHERE 1=1 ";

if ($_REQUEST['date'] != "") {
    $sql .= "AND date = '" . $_REQUEST["date"] . "'";
}
if ($_REQUEST['latest'] != "") {
    $sql .= "AND latest <" . "DATEADD(MINUTE, 30,'" . $_REQUEST["latest"] . ")";

}
if ($_REQUEST['pickup_first'] != "ALL") {
    $sql .= " AND pickup_point = '" . $_REQUEST["pickup_first"] . "'";
}

$results = $mysql->query($sql);

if (!$results) {
    echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
    echo "SQL Error: " . $mysql->error . "<hr>";
    exit();
}

echo $sql;

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
            <div class="title_matches">
                <h4>We found <?php echo $results->num_rows ?> potential matches</h4>
            </div>
        </div>
    </div>
    <table class="striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Pickup Location</th>
        </tr>
        </thead>

        <tbody>
        <?php
            while($currentrow = $results->fetch_assoc()){
                echo "<tr><td>" . $currentrow["first_name"] . " ". $currentrow["last_name"] . "</td><td>" . $currentrow["pickup_point"] . "</td><td class='share_ride'> <a href='#.html'><button type='button' class='blue-button'>Share a ride</button></a> " . "</td></tr>";
            }
        ?>
        </tbody>
    </table>
</div>
<script>

</script>
<!--JavaScript at end of body for optimized loading-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body></html>

