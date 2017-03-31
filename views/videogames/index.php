<p>List:</p>
<?php foreach($this->videogames as $videogame) { ?>
<p>
<?php echo $videogame->name;
	echo $videogame->release;
	echo $videogame->platform;
	echo $videogame->genre;
	echo $videogame->comid;
	echo $videogame->ratid; ?>
<a href='?controller=videogame&action=show&id=<?php echo $videogame->id?>'>See</a>
</p>
<?php } ?>
