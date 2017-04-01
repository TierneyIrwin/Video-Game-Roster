<!--
	HTML forms and layout for the main videogame table. This showcases a join btween all three tables and displays relevant data.
	TierneyIrwin
-->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet" type="text/css">
<style>
	p
	{
		font-family: Acme;
		font-size: 30px;
		text-align: center;
	}
	body
	{
	        background-color: #A8F3E1;
	}
</style>
<body>
<p><u>Video Game Roster</u></p>
<table class="table table-hover">
	<thead>
		<tr>
		        <th>Name</th>
		        <th>Release Date</th>
			<th>Developer</th>
			<th>Rating</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->videogames as $videogame) { ?>
		<tr>
	<!-- 0-name 1-date 2-platform 3-genre 4-company 5-location 6-website 7-rating -->
			<th scope="row"><?php echo $videogame[0];?></th>
			<td><?php echo $videogame[1];?></td>
			<td><?php echo $videogame[4];?></td>
			<td><?php echo $videogame[7];?></td>
			<td><a href='?controller=videogames&action=show&id=<?php echo $videogame[8]?>'>Learn More</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<p><u>Enter a new Game: </u></p>
<form action='?controller=videogames&action=create' method="post">
	<input type="text" name="vg_name" value="Name"/>
	<input type="text" name="release_date" value="Release Date"/>
	<input type="text" name="platform" value="Platform"/>
	<input type="text" name="genre" value="Genre"/>
	<select name="company" value=''></option>
		<?php foreach($this->companylist as $company) { ?>
		<option value='<?php echo $company->name;?>'><?php echo $company->name;?></option>
		<?php } ?>
	</select>
	<select name="rating" value=''></option>	
		<?php foreach($this->ratinglist as $rating) { ?>
		<option value='<?php echo "$rating->website-$rating->rating";?>'><?php echo "$rating->website - $rating->rating";?></option>
		<?php } ?>
	</select>
	<input type="submit" value="Add Game"/>
</form>
