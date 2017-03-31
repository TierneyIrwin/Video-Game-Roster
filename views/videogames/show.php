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
<h3>Want to Update? </h3>
<form action='?controller=videogames&action=update' method='post'>
<input type="text" name="name" value="<?php echo $this->videogame->name;?>"/>
<input type="text" name="release_date" value="<?php echo $this->videogame->release;?>"/>
<input type="text" name="platform" value="<?php echo $this->videogame->platform;?>"/>
<input type="text" name="genre" value="<?php echo $this->videogame->genre;?>"/>
<input type="text" name="company_id" value="<?php echo $this->videogame->comid;?>"/>
<input type="text" name="rating_id" value="<?php echo $this->videogame->ratid;?>"/>
<input type="hidden" name="id" value="<?php echo $this->videogame->id;?>"/>
<input type="submit" value="Update"/>
</form>
