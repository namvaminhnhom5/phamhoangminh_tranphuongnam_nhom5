<?php 
require_once './db.php';

$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$department_id = $_POST['department_id'];
$image = $_FILES['avatar'];

$usernameErr = "";
if(strlen($username) == 0){
	$usernameErr = "Không để trống tên tài khoản";
}


if($usernameErr == "" && (strlen($username) < 4 || strlen($username) > 30)){
	$usernameErr = "Tên tài khoản nằm trong khoảng 4 => 30 ký tự";
}


$tmpUsername = str_replace(" ", "", $username);
if(strlen($username) - strlen($tmpUsername) > 0){
	$usernameErr = "Trong tên tài khoản không được chứa khoảng trắng";
}


$emailErr = "";
$count = 0;
for ($i=0; $i < strlen($email); $i++) { 
	if($email[$i] == "@"){
		$count++;
	}
}
if($count != 1){
	$emailErr = "Định dạng email không đúng!";
}


$avatarErr = "";

if($image['size'] == 0){
	$avatarErr = "Hãy chọn ảnh đại diện";
}
$acceptExt = ['jpg', 'png', 'gif', 'jpeg'];
$file_parts = pathinfo($image['name']);

if($avatarErr == "" && !in_array($file_parts['extension'], $acceptExt)){
	$avatarErr = "File không đúng định dạng";
}


if($usernameErr != ""
	|| $emailErr != ""
	|| $avatarErr != ""){
	header("location: add-form.php?usernameErr=$usernameErr&emailErr=$emailErr&avatarErr=$avatarErr");
	die;
}


$avatar = "";

if($image['size'] > 0){ 
	$filename = uniqid() . "-" . $image['name'];
	move_uploaded_file($image['tmp_name'], 'uploads/' . $filename);
	$avatar = 'uploads/' . $filename;
}


$sql = "insert into users 
			(username, password, email, avatar, department_id)
		values 
			('$username', '$password', '$email', '$avatar', '$department_id')";
executeQuery($sql);


header('location: index.php');


 ?>