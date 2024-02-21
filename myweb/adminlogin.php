<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form Animation CSS | Codehal</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <div class="login-box">
    <?php
    session_start();
    if(isset($_POST["login"])){
    $email=$_POST["email"];
    $password=$_POST["password"];
    require_once "database.php";
    $sql= "SELECT * FROM users WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
    $user= mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($user) {
        if(password_verify($password, $user["password"])){
            $_SESSION['user_id']=$user['id'];
            header("Location: notes.php");
            die();
        }
        else{
            echo"<div class='alert alert-danger'> Password does not match</div>";
        }

    }else{
        echo "<div class='alert alert-danger'>Email does not match</div>";
    }

    }
   ?>
       

            
<form action="admininsert.php" method="post">
            <h2>Login</h2>
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="mail"></ion-icon>
                </span>
                <input type="email" required id="email" name="email", class="form-control">
                <label>Email</label>
                <div class="input-line"></div>
            </div>
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                </span>
                <input type="password" required id="password" name="password" class="form-control">
                <label>Password</label>
                <div class="input-line"></div>
            </div>
            <div class="remember-forgot">
                
                <a href="#">Forgot Password?</a>
            </div>

            
            <button type="submit" value="login" name="login" class="btn btn-primary">Login</button>

            
        </form>
    </div>