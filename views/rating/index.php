<p>List:</p>
<?php foreach($this->ratings as $rating) { ?>
<p>
<?php echo $rating->author; 
	echo $rating->date;
	echo $rating->website;
	echo $rating->rating; ?>
<a href='?controller=rating&action=show&id=<?php echo $rating->id?>'>See</a>
</p>
<?php } ?>

<h2>Enter a new Rating: </h2>
<form action='?controller=rating&action=create' method="post">
<input type="text" name="author" value="Author"/>
<input type="text" name="date" value="yyyy-mm-dd"/>
<input type="text" name="website" value="Website"/>
<input type="text" name="rating" value="Score?"/>
<input type="submit" value="Add Rating"/>
</form>
