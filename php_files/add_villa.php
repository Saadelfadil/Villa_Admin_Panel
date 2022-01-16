<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if (!$_SESSION['password'])
    header('Location: connexion.php');
if (isset($_POST['back']))
    header('Location: index.php');
if (isset($_POST['addVilla']))
{
    if (!empty($_POST['villa_name']) AND !empty($_POST['villa_city']) AND !empty($_POST['villa_price']) AND !empty($_POST['villa_days']) AND !empty($_FILES['villa_picture']))
    {
        $villa_name = htmlspecialchars($_POST['villa_name']);
        $villa_city = nl2br(htmlspecialchars($_POST['villa_city']));
        $villa_price = htmlspecialchars($_POST['villa_price']);
        $villa_days = htmlspecialchars($_POST['villa_days']);
        $villa_pic = time() . '_' . $_FILES['villa_picture']['name'];
        $villa_picture = '../assets/img/' . $villa_pic;
        move_uploaded_file($_FILES['villa_picture']['tmp_name'], $villa_picture);
        $addVilla = $bdd->prepare('INSERT INTO villa(villa_picture, villa_name, villa_city, villa_price, villa_days) values(?, ?, ?, ?, ?)');
        $addVilla->execute(array($villa_picture, $villa_name, $villa_city, $villa_price, $villa_days));
        // echo "Your Villa added succefully";
    }
    else
        echo "You should fill all inputs";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Login page</title>
</head>
<body class="container">
    <header>
        <form id="form1" method="POST" action="" type="hidden">
        </form>
            <button type="submit" form="form1" name="back" >
                <img src="../assets/img/arrow.svg" alt="">
            </button>
            <h1>Ürün Ekleme</h1>
    </header>
    <form action="" method="post"  enctype="multipart/form-data">
        <div class="image">
            <div class="images_upload">
                <label for="villa_picture"><img src="../assets/img/camera.png"></label>
                <input type="file" name="villa_picture" id="villa_picture" />
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