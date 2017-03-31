<h2>Company List</h2>
<table>
	<tr>
		<th>Name</th>
		<th>Established</th>
		<th>CEO/President</th>
		<th>Location</th>
	</tr>
	<tr>
		<td><?php echo $this->company->name;?></td>
		<td><?php echo $this->company->est;?></td>
		<td><?php echo $this->company->ceo;?></td>
		<td><?php echo $this->company->loc;?></td>
	</tr>
</table>
<h3>Want to Update? </h3>
<form action='?controller=companies&action=update' method='post'>
<input type="text" name="companyname" value="<?php echo $this->company->name;?>"/>
<input type="text" name="established" value="<?php echo $this->company->est;?>"/>
<input type="text" name="ceo" value="<?php echo $this->company->ceo;?>"/>
<input type="text" name="location" value="<?php echo $this->company->loc;?>"/>
<input type="hidden" name="id" value="<?php echo $this->company->id;?>"/>
<input type="submit" value="Update"/>
</form>
