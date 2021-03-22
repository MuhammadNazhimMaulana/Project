<?php 

    // Memasukkan constant.php
    include('../config/constant.php');

    //Ambil id dari admin yang mau di hapus
   echo  $id = $_GET['id'];

    //Membuat query untuk hapus
    $sql = "DELETE FROM tbl_admin WHERE id = $id";

    //Eksekusi kode program
    $res = mysqli_query($conn, $sql);

    //Cek query terkesekusi atau tidak
    if($res==TRUE)
    {
        //Eksekusi query dan admin di hapus
        //echo "Admin Terhapus";

        //Membuat session untuk variabel

        $_SESSION['delete'] = "Admin berhasil dihapus";

        //redirect ke halaman manage admin
        header('location:'.SITE_URL.'admin/manage_admin.php');
    }
    else
    {
        //Gagal menghapus admin
        //echo "Gagal menghapus admin";

        $_SESSION['delete'] = "Gagal menghapus Admin";
        header('location:'.SITE_URL.'admin/manage_admin.php');
    }

    //Redirect kembali ke manage admin (kalau sukses)

?>