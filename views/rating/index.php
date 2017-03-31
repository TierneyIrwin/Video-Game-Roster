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
