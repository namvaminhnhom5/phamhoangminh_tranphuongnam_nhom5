<!DOCTYPE html> 
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post">
    <label for="name">Username</label><br> 
    <input type="text" name="name"><br> 
    <label for="pass">Password</label><br> 
    <input type="password" name="pass"> <br> 
    <label for="gmail">Gmail</label><br> 
    <input type="gmail" name="gmail"><br> 
    <input type="submit" name="submit" value="Dang ki"> 
</form>
<?php
    include_once('connect.php'); 
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $pass = $_POST['pass']
        $gmail = $_POST['gmail'];
        $sql = "SELECT * FROM user WHERE username = '$name'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){//kiem tra xem tai khoan co ton tai hay khong
            echo "tai khoan nay da ton tai";
        }else {
            $pass = md5 ($pass); //ma hoa mat khau =))
            $sql = "INSERT INTO user (username, password, gmail) VALUES ('$name', '$pass', '$gmail')"; 
            if ($conn->query($sql) === true) {
                echo "tao moi thanh cong";
            }
        }
        }
    ?>
</body>
</html>
        