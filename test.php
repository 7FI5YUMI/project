<?php
$entrytimeErr = $exittimeErr = "";
$datePastErr = $futureErr = "";

if (isset($_POST['submit'])) {
    $entryTime = $_POST['date-start'];
    $exitTime = $_POST['date-end'];
    // $currentDate = date('m/d/y,h:i:s');
    // echo $currentDate;
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: #fff000;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <div class="entry_time">
            <label for="">Entry Time</label>
            <br>
            <input type="datetime-local" name="date-start" id="">
            <div class="error">
                <?php echo $entrytimeErr; ?>
                <?php echo $datePastErr; ?>
            </div>
        </div>
        <div class="exit_time">
            <label for="">Entry Time</label>
            <br>
            <?php $dt = new DateTime(); ?>
            <input type="datetime-local" name="date-end" id="">
            <div class="error">
                <?php echo $exittimeErr; ?>
                <?php echo $futureErr; ?>
            </div>
        </div>

        <input type="submit" name="submit" id="">
    </form>

    <?php echo $hour;?>
</body>

</html>