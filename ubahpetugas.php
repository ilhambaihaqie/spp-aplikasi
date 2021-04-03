<?php
include 'koneksi.php';
$data = $konek -> query("SELECT * FROM petugas WHERE idpetugas ='$_GET[id]'");
include 'header.php';
?>

<div class="container">
	<div class="page-header">
<h2 >EDIT DATA PETUGAS </h2>
</div>
<form action="" method="post">
<table class="table">
	<?php
	while ($dta =mysqli_fetch_assoc($data) ) :
	?>
	<tr>
		<td>Nama Petugas</td>
		<td>
			<input class="form-control" type="hidden" name="idpetugas" value="<?= $dta['idpetugas'] ?>">
			<input class="form-control" type="text" name="namapetugas" value="<?= $dta['namapetugas'] ?>" size = "30">
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<button class="btn btn-success" type="submit" name="ubah">UPDATE</button>
		</td>
	</tr>
</table>
</form>
<?php endwhile; ?>
</body>
</html>
<?php
 if ( isset($_POST['ubah']) ) {
 	$id   = $_POST['idpetugas']; 
 	$guru = $_POST['namapetugas'];

 	$ubah = $konek -> query("UPDATE petugas SET namapetugas = '$petugas' WHERE idpetugas = ".$id);
 	if( $ubah ){
 		echo "
 		<script>
 		alert('data petugas berhasil diedit');
 		document.location.href = 'petugas.php';
 		</script>
 		";
 	}else {
 		echo "
 		<script>
 		alert('data petugas gagal diedit');
 		document.location.href = 'petugas.php';
 		</script>
 		";
 	}
 }


?>
</div>