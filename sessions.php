<?php 

session_start();

// used when user clicks the link to destroy the session
if (isset($_GET["clear"])) {
    if(isset($_SESSION["target-number"])) {
        session_destroy();
        header("Location: ./sessions.php");
        die();
    }
}

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
    // creates the target number and stores in a session
    $_SESSION["target-number"] = rand(1, 100);

    // displays the target number
    echo "Target number is " . $_SESSION["target-number"] . "<br />";
?>

<!-- form for the user to input their guess -->
<form>
    <input type='text' name='guess-value' placeholder='Your guess'>
    <button type='submit'>Submit</button>
</form>

</body>

<footer>
<a href="sessions.php?clear=1">Destroy session</a>
<br />
<!-- using this page is proof that the session stays and can be called in other pages -->
<a href="sessions2.php?">Another page (keep the session)</a>
</footer>

</html>
