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
