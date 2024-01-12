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
        $stmt = $conn->prepare("SELECT * FROM series WHERE id = :id ");
        $stmt->bindParam(':id', $id);
        $stmt->execute();   
        $result = $stmt->fetch();
        ?>

<div class="container">
    <div class="row">
        <h1 class="text-center text-white mb-4 d-flex justify-content-center"><?=$result['title']?></h1>
    </div>
    <div class="text-center mt-3">
        <a href="index.php" style="color: #9CA3AF;" class="btn">⇐ Terug</a>
        <a href="edit_serie.php?id=<?=$result['id']?>"style="color: #9CA3AF;" class="btn">Edit</a>
       
    </div>
            <div class="row">
                <div class="col-6 mt-5 mx-auto text-center">
                    <table class="table">
                        <tr>
                            <td>Information</td>
                            <td>Information</td>
                        </tr>
                        
                        <tr>
                            <td><b>Awards</b></td>
                            <td><?=$result['has_won_awards']?></td>
                        </tr>

                        <tr>
                            <td><b>Rating</b></td>
                            <td><?=$result['rating']?></td>
                        </tr>

                        <tr>
                            <td><b>Seasons</b></td>
                            <td><?=$result['seasons']?></td>
                        </tr>

                        <tr>
                            <td><b>Country</b></td>
                            <td><?=$result['country']?></td>
                        </tr>
                        
                        <tr>
                            <td><b>Language</b></td>
                            <td><?=$result['spoken_in_language']?></td>
                        </tr>   
                    
                    </table>
                </div>
            </div>

            <div style="color: white; font-size: 30px;"class="beschrijvin text-center mt-5 mb-5">
                <b>Beschrijving</b>
            </div>
            <div class="beschrijving text-center">
            <div class="text-center">
                <?=$result['summary']?>
            </div>
        </body>
</html>