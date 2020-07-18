<?php

if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'transaksi_baru.php';
				break;
			case 'edit':
				include 'transaksi_edit.php';
				break;
			case 'hapus':
				include 'transaksi_hapus.php';
				break;
			case 'cetak':
				include 'cetak_nota.php';
				break;
		}
	} else {

		echo '

			<div class="container">
				<h3 style="margin-bottom: -20px;">Daftar Transaksi</h3>
					<a href="./admin.php?hlm=transaksi&aksi=baru" class="btn btn-success btn-s pull-right">Tambah Data</a>
				<br/><hr/>

				<table class="table table-bordered">
				 <thead>
				   <tr class="info">
					 <th width="5%">Id</th>
					 <th width="10%">Nama</th>
					 <th width="20%">Alamat</th>
					 <th width="20%">Provinsi</th>
					 <th width="10%">Email</th>
					 <th width="10%">No HP</th>
					 <th width="20%">Keahlian</th>
					 <th width="20%">Tindakan</th>
				   </tr>
				 </thead>
				 <tbody>';

			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($koneksi, "SELECT * FROM data");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;

				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '

				   <tr>
					 <td>'.$row['id'].'</td>
					 <td>'.$row['nama'].'</td>
					 <td>'.$row['alamat'].'</td>
					 <td>'.$row['provinsi'].'</td>
					 <td>'.$row['email'].'</td>
					 <td>'.$row['no'].'</td>
					 <td>'.$row['keahlian'].'</td>
					 <td>

					<script type="text/javascript" language="JavaScript">
					  	function konfirmasi(){
						  	tanya = confirm("Anda yakin akan menghapus data ini?");
						  	if (tanya == true) return true;
						  	else return false;
						}
					</script>

					<a href="?hlm=cetak&id='.$row['id'].'" class="btn btn-info btn-s" target="_blank">Cetak Nota</a>

					 <a href="?hlm=transaksi&aksi=edit&id='.$row['id'].'" class="btn btn-warning btn-s">Edit</a>

					 <a href="?hlm=transaksi&aksi=hapus&submit=yes&id='.$row['id'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>

					 </td>';
				}
			} else {
				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=transaksi&aksi=baru">Tambah data baru</a></u> </p></center></td></tr>';
			}
			echo '
			 	</tbody>
			</table>
		</div>';
	}
}
?>
