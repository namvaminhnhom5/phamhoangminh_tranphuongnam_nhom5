<?php 
require_once './db.php';
$id = $_GET['id'];

$sql = "select * from users where id = $id";
$data = executeQuery($sql, false);

$sqlDepartment = "select * from departments";

$departArr = executeQuery($sqlDepartment, true);
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
	<form action="save-edit.php" method="post"
			enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $data['id']?>">
		<div>
			<label for="">Username</label>
			<input type="text" name="username" value="<?php echo $data['username']?>" placeholder="">
		</div>
		<div>
			<label for="">Email</label>
			<input type="text" name="email" value="<?php echo $data['email']?>" placeholder="">
		</div>
		<div>
			<label for="">Department</label>
			<select name="department_id">
				<?php foreach ($departArr as $depart): ?>
					<option 
						<?php if ($data['department_id'] == $depart['id']): ?>
							selected
						<?php endif ?>
						value="<?php echo $depart['id'] ?>"><?php echo $depart['name'] ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div>
			<img src="<?php echo $data['avatar']?>" width="150">
			<br>
			<label for="">Avatar</label>
			<input type="file" name="avatar" placeholder="">
		</div>
		<div>
			<button type="submit">Save</button>
			<a href="index.php" title="">Cancel</a>
		</div>
	</form>
	
</body>
</html> 