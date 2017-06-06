<!DOCTYPE html>
<html>
<head>
	<title>Vivify academy</title>
	<meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
</head>
	<body class="main-page">
	<link rel="stylesheet" type="text/css" href="css/vivify.css">
		<header>
			<a href="index.php" title="Login">Home</a>
		</header>
		<main>
			<h1>Registracija</h1>
			<form action="register_action.php">
				<div>
					<label>Ime</label>
					<input type="text" name="name"></input>
				</div>
				<div>
					<label>Prezime</label>
					<input type="text" name="surrname"></input>
				</div>
				<div>
					<label>Email</label>
					<input type="email" name="email"></input>
				</div>
				<div>
					<label>Lozinka</label>
					<input type="password" name="password"></input>
				</div>
				<button type="submit">Register</button>
			</form>
		</main>
		<footer>
			<?php 
				
				print "<h2>Sva prava zadržana " .gmdate("Y"). "</h2>";
			?>
		</footer>
	</body>
</html>