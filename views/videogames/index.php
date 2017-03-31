<p>List:</p>
<?php foreach($this->videogames as $videogame) { ?>
<p>
<?php echo $videogame[0];
	echo $videogame[1];
	echo $videogame[2];
	echo $videogame[3];
	echo $videogame[4];
	echo $videogame[5];
	echo $videogame[6];
	echo $videogame[7];?>
<!--
	<a href='?controller=companies&action=show&id=<?php echo $videogame->comid?>'>Developer</a>
	<a href='?controller=rating&action=show&id=<?php echo $videogame->ratid?>'>Rating</a>
	echo $videogame->comid;
	echo $videogame->ratid; ?>
-->
<a href='?controller=videogames&action=show&id=<?php echo $videogame->id?>'>See</a>
</p>
<?php } ?>

<h2>Enter a new Game: </h2>
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
<!--<input type="text" name="company_id" value="Company ID"/>
<input type="text" name="rating_id" value="Rating ID"/>
-->
<input type="submit" value="Add Game"/>
</form>
