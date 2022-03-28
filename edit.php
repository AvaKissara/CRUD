<?php
require_once("db.php");
if(!empty($_POST["save_record"])) {
	$pdo_statement=$conn->prepare("UPDATE posts SET post_title='" . $_POST[ 'post_title' ] . "', description='" . $_POST[ 'description' ]. "', post_at='" . $_POST[ 'post_at' ]. "' WHERE id=" . $_GET["id"]);
	$result = $pdo_statement->execute();
	if($result) {
		header('location:index.php');
	}
}
$pdo_statement = $conn->prepare("SELECT * FROM posts WHERE id=" . $_GET["id"]);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>MEIN CRUD - Edit Record</title>
</head>
<body>
	<div>
		<a href="index.php" class="button_link">Back to List</a>
	</div>
	<div class="frm-add">
		<h1 class="form-heading">Edit Record</h1>
		<form name="frmAdd" action="" method="POST">
		<div class="form-row">
			<label>Title: </label><br>
			<input type="text" name="post_title" class="form-field" value="<?php echo $result[0]['post_title']; ?>" required>
		</div>
		<div class="form-row">
			<label>Description: </label><br>
			<textarea name="description" class="form-field" rows="5" required ><?php echo $result[0]['description']; ?></textarea>
		</div>
		<div class="form-row">
			<label>Date: </label><br>
			<input type="date" name="post_at" class="form-field" value="<?php echo $result[0]['post_at']; ?>" required />
		</div>
		<div class="form-row">
			<input name="save_record" type="submit" value="Save" class="form-submit">
		</div>
		</form>
	</div>
</body>
</html>