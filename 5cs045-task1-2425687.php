<?php 

    $mysqli = new mysqli("localhost", "db2425687", "ManUnited123#", "db2425687");
	
	if ($mysqli -> connect_errno) {
	  die("Failed to connect to MySQL: ".$mysqli -> connect_error);
	  exit();
	}
	
	// echo ("Connection successful"); 
	
	$sql = "SELECT University_name, City, Student_count, DATE_FORMAT(Founded_date,'%d/%m/%Y') AS formatted_date FROM universities";
	
	$result = $mysqli->query($sql);
	
	if (!$result) {
		die('Data retrieval failed.');
		exit();
	}	
	// echo ("Data retrieval successful"); 
	
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<title>University Names Collection</title>

    <style>
        table {
			border collapse: collapse;
			width: 100%
		}
		
		th, td {
		    border: 1px solid black;
			padding: 8px
			text-align: left;
		}
		
		th {
			background-color: #eeeeee;
		}
		
	</style>
</head>

<body>
    <h1>University Names Collection</h1>
	
	<table>
	    </thead>
		    <tr>
			    <th>University name</th>
				<th>City</th>
				<th>Student count</th>
				<th>Founded date</th>
			</tr>
		</thead>
		
		<tbody>
		    <?php while ($a_row = mysqli_fetch_assoc($result)): ?>		
				<tr>
					<td><?= $a_row['University_name']?> </td>
					<td><?= $a_row['City'] ?> </td> 
					<td>&pound<?= $a_row['Student_count'] ?> </td>
					<<td><?= $a_row['formatted_date'] ?></td>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
	
	<?php mysqli_free_result($result); ?>
</body>
</html> 