<?php 
require_once './db.php';
$sql = "select * from departments";
$result = executeQuery($sql, true);

$usernameErr = isset($_GET['usernameErr']) == true ? $_GET['usernameErr'] : "";
$emailErr = isset($_GET['emailErr']) == true ? $_GET['emailErr'] : "";
$avatarErr = isset($_GET['avatarErr']) == true ? $_GET['avatarErr'] : "";
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="save-add.php" 
			enctype="multipart/form-data" 
			method="post">
		<div>
			<label for="">Username</label>
			<input type="text" name="username" value="" placeholder="">
			<?php if ($usernameErr != ""): ?>
				<p style="color: red"><?php echo $usernameErr ?></p>
			<?php endif ?>
		</div>
		<div>
			<label for="">Email</label>
			<input type="text" name="email" value="" placeholder="">
			<?php if ($emailErr != ""): ?>
				<p style="color: red"><?php echo $emailErr ?></p>
			<?php endif ?>
		</div>
		<div>
			<label for="">Department</label>
			<select name="department_id">
				<?php foreach ($result as $depart): ?>
					<option value="<?php echo $depart['id'] ?>"><?php echo $depart['name'] ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div>
			<label for="">Password</label>
			<input type="password" name="password" value="" placeholder="">
		</div>
		<div>
			<label for="">Avatar</label>
			<input type="file" name="avatar" value="" placeholder="">
			<?php if ($avatarErr != ""): ?>
				<p style="color: red"><?php echo $avatarErr ?></p>
			<?php endif ?>
		</div>
		<div>
			<button type="submit">Save</button>
			<a href="index.php" title="">Cancel</a>
		</div>
	</form>
	
	
</body>
</html>