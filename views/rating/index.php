<!--
	HTML forms and layouts for the Rating tab. This showcases th entire table of rating
	Tierney Irwin
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
	<p><u>Rating Roster</u></p>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Rating</th>
				<th>Website</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($this->ratings as $rating) { ?>
			<tr>
				<th scope="row"><?php echo $rating->rating;?></th>
				<td><?php echo $rating->website;?></td>
				<td><a href='?controller=rating&action=show&id=<?php echo $rating->id?>'>Learn More</a></td>
			</tr>
			<?php } ?>
		</tbody>
</table>
<p><u>Enter a new Rating: </u></p>
<form action='?controller=rating&action=create' method="post">
	<input type="text" name="author" value="Author"/>
	<input type="text" name="date" value="yyyy-mm-dd"/>
	<input type="text" name="website" value="Website"/>
	<input type="text" name="rating" value="Score?"/>
	<input type="submit" value="Add Rating"/>
</form>
