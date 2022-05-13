<?php
    include_once("config.php");
    $user_ = mysqli_query($mysqli, "SELECT * FROM user_");
?>

<?php
    include_once("config.php");
    if(isset($_POST['login'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        if($user && $pass){
            $username_db = mysqli_query($mysqli, "SELECT username FROM user_ WHERE username='$user'");
            $username = mysqli_fetch_array($username_db);
            $userpass_db = mysqli_query($mysqli, "SELECT userpass FROM user_ WHERE username = '$user'");
            $userpass = mysqli_fetch_array($userpass_db);
            
            $adminname_db = mysqli_query($mysqli, "SELECT adminname FROM admin WHERE adminname='$user'");
            $adminname = mysqli_fetch_array($adminname_db);
            $adminpass_db = mysqli_query($mysqli, "SELECT adminpass FROM admin WHERE adminname = '$user'");
            $adminpass = mysqli_fetch_array($adminpass_db);
            
            $pass_input = mysqli_query($mysqli, "SELECT MD5('$pass')");
            $pass_new = mysqli_fetch_array($pass_input);

            
            if($user == $username['username'] && $pass == $userpass['userpass']){
                header("Location: marketplace.php");
            }
            else if ($user == $adminname['adminname'] && $pass == $adminpass['adminpass']){
                header("Location: adminMarketplace.php");
            } else {
                echo '<p>Username tidak ada dalam Database!</p>';
            }

            // $cek_db = mysqli_query($mysqli, "SELECT * FROM user_ WHERE username='$user'");
            // $item = mysqli_fetch_array($cek_db);
            // $ad_cek_db = mysqli_query($mysqli, "SELECT * FROM admin WHERE adminname='$user'");
            // $ad_item = mysqli_fetch_array($ad_cek_db);
            // if($user == $item['username'] && $pass == $item['userpass']){
            //     header("Location: marketplace.php");
            // }
            // else if($user == $ad_item['adminname'] && $pass == $ad_item['adminpass']){
            //     header("Location: adminMarketplace.php");
            // } else {
            //     echo '<p>Username tidak ada dalam Database!</p>';
            // }
        }else{
                echo '<p>Username tidak ada dalam Database!</p>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Tugas</title>
</head>
<body>
    <h1 class="text-center m-4">Crypto Exchange</h1>
    <form class="container w-75 m-auto" name="login" method="post" action="index.php">
        <h3>Login</h3>
        <div class="form-floating mb-3">
            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>        
        <input class="btn btn-primary" type="submit" name="login" value="Login">
    </form>
    <br>
</body>
</html>