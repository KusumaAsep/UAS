<?php
    if( empty( $_SESSION['id_user'] ) ){

        $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
        header('Location: ./');
        die();
    } else {
?>

<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet"/>
</head>
<body onload="window.print()">
    <div class="container">

<?php

    $id= $_REQUEST['id'];

    $sql = mysqli_query($koneksi, "SELECT * FROM data WHERE id='$id'");

    list($id, $nama, $alamat, $provinsi, $email, $no, $keahlian) = mysqli_fetch_array($sql);
    $a = date('j F Y H:i:s');
    echo '
        <center>Data Relawan Covid19 wilayah DKI Jakarta</center>
        <center>Per '.$a.'</center>
        <br>
        <table class="table table-bordered">
         <thead>
           <tr class="info">
            <th width="5%">No.</th>
                <th width="10%">Nama Lengkap</th>
                <th width="20%">Alamat Rumah</th>
                <th width="20%">Propinsi</th>
                <th width="10%">Email`</th>
                <th width="10%">No HP</th>
                <th width="20%">Keahlian</th>
            </tr>
         </thead>
         <tbody>

           <tr>
                <td>'.$id.'</td>
                <td>'.$nama.'</td>
                <td>'.$alamat.'</td>
                <td>'.$provinsi.'</td>
                <td>'.$email.'</td>
                <td>'.$no.'</td>
                <td>'.$keahlian.'</td>
            </tr>

        </tbody>
    </table>
</body>
</html>';
}
?>
