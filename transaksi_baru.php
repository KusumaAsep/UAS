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

		$sql = mysqli_query($koneksi, "INSERT INTO data(id, nama, alamat, provinsi, email, no, keahlian) VALUES(NULL, '$nama', '$alamat', '$provinsi', '$email', '$no', '$keahlian')");

		if($sql == true){
			header('Location: ./admin.php?hlm=transaksi');
			die();
		} else {
			echo"CEK QUERY".mysqli_error($koneksi); 
		}
	} else {
?>
<script>
	function random()
	{
		var a=document.getElementById('provinsi').value;
		document.getElementById('restoran1').value=a;
	}
</script>

<h2>Tambah Data Relawan Covid</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
		</div>
	</div>
	<div class="form-group">
		<label for="Alamat Rumah" class="col-sm-2 control-label">Alamat Lengkap</label>
		<div class="col-sm-3">
			<textarea class="form-control" name="alamat" id="alamat" aria-label="With textarea" required></textarea>
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
			<input type="text" class="form-control" id="email" name="email" placeholder="Alamat Email" required>
		</div>
	</div>
	<div class="form-group">
		<label for="no" class="col-sm-2 control-label">No HP</label>
		<div class="col-sm-3">
			<input type="text" name="" class="form-control" name="no" id="no" laceholder="Keahlian" required>
		</div>
	</div>
	<div class="form-group">
		<label for="keahlian" class="col-sm-2 control-label">Keahlian</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="keahlian" name="keahlian" placeholder="Keahlian" required>
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
?>
<script>

  $(document).ready(function(){

    $("#jenis").change(function(){
      var biaya = $(this).val();
      $("#biaya").val(biaya);
    });

    $("#bayar").keyup(function(){
        var biaya = $("#biaya").val();
        var bayar = $("#bayar").val();
        $("#kembali").val(bayar - biaya);
        $("#total").val(biaya);
    });

  });
</script>
