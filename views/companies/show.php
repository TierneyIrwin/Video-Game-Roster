<!--
	HTML forms and layout for the specific details of the company chosen from the index.php.
	TierneyIrwin
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

<p><u><?php echo $this->company->name;?></u></p>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Established</th>
			<th>CEO/President</th>
			<th>Location</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $this->company->est;?></td>
			<td><?php echo $this->company->ceo;?></td>
			<td><?php echo $this->company->loc;?></td>
		</tr>
	</tbody>
</table>
<p><u>Want to Update? </u></p>
<form action='?controller=companies&action=update' method='post'>
	<input type="text" name="companyname" value="<?php echo $this->company->name;?>"/>
	<input type="text" name="established" value="<?php echo $this->company->est;?>"/>
	<input type="text" name="ceo" value="<?php echo $this->company->ceo;?>"/>
	<input type="text" name="location" value="<?php echo $this->company->loc;?>"/>
	<input type="hidden" name="id" value="<?php echo $this->company->id;?>"/>
	<input type="submit" value="Update"/>
</form>

<p><u>Do you want to Delete this Company listing? </u></p>
<form action='?controller=companies&action=delete' method='post'>
	<input type="hidden" name="id" value="<?php echo $this->company->id;?>"/>
	<input type="submit" value="Delete"/>
</form>
