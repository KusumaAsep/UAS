<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$nama = $_REQUEST['nama']; 
		$alamat = $_REQUEST['alamat'];
		$provinsi = $_REQUEST['provinsi'];
		$email = $_REQUEST['email'];
		$no = $_REQUEST['no'];
		$keahlian = $_REQUEST['keahlian'];

		$sql = mysqli_query($koneksi, "UPDATE data SET nama='$nama', alamat='$alamat', provinsi='$provinsi', email='$email', no='$no', keahlian='$keahlian'");

		if($sql == true){
			header('Location: ./admin.php?hlm=transaksi');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$id = $_REQUEST['id'];

		$sql = mysqli_query($koneksi, "SELECT * FROM data WHERE id='$id'");
		while($row = mysqli_fetch_array($sql)){

?>

<script>
	function random()
	{
		var a=document.getElementById('provinsi').value;
		document.getElementById('restoran1').value=a;
	}
</script>


<h2>Edit Data Transaksi</h2>
<hr>
<<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?php echo $row['nama']; ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label for="Alamat Rumah" class="col-sm-2 control-label">Alamat Lengkap</label>
		<div class="col-sm-3">
			<textarea class="form-control" name="alamat" id="alamat" aria-label="With textarea" value="<?php echo $row['alamat']; ?>" required></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="provinsi" class="col-sm-2 control-label">Nama Provinsi</label>
		<div class="col-sm-3">
			<select name="provinsi" class="form-control" id="provinsi" name="provinsi" onchange="random()">
				<option value="" disable>--- Pilih Provinsi ---</option>
				<option value="DKI Jakarta">DKI Jakarta</option>
				<option value="Jawa Barat">Jawa Barat</option>
				<option value="Jawa Tengah">Jawa Tengah</option>
				<option value="Jawa Timur">Jawa Timur</option>
				<option value="Banten">Banten</option>
			</select>
		</div>
	</div>
	<input id="provinsi1" name="restoran1" hidden>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Alamat Email</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="email" name="email" placeholder="Alamat Email" value="<?php echo $row['email']; ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label for="no" class="col-sm-2 control-label">No HP</label>
		<div class="col-sm-3">
			<input type="text" name="" class="form-control" name="no" id="no" aria-label="With textarea" value="<?php echo $row['no']; ?>"required>
		</div>
	</div>
	<div class="form-group">
		<label for="keahlian" class="col-sm-2 control-label">Keahlian</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="keahlian" name="no" placeholder="Keahlian" value="<?php echo $row['keahlian']; ?>"required>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Alamat Email</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Alamat Email" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=transaksi" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php
	}
	}
}
?>
