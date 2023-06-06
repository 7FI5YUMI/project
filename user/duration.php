<?php
require("./database/databaseconn.php");
$entry_timeErr = $exit_timeErr = "";
if (isset($_POST['date-time-submit'])) {
    $entry_time = $_POST['entry_time'];
    $exit_time = $_POST['exit_time'];

    if (empty($entry_time)) {
        $entry_timeErr = "entry time is required";
    } elseif (empty($exit_time)) {
        $exit_timeErr = "exit time is required";
    } else {
        $duration_insert = "INSERT INTO duration(entry_time,exit_time)VALUES('$entry_time','$exit_time')";
        $result = mysqli_query($conn, $duration_insert);
        if ($result) {
            $successMsg = "duration added successfully";
        } else {
            echo "error";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/duration.css">
    <title>duration</title>
    <?php
    if ($successMsg != NULL) {
        ?>
        <style>
            .successMsg {
                display: block;
                color: white;
                background-color: lightseagreen;
                width: 30%;
                text-align: center;
                margin: auto;
                border-radius: 0.2rem;
                padding: 0.7rem
            }
        </style>
        <?php
    }
    ?>
</head>

<body>
    <form method="post" action="">
        <div class="start-end">
            <div class="start">
                <label for="entrydate">Entry date and time</label>
                <br>
                <input type="datetime-local" name="entry_time" class="entry-time">
                <div class="error">
                    <?php echo $entry_timeErr; ?>
                </div>
            </div>
            <div class="end">
                <label for="exitdate">Exit date and time</label>
                <br>
                <input type="datetime-local" name="exit_time" class="exit-time">
                <div class="error">
                    <?php echo $exit_timeErr; ?>
                </div>
            </div>
            <br>
            <input type="submit" name="date-time-submit" class="datetime-submit">
            <div class="successMsg">
                <?php echo $successMsg; ?>
            </div>
        </div>
    </form>
</body>

</html>