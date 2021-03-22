<?php 
    include('../config/constant.php');
    // echo "Hapus";

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        // Mendelete
        // echo "Delete";

        // Dapatkan Id dan gambar
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        // Hapus gambar
        // Cek ada gambar atau tidak
        if($image_name != "")
        {
            // Dapatkan gambar
            $path = "../images/food/".$image_name;

            // Hapus gambar dari folder
            $remove = unlink($path);

            // Cek gambar berhasil di hapus
            if($remove == false)
            {
                // Gagal menghapus gambar
                $_SESSION['upload'] = "<div class='error'>Gagal mengupload gambar</div>";

                // Redirect lagi
                header('location:'.SITE_URL.'admin/manage_food.php');
                
                // Stop penghapusan
                die();
            }
        }

        // Hapus data dari database
        $sql = "DELETE FROM tbl_food WHERE id = $id";

        // Eksekusi
        $res = mysqli_query($conn, $sql);

        // Cek query tereksekusi atau tidak
        if($res == true)
        {
            // Makanan terhapus
            $_SESSION['delete'] = "<div class='success'>Berhasil menghapus</div>";
            header('location:'.SITE_URL.'admin/manage_food.php');
        }
        else
        {
            // Gagal menghapus
            $_SESSION['delete'] = "<div class='error'>Gagal menghapus</div>";
            header('location:'.SITE_URL.'admin/manage_food.php');
        }

    }
    else
    {
        // Redirect lagi
        // echo "Gagal Delete";
        $_SESSION['unauthorize'] = "<div class='error'>Akses ditolak</div>";
        header('location:'.SITE_URL.'admin/manage_food.php');
    }

?>