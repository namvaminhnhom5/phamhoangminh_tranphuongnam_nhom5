<!DOCTYPE html> 
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ASMWEB</title>
</head>
<body>
    <?php
        session_start();
        include ('connect.php');
        if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $sql = "SELECT username, password FROM user WHERE username = '$name'";
        $result = mysqli_query($conn, $sql); 
        if(mysqli_num_rows($result)==0){
            echo "tai khoan khong ton tai";
            die();
        }
        $row = mysqli_fetch_assoc($result);
        $pass = md5($_POST['pass']);
        if ($pass != $row['password']) {
            echo "mat khau khong dung"; 
            die();
        }
        $_SESSION['username'] = $name;
        echo "dang nhap thanh cong "."xin chao".$name;
    }
    ?>
<form action="" method="POST">
    <label for="name">Username</label><br>
    <input type="text" name="name" require><br>
    <label for="pass">Password</label> <br> 
    <input type="password" name="pass" require><br>
    <input type="submit" name="submit" value="Dang nhap"> 
</form>
</body>
</html>
