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
        <?php
        $host="localhost";
        $user="ekhoury";
        $pass="PpBmTvS9n2";
        $db = "ekhoury_project";
        $con = new mysqli($host, $user, $pass, $db);
        if($con -> connect_errno) {
            echo "Failed to connect to database: " . $con->connect_error;
        } else {
            $con->query("CREATE TABLE IF NOT EXISTS songs (songname VARCHAR(100), artistname VARCHAR(100), UNIQUE(songname, artistname))");
            $con->query("CREATE TABLE IF NOT EXISTS games (gamename VARCHAR(100), genre VARCHAR(100), console VARCHAR(100), UNIQUE(gamename))");
            $databack = $con->query("SELECT * FROM songs");
            echo"<div class=\"tables\">";
            echo "<table>";
            echo "<tr><th>Song Name</th><th>Artist Name</th></tr>";
            while($row = mysqli_fetch_array($databack)) {
                echo "<tr><td>{$row['songname']}</td>";
                echo "<td>{$row['artistname']}</td></tr>";
            }
            echo "</table>";
            echo "<br />";
            $databack = $con->query("SELECT * FROM games");
            echo "<table>";
            echo "<tr><th>Game Name</th><th>Genre</th><th>Console</th></tr>";
            while($row = mysqli_fetch_array($databack)) {
                echo "<tr><td>{$row['gamename']}</td>";
                echo "<td>{$row['genre']}</td>";
                echo "<td>{$row['console']}</td></tr>";
            }
            echo "</table>";
            echo "</div>";
        }
        ?>
    </main>
</body>
</html>