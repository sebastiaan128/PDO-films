<?php 

$servername = "localhost";
$username = "bit_academy";
$password = "bit_academy";
$dbname = "netland";

$dns = "mysql:host=$servername;dbname=$dbname";
$pdo = new PDO($dns, $username, $password);

$id = $_GET['id'] ?? null;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $e) {
}

function checkUser()
{
    return isset($_SESSION['username']);
}


function series($conn) 
{
    foreach ($conn->query('SELECT * FROM series') as $row) {
        echo "<tr><td>" . $row ['title'] . "</td><td>" . $row ['rating'] . "</td><td><a href='detail_serie.php?id=" . $row['id']  
        . "'>Details</a></td><td><a href='edit_serie.php?id=" . $row['id'];
    }
}

function movies($conn)
{
    foreach ($conn->query('SELECT * FROM movies') as $row) {
        echo "<tr><td>" . $row ['title'] . "</td><td>" . $row ['length_in_minutes'] . "</td><td><a href='detail_film.php?id=" . $row['id'] 
        . "'>Details</a></td><td><a href='edit_film.php?id=" . $row['id'];
    }
}

function updateMovie($pdo, $id)
{
    if (isset($_POST['submit'])) {
        $stmt = $pdo->prepare("UPDATE movies SET title=:title, length_in_minutes=:duur, released_at=:datum, 
        country_of_origin=:land, summary=:omschrijving, youtube_trailer_id=:youtube WHERE id = :id");
        $stmt->execute([
            ':title' => $_POST['title'],
            ':duur' => $_POST['duur'],
            ':datum' => $_POST['datum'],
            ':land' => $_POST['land'],
            ':omschrijving' => $_POST['omschrijving'],
            ':youtube' => $_POST['youtube'],
            ':id' => $id
        ]);
        header('Location: index.php');
    }
}

function updateSerie($pdo, $id) 
{ 

    if (isset($_POST['submit'])) {
            $stmt = $pdo->prepare("UPDATE series SET title=:title, rating=:rating, summary=:summary, 
            has_won_awards=:awards, seasons=:seasons, country=:country, spoken_in_language=:spoken_in_language WHERE id = :id");
            $stmt->execute([
                'title' => $_POST['title'],
                'rating' => $_POST['rating'],
                'summary' => $_POST['summary'],
                'awards' => $_POST['awards'],
                'seasons' => $_POST['seasons'],
                'country' => $_POST['country'],
                'spoken_in_language' => $_POST['spoken_in_language'],
                'id' => $id
    
            ]);
            header('Location: index.php');
    }
}

?>

