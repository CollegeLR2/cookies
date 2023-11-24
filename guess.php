<?php

// used when user clicks the link to remove the cookie
if (isset($_GET["clear"])) {
    if(isset($_COOKIE["guess-target"])) {
        setcookie("guess-target", "", time() - 100);
        // setcookie("user-name", "", time() - 100);
        header("Location: ./guess.php");
        die();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<body>

<?php 
    // if the cookie with the guess target doesn't exist
    if(! isset($_COOKIE["guess-target"])) {

        echo "Welcome to the number guessing game";
        echo "<br />";
        echo "Cookie is not set";
        echo "<br />";
        echo "New user";
        echo "<br />";

        $seconds_in_one_day = 60 * 60 * 24;
        // sets the guess target to a random number
        setcookie("guess-target", rand(1, 100), time() + $seconds_in_one_day);
        // setcookie("user-name", "name", time() + $seconds_in_one_day);

        // form for the user to input their guess
        echo "<form>";
        // echo "  <input type='text' name='user-name' placeholder='Username'>";
        echo "  <input type='text' name='guess-value' placeholder='Your guess'>";
        echo "  <button type='submit'>Submit</button>";
        echo "</form>";

    } else {

        echo "Cookie is set <br />";
        // unused code: shows the target number
        // echo "Secret number: " . $_COOKIE["guess-target"];
        // echo "<br />";
        // echo "Value is: " . $_COOKIE["guess-target"];
        // echo "<br />";
        // echo "User: " . $_COOKIE["user-name"];
        echo "<br />";
        echo "You have guessed: " . $_GET["guess-value"];
        echo "<br />";
        // logic to determine how close the user is to target
        if($_GET["guess-value"] == $_COOKIE["guess-target"]) {
            echo "This is a correct guess <br />";
        } else if($_GET["guess-value"] > $_COOKIE["guess-target"]) {
            echo "Your guess is too high <br />";
        } else if($_GET["guess-value"] < $_COOKIE["guess-target"]) {
            echo "Your guess is too low <br />";
        }

        echo "<form>";
        // echo "  <input type='text' name='user-name' placeholder='Username'>";
        echo "  <input type='text' name='guess-value' placeholder='Your guess'>";
        echo "  <button type='submit'>Submit</button>";
        echo "</form>";

        // link to remove cookie
        echo "<a href='guess.php?clear=1'>New game</a>";

    }
?>
    
</body>
</html>
