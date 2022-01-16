<?php
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
$error = "";
if (isset($_GET['id']) AND !empty($_GET['id']))
{
	$getId = $_GET['id'];
	$myVilla = $bdd->prepare('SELECT * FROM villa WHERE id= ?');
	$myVilla->execute(array($getId));
	if ($myVilla->rowCount() > 0)
	{
		$villaInfo = $myVilla->fetch();
		$villa_name = $villaInfo['villa_name'];
		$villa_city = str_replace('<br />', '', $villaInfo['villa_city']);
		$villa_price = $villaInfo['villa_price'];
        $villa_days = $villaInfo['villa_days'];
		$villa_picture = $villaInfo['villa_picture'];
		
		if (isset($_POST['EditVilla']))
		{
			$newVilla_name = htmlspecialchars($_POST['villa_name']);
			$newVilla_city = nl2br(htmlspecialchars($_POST['villa_city']));
			$newVilla_price = htmlspecialchars($_POST['villa_price']);
        	$newVilla_days = htmlspecialchars($_POST['villa_days']);
			$newVilla_pic = time() . '_' . $_FILES['villa_picture']['name'];
			$newVilla_picture = '../assets/img/' . $newVilla_pic;
            if (empty($_POST['villa_picture']))
                $newVilla_picture = $villaInfo['villa_picture'];
			if (!isset($_FILES['villa_picture']))
				$newVilla_picture = $villaInfo['villa_picture'];
			else
				move_uploaded_file($_FILES['villa_picture']['tmp_name'], $newVilla_picture);
			$updateVilla = $bdd->prepare('UPDATE villa SET villa_picture = ?, villa_name = ?, villa_city = ?, villa_price = ?, villa_days = ? WHERE id= ?');
			$updateVilla->execute(array($newVilla_picture, $newVilla_name, $newVilla_city, $newVilla_price, $newVilla_days, $getId));
			header('Location: villa.php');
		}
	}
	else
        $error =  "There are no Villa";
}
else
    $error = "Villa not found";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/toastr.scss">
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
                <label for="villa_picture"><img class="villa_img" src="<?= $villa_picture?>"><img class="cameraIcon" src="../assets/img/camera.png"></label>
                <input type="file" name="villa_picture" id="villa_picture" />
            </div>
            <div class="title">
                <h2>Listelemek istediğinoz eşyanin fotoğrafini ekleyin</h2>
            </div>
        </div>
        <div class="formation">
            <h4>Hiç resim seçilmedi</h4>
            <input type="text" name="villa_name" placeholder="Eşya Adi*" value="<?= $villa_name?>">
            <textarea name="villa_city" id="" cols="30" rows="10" placeholder="Eşya Açiklamasi*"><?= $villa_city?></textarea>
            <input type="number" name="villa_price" placeholder="Eşyanizin Tahmini Fiyati*" value="<?= $villa_price?>">
            <input type="number" name="villa_days" placeholder="Eşyanizin Gün Sayisi*" value="<?= $villa_days?>">
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
                <label for="">Hüküm ve Koşullar<img src="../assets/img/resize.png"></label>
                <input type="checkbox">
            </div>
            <div class="button">
                <button type="submit" name="EditVilla">Onayla ve Yolla</button>
            </div>
            <!-- <?php
                if (!empty($error))
                    echo "<h1>". $error ."</h1>"
            ?> -->
        </div>
    </form>
</body>
</html>