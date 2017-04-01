<!--
	HTML Layout for the webpage.
	Tierney Irwin
	Due: 31/03/2017
-->
<!DOCTYPE html>
<link href="https://fonts.googleapis.com/css?family=Revalia" rel="stylesheet" type="text/css">
<style>
	div.container 
	{
		width: 100%;
		border: 1px solid gray;
	}

	header, footer 
	{
		padding: 1em;
		color: white;
	        background-color: black;
		clear: left;
       		text-align: center;
       		font-family: Revalia;
	}

	nav 
	{
		float: left;
	        max-width: 160px;
		margin: 0;
		padding: 1em;
	}

	nav ul 
	{
		list-style-type: none;
		padding: 0;
	}

	nav ul a 
	{
		font-family: Revalia;
	}

	article 
	{
		margin-left: 170px;
		border-left: 1px solid gray;
		padding: 1em;
		overflow: hidden;
	}
	body
	{
		background-color: #A8F3E1;
	}
</style>
<html>
	<head>
	</head>
	<body>
		<div class="container">
			<header>	
				<h1> VideoGames </h1>
			</header>
			<nav>
				<ul>
					<li><a href='/index.php'>Home</a></li>
					<li><a href='?controller=videogames&action=index'>Videogames</a></li>
					<li><a href='?controller=rating&action=index'>Ratings</a></li>
					<li><a href='?controller=companies&action=index'>Companies</a></li>
				</ul>
			</nav>
			<article>
				<?php require_once('routes.php'); ?>
			</article>
			<footer>
				<input type="button" value="Return" onClick="history.go(-1);"/>
			</footer>
		</div>
	</body>
</html>
