<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
        <table>
                <tr>
                        <th><a href='/index.php'>Home</a></th>
                </tr>
                <tr>
                        <th><a href='?controller=videogames&action=index'>Videogames</a></th>
                </tr>
		<tr>
			<th><a href='?controller=rating&action=index'>Ratings</a></th>
		</tr>
		<tr>
			<th><a href='?controller=companies&action=index'>Companies</a></th>
		</tr>
        </table>
        <?php require_once('routes.php'); ?>
  <body>
<html>

