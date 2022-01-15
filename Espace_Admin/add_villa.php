<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if (!$_SESSION['password'])
    header('Location: connexion.php');
if (isset($_POST['back']))
    header('Location: index.php');
if (isset($_POST['addVilla']))
{
    if (!empty($_POST['villa_name']) AND !empty($_POST['villa_city']) AND !empty($_POST['villa_price']) AND !empty($_POST['villa_days']))
    {
        $villa_name = htmlspecialchars($_POST['villa_name']);
        $villa_city = nl2br(htmlspecialchars($_POST['villa_city']));
        $villa_price = htmlspecialchars($_POST['villa_price']);
        $villa_days = htmlspecialchars($_POST['villa_days']);

        $addVilla = $bdd->prepare('INSERT INTO villa(villa_name, villa_city, villa_price, villa_days) values(?, ?, ?, ?)');
        $addVilla->execute(array($villa_name, $villa_city, $villa_price, $villa_days));
        echo "Your Villa added succefully";
    }
    else
        echo "You should fill all inputs";
}
?>

<!-- <!DOCTYPE html>
<html>
    <head>
    <title> Add Villa</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">

</head>
    <body>
      <form method="POST" action="">
        <div class="login-box">
            <h1>Add Villa</h1>
            <div>
                <input type="file" id="avatar" name="villa_picture" >
            </div>
            <div class="textbox">
                <input type="text" placeholder="Villa Name" name="villa_name" value="">
            </div>

            <div class="textbox">
                <input type="text" placeholder="Villa City" name="villa_city" value="">
            </div>

            <div class="textbox">
                <input type="text" placeholder="Estimated price of item" name="villa_price" value="">
            </div>

            <div class="textbox">
                <input type="text" placeholder="Number of days" name="villa_days" value="">
            </div>

            <input type="submit" class="btn" name="addVilla" value="Add">
        </div>
      </form>
    </body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Login page</title>
</head>
<body class="container">
    <header>
        <form method="POST" action="">
            <button method="POST" action="" type="submit" name="back" >
                <img src="./assets/img/arrow.svg" alt="">
            </button>
            <h1>Ürün Ekleme</h1>
        </form>
    </header>
    <form method="POST" action="">
        <div class="image">
            <div class="images_upload">
                <input type="file" name="villa_picture" accept="image/*" id="image"/>
                <label for="image">
                    <img src="./assets/img/camera.png" >
                </label>
            </div>
            <div class="title">
                <h2>Listelemek istediğinoz eşyanin fotoğrafini ekleyin</h2>
            </div>
        </div>
        <div class="formation">
            <h4>Hiç resim seçilmedi</h4>
            <input type="text" name="villa_name" placeholder="Eşya Adi*">
            <textarea name="villa_city" id="" cols="30" rows="10" placeholder="Eşya Açiklamasi*"></textarea>
            <input type="text" name="villa_price" placeholder="Eşyanizin Tahmini Fiyati*">
            <input type="text" name="villa_days" placeholder="Eşyanizin Gün Sayisi*" >
            <div class="select">
                <select name="" id="">
                    <option value="">Giyim</option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>
            <div>
                <label for="">Hüküm ve Koşullar<img src="./resize.png"></label>
                <input type="checkbox">
            </div>
            <div class="button">
                <button type="submit" name="addVilla">Onayla ve Yolla</button>
            </div>
        </div>
    </form>
</body>
</html>