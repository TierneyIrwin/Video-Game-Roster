<h2>List</h2>
<table>
	<tr>
		<th>Name</th>
		<th>Release Date</th>
		<th>Platform</th>
		<th>Genre</th>
		<th>Company Id</th>
		<th>Rating Id</th>
	</tr>
	<tr>
		<td><?php echo $this->videogame->name; ?></td>
		<td><?php echo $this->videogame->release; ?></td>
		<td><?php echo $this->videogame->platform; ?></td>
		<td><?php echo $this->videogame->genre; ?></td>
		<td><?php echo $this->videogame->comid; ?></td>
		<td><?php echo $this->videogame->ratid; ?></td>
	</tr>
</table>
