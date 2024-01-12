<?php

include('databasecon.php');

?>
<?php

$query = "SELECT id, title, rating FROM series";
if (isset($_GET['beneden']) && $_GET['beneden'] === 'dec') {
	$query .= " ORDER BY RATING DESC";
}

$query1 = "SELECT id, title, length_in_minutes FROM movies";
if (isset($_GET['sort']) && $_GET['sort'] === 'desc') {
	$query1 .= " ORDER BY length_in_minutes DESC";
}
$result = $conn->query($query);
$result1 = $conn->query($query1);
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
	<div class="titel mt-5 mb-4 text-center justify-content-center">
		<h1>Welkom op het netland beheerders paneel</h1> 
	</div>

	<div class="kop mt-5 text-center justify-content-center">
		<h3>Series</h3>
	</div>
	<div class="colom text-center justify-content-center">
		<div class=" mx-auto">
			<table class="table w-50">
				<thead>
					<tr>
						<th>Title</th>
						<th>
							<a href="?beneden=dec" style="color: #9CA3AF;">&#8595;Rating</a>
						</th>
						<th>Details</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ($result->rowCount() > 0) : ?>
						<?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) :
							$id = $row["id"];
							$title = $row["title"]; 
							$rating = $row["rating"];
							?>
							<?php echo "<tr><td>$title</td><td>$rating</td><td><a href='detail_serie.php?id=$id' style='color: #9CA3AF;'>Bekijk details</a></td><td><a href='edit_serie.php?id=$id' 
							style='color: #9CA3AF;'>✐</a></td></tr>"; ?>
						<?php endwhile; ?>
					<?php else :?>
							<tr><td colspan='7'>No results found</td></tr>"
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="films text-center mt-5 mb-5">
		<h3>Films</h3>
	</div>
	<div class="colom text-center justify-content-center">
		<div class=" mx-auto">
			<table class="table w-50">
				<thead>
					<tr>
						<th>Title</th>
						<th>
							<a href="?sort=desc" style="color: #9CA3AF;">&#8595;Length</a>
						</th>
						<th>Details</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ($result1->rowCount() > 0) : ?>
						<?php while ($row = $result1->fetch(PDO::FETCH_ASSOC)) :
							$id = $row["id"];
							$title = $row["title"]; 
							$length = $row["length_in_minutes"];
							?>
							<?php echo "<tr><td>$title</td><td>$length</td><td><a href='detail_film.php?id=$id' style='color: #9CA3AF;'> Bekijk details</a></td><td><a href='edit_film.php?id=$id' s
							tyle='color: #9CA3AF;'>✐</a></td></tr>"; ?>
						<?php endwhile; ?>
					<?php else :?>
							<tr><td colspan='7'>No results found</td></tr>"
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>

