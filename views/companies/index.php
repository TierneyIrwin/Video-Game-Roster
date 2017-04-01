<!--
	HTML code for the layout of the companies tab.
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
</style>

<body>
	<p><u>Company Roster</u></p>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Established</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($this->companies as $company) { ?>
			<tr>
				<th scope="row"><?php echo $company->name;?></th>
				<td><?php echo $company->est; ?></td>
				<td><a href='?controller=companies&action=show&id=<?php echo$company->id ?>'>Learn More</a></td>
			</tr>	
			<?php } ?>
		</tbody>
	</table>
	<p><u>Enter a new Company </u></p>
	<form action='?controller=companies&action=create' method="post">
		<input type="text" name="companyname" value="Name"/>
		<input type="text" name="established" value="Est.(yyyy-mm-dd)"/>
		<input type="text" name="ceo" value="CEO"/>
		<input type="text" name="location" value="Location"/>
		<input type="submit" value="Add Company"/>
	</form>
</body>
