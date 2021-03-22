<?php 
    // Masukkan file constant
    include('../config/constant.php');

// echo "Hapus";
// Cek id dan image_gambar ada
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    // Ambil nilai dan hapus
    // echo "Dapatkan Nilai";
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    // Hapus gambar fisik (file) jika ada
    if($image_name != "")
    {
        // Ada gambar, hapus
        $path = "../images/category/".$image_name;

        // Hapus gambar
        $remove = unlink($path);

        // Jika gagal hapus gambar munculkan error dan hentikan prosesnya
        if($remove == false)
        {
            // Pesan dengan session
            $_SESSION['remove'] = "<div class='error'>Gagal menghapus gambar</div>";

            // kembali ke manage category dan hentikan proses
            header('location:'.SITE_URL.'admin/manage_category.php');
            die();
        }
    }
    
    // Hapus data dari database (sqlnya)
    $sql = "DELETE FROM tbl_category where id = $id";

    // Eksekusi query
    $res = mysqli_query($conn, $sql);

    // Cek data terhapus atau tidak
    if($res == true)
    {
        // Munculkan pesan berhasil dan redirect
        $_SESSION['delete'] = "<div class='success'>Berhasil Menghapus data</div>";

        // Kembali ke manage kategori
        header('location:'.SITE_URL.'admin/manage_category.php');
    }
    else
    {
        // Munculkan pesan gagal
        $_SESSION['delete'] = "<div class='error'>Gagal Menghapus data</div>";
    
        // Kembali ke manage kategori
        header('location:'.SITE_URL.'admin/manage_category.php');
    }

}
else
{
    // Kembali ke halaman manage kategori
    header('location:'.SITE_URL.'admin/manage_category');

}

?>