<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions</title>
</head>

<body>
    
<?php
    // echo "Target number is: " . $_SESSION["target-number"] . "<br />";
    echo "You have guessed: " . $_POST["guess-value"] . "<br />";

    if ($_POST["guess-value"] == $_SESSION["target-number"]) {
        echo "You are correct! Click the link to start again";
    } elseif ($_POST["guess-value"] > $_SESSION["target-number"]) {
        echo "Your guess is too large";
    } else {
        echo "Your guess is too small";
    }
?>

<!-- form for the user to input their guess -->
<form action="sessions2.php" method="post">
    <input type='text' name='guess-value' placeholder='Your guess'>
    <button type='submit'>Submit</button>
</form>

</body>

<footer>
<br />
<a href="sessions.php?clear=1">New game</a>
</footer>

</html>
