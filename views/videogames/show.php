<!--
	HTML forms and layout for the specific videogame chosen from the index.php file
	Tierney Irwin
-->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet" type="text/css">
<style>
	p
	{
		font-family: Acme;
		font-size: 30px;
		text-align: center;
	}
	body
	{
	        background-color: #A8F3E1;
	}
	div
	{
		text-align:center;
	}
</style>
<body>
<p><u><?php echo $this->videogame->name;?></u></p>
<table class="table table-hover">
	<thead>
		<tr>
        		<th>Release Date</th>
       			<th>Platform</th>
			<th>Genre</th>
			<th>Company</th>
			<th>Rating</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $this->videogame->release;?></td>
			<td><?php echo $this->videogame->platform;?></td>	
			<td><?php echo $this->videogame->genre;?></td>
			<td><a href='?controller=companies&action=show&id=<?php echo $this->company->id;?>'><?php echo $this->company->name;?></a></td>
			<td><a href='?controller=rating&action=show&id=<?php echo $this->rating->id;?>'><?php echo $this->rating->rating;?></a></td>
		</tr>
	</tbody>
</table>

<p><u>Want to Update? </u></p>
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
	<input type="hidden" name="id" value="<?php echo $this->videogame->id;?>"/>
	<input type="submit" value="Update"/>
</form>

<div>
	<p><u>Do you want to Delete this Video Game listing?</u></p>
	<form action='?controller=videogames&action=delete' method='post'>
		<input type="hidden" name="id" value="<?php echo $this->videogame->id;?>"/>
		<input type="submit" value="Delete"/>
	</form>
</div>
