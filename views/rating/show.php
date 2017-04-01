<!--
	HTML forms and layout for the specific rating chosen from the index.php view.
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
	div
	{
	        text-align:center;
	}
</style>

<p><u><?php echo $this->rating->website;?></u></p>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Rating</th>
			<th>Date</th>
			<th>Author</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $this->rating->rating;?></td>
			<td><?php echo $this->rating->date;?></td>
			<td><?php echo $this->rating->author;?></td>
		</tr>
	</tbody>
</table>
<p><u>Want to Update? </u></p>
<form action='?controller=rating&action=update' method='post'>
	<input type="text" name="author" value="<?php echo $this->rating->author;?>"/>
	<input type="text" name="date" value="<?php echo $this->rating->date;?>"/>
	<input type="text" name="website" value="<?php echo $this->rating->website;?>"/>
	<input type="text" name="rating" value="<?php echo $this->rating->rating;?>"/>
	<input type="hidden" name="id" value="<?php echo $this->rating->id;?>"/>
	<input type="submit" value="Update"/>
</form>

<p><u>Do you want to Delete this Rating? </u></p>
<form action='?controller=rating&action=delete' method='post'>
	<input type="hidden" name="id" value="<?php echo $this->rating->id;?>"/>
	<input type="submit" value="Delete"/>
</form>
