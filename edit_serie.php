<?php
include('databasecon.php');
updateSerie($pdo, $id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Netland!</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
	crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
	crossorigin="anonymous"></script>
	<style> 
		body {
			background-color: rgb(17, 25, 40); 
			color: #A5A2B5;
		} 
		h1, h3 {
			color: white;
		} 
		.colom {
			color: rgb(150, 152, 164);
			padding-left: 5px;
		} 
		.table>:not(caption)>*>* {
			color: #9CA3AF;
			background-color: #1F2938;
		}
		table {
			color: white;
			margin-left: auto;
			margin-right: auto;
			width: 20%;
			background-color: #1F2938;
		}
		td, tr {
			color: white;
			background-color: #1F2938;
			border: 1px solid rgb(17, 25, 40);
		}

	</style>
</head>
<body>
<?php
    $stmt = $pdo->prepare("SELECT * FROM series WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $result = $stmt->fetch();
?>
<h1 class="text-center mt-3"><?=$result['title']?></h1>
<div class="colom mt-5 text-center justify-content-center">
	<a href="index.php" style=' background-color: #1F2938; color: #9CA3AF;'> ⇐ Terug</a>

	<div class="container">
		<form method="post" class="">
			<div class="">
				<label class="mt-5" style="color: white;">Titel</label>
				<input type="text" name="title" style="background-color: #1F2938; color: white; margin-left: 143px; box-shadow: none;" value="<?=$result['title']?>">
			</div>
			<div class="">
				<label class="mt-2"style="color: white;">Rating</label>
				<input type="text" name="rating" style="background-color: #1F2938; color: white;margin-left: 128px"" value="<?=$result['rating']?>">
			</div>
			<div class="">
				<label class="mt-2"style="color: white;">Summary</label>
				<textarea type="text" name="summary" rows="4" cols="19" style="margin-top: 5px;background-color: #1F2938; color: white;margin-left: 106px"><?=$result['summary']?>"</textarea>
			</div>
			<div class="">
				<label class="mt-2"style="color: white;"a>Awards</label>
				<input type="text" name="awards"  style="background-color: #1F2938; color: white;margin-left: 120px"value="<?=$result['has_won_awards']?>">
			</div>
			<div class="">
				<label class="mt-2"style="color: white;">seasons</label>
				<input class="mt-2" type="text" name="seasons" style="background-color: #1F2938; color: white;margin-left: 120px"value="<?=$result['seasons']?>">
			</div>
			<div class="">
				<label class="mt-2" style="color: white;">country</label>
				<input type="text" name="country" style="background-color: #1F2938; color: white;margin-left: 115px"value="<?=$result['country']?>">
			</div>
			<div class="">
				<label class="mt-2" style="color: white;">Language</label>
				<input type="text" name="spoken_in_language" style="background-color: #1F2938; color: white;margin-left: 100px"value="<?=$result['spoken_in_language']?>">
			</div>
			<input type="submit" class="mt-2" name="submit" style=" margin-top: 10px;border-radius: 20px;color: white; background-color: #1F2938;" value="Opslaan">
		</form>
	</div>
</div>
</body>
</html>
