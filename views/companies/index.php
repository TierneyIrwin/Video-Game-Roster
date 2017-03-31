<p>List:</p>
<?php foreach($this->companies as $company) { ?>
	<p>
	<?php echo $company->name;
		echo $company->est;
		echo $company->ceo;
		echo $company->loc; ?>
	<a href='?controller=companies&action=show&id=<?php echo$company->id ?>'>See</a>
`</p>
<?php } ?>

<h2>Enter a new Company: </h2>
<form action='?controller=companies&action=create' method="post">
<input type="text" name="companyname" value="Name"/>
<input type="text" name="established" value="Established"/>
<input type="text" name="ceo" value="CEO"/>
<input type="text" name="location" value="Location"/>
<input type="submit" value="Add Company"/>
</form>
