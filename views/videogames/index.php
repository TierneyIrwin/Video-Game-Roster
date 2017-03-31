<p>List:</p>
<?php foreach($this->videogames as $videogame) { ?>
<p>
<?php echo $videogame->name;
	echo $videogame->release;
	echo $videogame->platform;
	echo $videogame->genre;
	echo $videogame->comid;
	echo $videogame->ratid; ?>
<a href='?controller=videogames&action=show&id=<?php echo $videogame->id?>'>See</a>
</p>
<?php } ?>

<h2>Enter a new Game: </h2>
<form action='?controller=videogames&action=create' method="post">
<input type="text" name="name" value="Name"/>
<input type="text" name="release_date" value="Release Date"/>
<input type="text" name="platform" value="Platform"/>
<input type="text" name="genre" value="Genre"/>
<input type="text" name="company_id" value="Company ID"/>
<input type="text" name="rating_id" value="Rating ID"/>
<input type="submit" value="Add Game"/>
</form>
