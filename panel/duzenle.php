<?php  include "header.php"; 
include "baglan.php";

$id = $_GET['duzenle']; 

$query = $db->query("SELECT * FROM uye WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['duzenle'])) {

$query = $db->prepare("UPDATE uye SET
ad = :ad,
email = :email,
cv = :cv
WHERE id = :id");
$update = $query->execute(array(
     "ad" => $_POST["ad"],
 	 "email" => $_POST["email"],
 	 "cv" => $_POST["cv"],
 	 "id" => $id
));
if ( $update ){
    echo'<script type="text/javascript">alert("Kayıt Başarıyla Güncellendi");
    </script>';
     header("location:kaydet.php");
} else {
     echo'<script type="text/javascript">alert("Üzgünüm Başarısız");</script>';	
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>uye kayıt</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<div class="containerser">
	<div class="col-md-6">
<form action="" method="post">

<label><B>İsim Soyisim</B></label>	
<input class="form-control" value="<?=$query['ad'] ?>" type="text" name="ad">
<label>Mail</label>	
<input class="form-control" value="<?=$query['email'] ?>" type="text" name="email">
<label>CV</label>	
<input class="form-control" type="text" value="<?=$query['cv'] ?>" name="cv">
<br>
<button class="form-control btn btn-success" name="duzenle" type="submit">Güncelle</button>
</form>
</div>
</div>
</body>
</html>