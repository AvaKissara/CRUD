<?php
if(!empty($_POST["add_record"])) 
{
	require_once("db.php");

	$data = [
		':post_title'=>$_POST['post_title'],
		':description'=>$_POST['description'],
		':post_at'=>$_POST['post_at']
	];
	$sql = "INSERT INTO posts ( post_title, description, post_at ) VALUES (:post_title, :description, :post_at )";
	$pdo_statement = $conn->prepare($sql);
		
	$result = $pdo_statement->execute($data);
	if (!empty($result))
	{
	  header('location:index.php');
	}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>MEIN CRUD - Add New Record</title>
</head>
<body>
	<div>
		<a href="index.php" class="button_link">Back to List</a>
	</div>
	<div class="frm-add">
		<h1 class="form-heading">Add New Record</h1>
		<form name="frmAdd" action="" method="POST">
			<div class="form-row">
				<label>Title: </label><br>
				<input type="text" name="post_title" class="form-field" required>
			</div>
			<div class="form-row">
				<label>Description: </label><br>
				<textarea name="description" class="form-field" rows="5" required></textarea>
			</div>
			<div class="form-row">
				<label>Date: </label><br>
				<input type="date" name="post_at" class="form-field" required>
			</div>
			<div class="form-row">
				<input name="add_record" type="submit" value="Add" class="form-submit">
			</div>
  		</form>
	</div> 
</body>
</html>