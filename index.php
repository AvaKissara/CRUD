<?php
require_once("db.php");

$pdo_statement = $conn->prepare("SELECT * FROM posts ORDER BY id DESC");
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>MEIN CRUD</title>
</head>
<body>
	<div class="button-display">
		<a href="add.php" class="button_link">
		<img src="crud-icon/add.png" class="add-img" title="Add New Record"> Create</a>
	</div>

	<table class="tbl">
	<thead class="table-header">
		<tr>
		<th>Title</th>
		<th>Description</th>
		<th>Date</th>
		<th>Actions</th>
		</tr>
	</thead>

	<tbody id="table-body">
		<?php
		if(!empty($result)) { 
			foreach($result as $row) {
		?>
		<tr class="table-row">
			<td><?php echo $row["post_title"]; ?></td>
			<td><?php echo $row["description"]; ?></td>
			<td><?php echo $row["post_at"]; ?></td>
			<td>
				<a class="action-links" href='edit.php?id=<?php echo $row['id']; ?>'><img src="crud-icon/edit.png" title="Edit"></a> 
				<a class="action-links" href='delete.php?id=<?php echo $row['id']; ?>'><img src="crud-icon/delete.png" title="Delete"></a>
			</td>
		</tr>
		<?php
			}
		}
		?>
	</tbody>
	</table>
</body>
</html>