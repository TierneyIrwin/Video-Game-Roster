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
