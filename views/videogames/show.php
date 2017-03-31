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
<input type="text" name="vg_name" value="<?php echo $this->videogame->name;?>"/>
<input type="text" name="release_date" value="<?php echo $this->videogame->release;?>"/>
<input type="text" name="platform" value="<?php echo $this->videogame->platform;?>"/>
<input type="text" name="genre" value="<?php echo $this->videogame->genre;?>"/>
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

<!--
<input type="text" name="company_id" value="<?php echo $this->videogame->comid;?>"/>
<input type="text" name="rating_id" value="<?php echo $this->videogame->ratid;?>"/>
-->
<input type="hidden" name="id" value="<?php echo $this->videogame->id;?>"/>
<input type="submit" value="Update"/>
</form>

<h3> Or Do you want to Delete this Video Game listing? </h3>
<form action='?controller=videogames&action=delete' method='post'>
<input type="hidden" name="id" value="<?php echo $this->videogame->id;?>"/>
<input type="submit" value="Delete"/>
</form>
