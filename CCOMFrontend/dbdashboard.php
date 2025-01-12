<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="dbDashboardStyle.css">

</head>
<body>

<h1>Songs Database</h1>

    <div class="songstable">
        <table id="songstable">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Album</th>
        <th>Duration (in seconds)</th>

    </tr>

        <?php

        $host = "db";
        $username = "localhost";
        $password = "songs";
        $db_name = "songsdb";

        $conn = new mysqli($host, $username, $password, $db_name);
        if ($conn->connect_errno) {
            echo "Connection Error: " . $conn->connect_error . "\n";
            exit;
        }

        $sql = "SELECT ID, title, author, album, duration FROM songs";

        $result = $conn -> query($sql);


        if ($result -> num_rows > 0){

            while($row = $result -> fetch_assoc()){
                echo "<tr><td>". $row["ID"] ."</td><td>". $row["title"] ."</td><td>". $row["author"] ."</td><td>". $row["album"] ."</td><td>". $row["duration"] ."</td></tr>";
            }

            echo "</table>";

        }
        else{

        }

        $conn -> close();
        

        ?>

        </table>
        <div style="margin-top:8px"></div>
        </div>

</body>
</html>
