<?php
    session_start();

    //Pengecekan Jika tidak ada Session role atau rolenya selain admin
    //Maka di kick ke halaman landing page
    if(!isset($_SESSION['role']) || $_SESSION['role'] != "user") {
        header("location:../../index.php");
    }

    //Setup untuk koneksi, baseurl dan menu admin
    include "../../includes/koneksi.php";
    include "../../includes/baseurl.php";

    $id_kategori    = $_POST['id_kategori'];
    $lokasi         = $_POST['lokasi'];
    $isi_aspirasi   = $_POST['isi_aspirasi'];

    if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0)
    {
        $namaFile       = $_FILES['foto']['name'];
        $tmpName        = $_FILES['foto']['tmp_name'];
        $error          = $_FILES['foto']['error'];

        $folderTujuan = "../../foto_aspirasi/";
        $namaBaru = date("Ymd_His") . "_" . $namaFile;
        move_uploaded_file($tmpName, $folderTujuan . $namaBaru);
    }
    else
    {
        echo "gagal kirim foto";
    }
    

?>
  