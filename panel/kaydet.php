<?php 
include "header.php";
include "baglan.php";
if (isset($_POST['kaydet'])) {
$query = $db->prepare("INSERT INTO uye SET
ad = ?,
email = ?,
cv = ?");
$insert = $query->execute(array(
   $_POST["ad"],
   $_POST["email"],
   $_POST["cv"]
));
if ( $insert ){
    $last_id = $db->lastInsertId();
    echo'<script type="text/javascript">alert("Kayıt Başarıyla tamamlandı");</script>';
} else {
     echo'<script type="text/javascript">alert("Üzgünüm Başarısız");</script>';	
} }

$query = $db->prepare("DELETE FROM uye WHERE id = :id");
$delete = $query->execute(array('id' => @$_GET['sil']));

if (isset($_GET['sil'])) {
if ( $delete ){
    $last_id = $db->lastInsertId();
    echo'<script type="text/javascript">alert("Kayıt Başarıyla silindi");</script>';
} else {
     echo'<script type="text/javascript">alert("Üzgünüm Başarısız");</script>';	
} }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Uye kayıt</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="containerser">
	<div class="col-md-12">
<form action="" method="post">

<label><B>İsim Soyisim</B></label>	
<input class="form-control" type="text" name="ad">
<label>Mail</label>	
<input class="form-control" type="text" name="email">
<label>CV</label>	
<input class="form-control" type="text"  name="cv">
<br>
<button class="form-control btn btn-success" name="kaydet" type="submit">Kaydet</button>
</form>
</div>
<div class="col-md-12">
	<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Ad Soyad</th>
      <th scope="col">e-Mail</th>
      <th scope="col">CV</th>
    </tr>
  </thead>
  <tbody>

  	<?php 
$query = $db->query("SELECT * FROM uye", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){  ?>
    <tr>
      <th scope="row"><?=$row['id'] ?></th>
      <td><?=$row['ad'] ?></td>
      <td><?=$row['email'] ?></td>
      <td><?=$row['cv'] ?></td>
     <td><a href="duzenle.php?duzenle=<?=$row['id'] ?>"><button class="btn btn-outline-warning btn-sm">Düzenle</button></a></td>
      <td><a href="kaydet.php?sil=<?=$row['id'] ?>"><button class="btn btn-btn-outline-primary btn-sm">Sil</button></a></td>
    </tr>
    <?php 
     }}
     ?>
  </tbody>
</table>
</div>

</div>
</body>
</html>
