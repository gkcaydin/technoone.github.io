
<?php include "header.php"; ?>


<div class="container-fluid"> 
    <div class="row"> 
      <div class="col-md-6"> 
        <h2 style="text-align: center;"> Technoone Yönetim Paneli </h2>
<form action="" method="post" style="width:94%;">

	<table style="text-align: center; margin: 0px auto;">
		<div class="form-group">
		<tr>  
			<td> Kullanıcı Adı : </td>
			<td><input type="text" name="kad"> </td>
			</tr>
		</div>
		<div class="form-group mb-3"> 
			<tr>
				<td> Sifre : </td>
				<td><input type="password" name="sifre"> </td>
				</tr>
			</div>
				<tr> 
				<td> </td>
				<td><input type="Submit" value="Giriş Yapınız"  class="btn btn-dark"> </td>
				</tr>
			</table>	
		</form>
	</tr>
</div>
</div>
</div>
<div class="giris_islem">
		<?php 
		if($_POST){
			session_start();
			$kad = $_POST["kad"];
			$sifre= $_POST["sifre"];
			if ($kad =="Yahya Can" and $sifre =="3308") {
			 $_SESSION["oturum"] = false;
			 $_SESSION["kullanici"] = $kad;
			 echo "Başarıyla Giriş Yaptınız</br> Yönlendiriliyorsunuz.";
			 header("Refresh:1; url=kaydet.php");

			}
			else
				echo "Kullanıcı adı veya Şifreniz Yanlış.</br> Tekrar Deneyiniz";
		}
		?>
		<?php include "footer.php"; ?>

		</div>