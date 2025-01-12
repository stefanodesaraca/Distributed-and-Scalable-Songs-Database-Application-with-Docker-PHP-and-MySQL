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

$title = $_POST["title"] ?? null;
$author = $_POST["author"] ?? null;
$album = $_POST["album"] ?? null;
$duration = $_POST["duration"] ?? null;
$ID = $_POST["id"] ?? null;

if (empty($title) || empty($author) || empty($album) || empty($duration) || empty($ID)) {
    echo "All fields are required.";
    #print_r($_POST);
    exit;
}


#$usedbstmt = $conn->prepare("USE songsdb");

#if ($usedbstmt->execute()) { 
#    echo "Using songsdb successfully";
#} else { 
#    echo "Error in setting songsdb as database to use: " . $conn->error;
#}

#$usedbstmt->close();


$ctstmt = $conn->prepare("CREATE TABLE IF NOT EXISTS songs(

    ID VARCHAR(255) PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    album VARCHAR(255) NOT NULL,
    duration INT NOT NULL

)");

if ($ctstmt->execute()) { 

} else { 
    echo "Error creating songs table: " . $conn->error;
    exit;
}

$ctstmt->close();


$stmt = $conn->prepare("INSERT INTO songs (ID, title, author, album, duration) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi", $ID, $title, $author, $album, $duration);

if ($stmt->execute()) {
    header("Location: http://localhost:8083/songsDBHome.html");
    exit;
} else {
    echo "Error while adding the song: " . $stmt->error;
    exit;
}

echo "songs table has been created successfully"; #Placing this echo here because the header() function above requires to be called before any output is printed

$stmt->close();
$conn->close();
?>
