<?php
if(isset($_POST['songname']) && isset($_POST['artistname'])) {
    $songname = $_POST['songname'];
    $artistname = $_POST['artistname'];
    $songname = addslashes($songname);
    $artistname = addslashes($artistname);
    $host="localhost";
    $user="ekhoury";
    $pass="PpBmTvS9n2";
    $db = "ekhoury_project";
    if(($songname == "") || ($artistname == "")) {
        echo "<p style=\"font-family: arial; margin-bottom: 0;\">You must fill all fields to make a suggestion.</p>";
    } else {
        $con = new mysqli($host, $user, $pass, $db);
        if($con -> connect_errno) {
            echo "Failed to connect to database: " . $con->connect_error;
        } else {
            $retval = $con->select_db($db);
            $con->query("CREATE TABLE IF NOT EXISTS songs (songname VARCHAR(100), artistname VARCHAR(100), UNIQUE(songname, artistname))");
            $con->query("CREATE TABLE IF NOT EXISTS games (gamename VARCHAR(100), genre VARCHAR(100), console VARCHAR(100), UNIQUE(gamename))");
            $con->query("INSERT INTO songs VALUES ('" . $songname . "', '" . $artistname . "')");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Liz's Page</title>
</head>
<body>
    <header>
        <h2>Liz's Page</h4>
    </header>
    <nav>
        <p><a href="index.html">Main</a> &nbsp; <a href="suggestgame.php">Suggest a game!</a> &nbsp; <a href="suggestsong.php">Suggest a song!</a></p>
    </nav>
    <main>
        <h1>Suggest a song!</h1>
        <form action="suggestsong.php" method="post">
        <p class="form">Name of song: <input type="text" name="songname" /></p>
        <p class="form">Artist: <input type="text" name="artistname" /></p>
        <div id="submit">
        <input type="submit" value="Submit Song">
        </div>
        </form>
        <p><a href="showsuggestions.php">Show all submitted suggestions.</a></p>
    </main>
</body>
</html>