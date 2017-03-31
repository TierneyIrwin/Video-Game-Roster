<h2>List:</h2>
<table>
	<tr>
		<th>Author</th>
		<th>Date</th>
		<th>Website</th>
		<th>Rating</th>
	</tr>
	<tr>
		<td><?php echo $this->rating->author;?></td>
		<td><?php echo $this->rating->date;?></td>
		<td><?php echo $this->rating->website;?></td>
		<td><?php echo $this->rating->rating;?></td>
	</tr>
</table>
<input type="button" value="Return" onClick="history.go(-1);"/>

<h3>Want to Update? </h3>
<form action='?controller=rating&action=update' method='post'>
<input type="text" name="author" value="<?php echo $this->rating->author;?>"/>
<input type="text" name="date" value="<?php echo $this->rating->date;?>"/>
<input type="text" name="website" value="<?php echo $this->rating->website;?>"/>
<input type="text" name="rating" value="<?php echo $this->rating->rating;?>"/>
<input type="hidden" name="id" value="<?php echo $this->rating->id;?>"/>
<input type="submit" value="Update"/>
</form>
