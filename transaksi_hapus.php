<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $id = $_REQUEST['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM data WHERE id='$id'");
    if($sql == true){
        header("Location: ./admin.php?hlm=transaksi");
        die();
    }
    }
}
?>
