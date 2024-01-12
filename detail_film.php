<?php

include('databasecon.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Series</title>
    <style>
         tbody{ 
        color: #9CA3AF;
    }
        body {
            background-color: rgb(17, 25, 40); 
            color: #A5A2B5;
        }
        .colom {
            color: white;
            padding-left: 5px;
        } 
        .table>:not(caption)>*>* {
            padding: 0.5rem 0.5rem;
            color: #9CA3AF;
			background-color: #1F2938;
        }
        table {
            color: white;
            margin-left: auto;
            margin-right: auto;
            width: 80%;
            background-color: #1F2938;
        }
        td, th {
            color: #9CA3AF;
            background-color: #1F2938;
            border: 1px solid rgb(17, 25, 40);
        }
        .films{
            color : #FFFFFF;
        }
    
        .beschrijving {
            color : #FFFFFF;
            border : yellow 2px solid;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <?php
    $stmt = $conn->prepare("SELECT * FROM movies WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch();
    ?>
        <div class="row mt-3">
            <h1 class="text-center text-white mb-4 d-flex justify-content-center"><?=$result['title']?></h1>
        </div>
    <div class="text-center mt-3">
        <a href="index.php" style="color: #9CA3AF;" class="btn">⇐ Terug</a>
        <a href="edit_serie.php?id=<?=$result['id']?>"style="color: #9CA3AF;" class="btn">Edit</a>
       
    </div>
    <div class="container">
        <div class="row">
            <div class="col-7 mx-auto mt-5">
                <table class="table">
                    <tr>
                        <td>Information</td>
                        <td>Information</td>
                    </tr>
                    
                    <tr>
                        <td><b>Datum van uitkomst</b></td>
                        <td><?=$result['released_at']?></td>
                    </tr>

                    <tr>
                        <td><b>Land van uitkomst</b></td>
                        <td><?=$result['country_of_origin']?></td>
                    </tr>
                    
                    <tr>
                        <td><b>Duur</b></td>
                        <td><?=$result['length_in_minutes']?></td>
                    </tr>

                    

                </table>
            </div>

            <div class="col-6 text-center mx-auto mt-5">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $result['youtube_trailer_id']?>
            " frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>            
            </div>


    </body>
</html>
</html>