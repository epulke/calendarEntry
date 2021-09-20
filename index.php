
<!DOCTYPE html>
<html>
<body>

<h2>Create your calendar entry</h2>

<form method="post">
    <label for="event">Event name:</label><br>
    <input type="text" id="event" name="event"><br><br>

    <label for="dateFrom">Date from:</label><br>
    <input type="date" id="dateFrom" name="dateFrom"><br><br>

    <label for="timeFrom">Time from:</label><br>
    <input type="text" id="timeFrom" name="timeFrom"><br><br>

    <label for="dateTo">Date to:</label><br>
    <input type="date" id="dateTo" name="dateTo"><br><br>

    <label for="timeTo">Time to:</label><br>
    <input type="text" id="timeTo" name="timeTo"><br><br>

    <p>Choose calendar app:</p>
    <input type="radio" id="google" name="app" value="Google">
    <label for="Google">Google</label><br>
    <input type="radio" id="yahoo" name="app" value="Yahoo">
    <label for="Yahoo">Yahoo</label><br>
    <input type="radio" id="outlook" name="app" value="WebOutlook">
    <label for="Outlook">Web Outlook</label><br><br>
    <input type="submit" value="Submit" name="submit"><br><br>

</form>


</body>
</html>

<?php

require_once "vendor/autoload.php";

use Spatie\CalendarLinks\Link;



if (isset($_POST["submit"]))
{

    $event = $_POST["event"];
    $from = DateTime::createFromFormat('Y-m-d H:i', $_POST["dateFrom"] . " " . $_POST["timeFrom"]);
    $to = DateTime::createFromFormat('Y-m-d H:i', $_POST["dateTo"] . " " . $_POST["timeTo"]);
    $app = str_replace(" ","",lcfirst($_POST["app"]));

    $link = Link::create($event, $from, $to);


    echo "<a href='" . $link->{$app}() . "' target='_blank'>Link to Calendar</a>";
}
?>