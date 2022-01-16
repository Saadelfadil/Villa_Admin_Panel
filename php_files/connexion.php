<?php
session_start();
$error = "";
if (isset($_SESSION['password']))
    header('Location: index.php');
if (isset($_POST['submit']))
{
    if (!empty($_POST['email']) AND !empty($_POST['password']))
    {
        $email_default = "admin";
        $password_default = "admin";

        $email_input = htmlspecialchars($_POST['email']);
        $password_input = htmlspecialchars($_POST['password']);

        if ($email_default == $email_input AND $password_default == $password_input)
        {
            $_SESSION['password'] = $password_input;
            header('location: index.php');
        }
        else
            $error =  "Wrong Password";
    }
    else
      $error = "Please fill Email and Password";
}
?>

<!DOCTYPE html>
<html>
    <head>
    <title> Villa Administration</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../assets/css/style_1.css">
    </head>
    <body>
      <form method="POST" action="">
        <div class="login-box">
            <h1>Login</h1>
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="email" name="email" value="" >
            </div>

            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="password" name="password" value="" >
            </div>

            <input type="submit" class="btn" name="submit" value="login" >
            <!-- <?php
                if (!empty($error))
                    echo "<h1>". $error ."</h1>"
            ?> -->
        </div>
      </form>
    </body>
</html>