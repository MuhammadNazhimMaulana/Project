<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Header, Authorization, X-Requested-With");

// dapatkan koneksi database
include_once '../../v2/config/Database.php';

// Intansi untuk modelnya
include_once '../../v2/model/Jenis_Barang.php';

// Koneksi ke Database
$database = new Database();
$db = $database->getConnection();

// Membuat objek jenis
$jenis = new Jenis($db);

// Get request method dari klien
$request = $_SERVER['REQUEST_METHOD'];

//Cek request method
switch($request){
    case 'GET' :
    // Jika request method get

        if(!isset($_GET['id_jns_barang'])){

            $stmt = $jenis->read();
            $num = $stmt->rowCount();

            // Cek data yang ada (apabila record lebih dari 0)
            if($num > 0){

                // array produk
                $jenis_arr = array();
                $jenis_arr["records"] = array();

                // Mengembalikan isi tabel
                // fetch () leboh cepat daripada fetchAll()
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                    // Lakukan ekstrak row untuk membuat $row['name'] menjadi $name saja
                    extract($row);

                    $jenis_item = array(
                        "id_jns_barang" => $id_jns_barang,
                        "nama_jns_barang" => $nama_jns_barang,
                        "aktif" => $aktif
                    );  

                    array_push($jenis_arr["records"], $jenis_item);
                }

                // Set respon menjadi 200
                http_response_code(200);

                // Menunjukkan data dalam bentuk json
                echo json_encode($jenis_arr);
            }
            else{
                // Tidak ada produk dan silakan set respon menjado 404 not found
                http_response_code(404);

                // Beritahu user bahwa produk tidak ditemukan
                echo json_encode(
                    array("message" => "No Kind of Goods Found.")
                );
            }
        }
        elseif($_GET['id_jns_barang'] == NULL){
            echo json_encode(array("message" => "Parameter ID jns_barang tidak boleh kosong"));
        }
        else{
            // menetukan ID yang akan dibaca
            $jenis->id_jns_barang = $_GET['id_jns_barang'];


            // Read jenis secara detail
            $jenis->readOne();

            if($jenis->id_jns_barang != null){
                $jenis_item = array(
                    "id_jns_barang" => $jenis->id_jns_barang,
                    "nama_jns_barang" => $jenis->nama_jns_barang,
                    "aktif" => $jenis->aktif
                );

                // Set kode respon menjadi 200 ok
                http_response_code(200);

                // Buat menjadi format json
                echo json_encode($jenis_item);
            }
            else{
                // Set respon menjadi 404
                http_response_code(404);

                // Beti tahu user bahwa yang dicari tidak ada
                echo json_encode(array("message" => "Kind of good does not exist."));
            }
        }
    break;    

    case 'POST' :
    // Jika request method post

    // Melakukan pengecekan parameter apakah dikirim dengan method request body -> x-www-form-urlencoded bukan melalui raw data
        if(
            isset($_POST['nama_jns_barang'])&&
            isset($_POST['aktif'])
        )
    {
        // Menerima kiriman data dari method request POST
        $jenis->nama_jns_barang = $_POST['nama_jns_barang'];
        $jenis->aktif = $_POST['aktif'];

            // Read supplier secara detail
            
            $jenis->check();

            if($jenis->nama_jns_barang != null){
                
                // Set kode respon menjadi 400
                http_response_code(400);
                
                // Buat menjadi format json
                echo json_encode(array("Pesan" => "Nama jenis barang sudah ada, gunakan nama yang berbeda"));
                
            }
            else{ 

            // Menerima kiriman data dari method request POST
            $jenis->nama_jns_barang = $_POST['nama_jns_barang'];
            $jenis->aktif = $_POST['aktif'];

        // Membuat produk
            $jenis->create();

            // Set respon menjadi 201 created
            http_response_code(201);
            // echo json_encode(array("Pesan" => "201"));

            echo json_encode(array("Pesan" => "Jenis Barang berhasil dibuat"));
        }
    }
        // Jikalau gagal membuat produk

        else{
            // Set respon menjadi 503 layanan tidak ada

            http_response_code(503);

            // Beritahu user
            // echo json_encode(array("message" => "Tidak bisa membuat produk"));

            $result = array(
                "status_kode" => 503,
                "status_message" => "Unable to create kind of good"
            );
            echo json_encode($result);
        }   

    break;    

    case 'PUT' :
    // Jika request method put
    $data = json_decode(file_get_contents("php://input"));
            $id = $data->id_jns_barang;
            // echo 'parameter post' . $_POST['id'];
            // echo 'parameter put' . $_PUT['id'];
            if($id == "" || $id == null){
                echo json_encode(array("message" => "Parameter id tidak boleh kosong"));
            }
            else{

                $jenis->id_jns_barang = $data->id_jns_barang;
                $jenis->nama_jns_barang = $data->nama_jns_barang;
                $jenis->aktif = $data->aktif;


            if($jenis->update()){

                // Set respons menjadi 200
                http_response_code(200);

                // Beritahu penggunan
                echo json_encode(array("message" => "kind of good was updated"));

            }
            // Kalau gagal
            else{
                http_response_code(503);

                $result = array(
                    "status_kode" => 503,
                    "status_message" => "Bad Request, unable to update kind of good"
                );
                echo json_encode($result);

                // beritahu user
                echo json_encode(array("message" => "unable to update the kind of good"));
            }
            }
    break;    

    case 'DELETE' :
    // Jika request method delete

    if(!isset($_GET['id_jns_barang'])){
        echo json_encode(array("message" => "Parameter id tidak boleh kosong"));
    }
    else{

        // set id produk yang mau dihapus
        $jenis->id_jns_barang = $_GET['id_jns_barang'];

        // Hapus jenis
        if($jenis->delete()){

            // set kode respon menjadi 200 ok
            http_response_code(200);

            // Beritahu user
            echo json_encode(array("message" => "kind of good was deleted"));

        }
        // jikalau gagal menghapus
        else{

            // Sete kode respon menjadi 503 service unavailable
            http_response_code(503);

            $result = array(
                "status_kode" => 503,
                "status_message" => "Bad Request Unable to delete kind of good"
            );
            echo json_encode($result);

            // Beritahu user
            echo json_encode(array("message" => "Unable to delete kind of good"));
        }
    }
    break;   

    default :
    // Jika request method bukan get, post ataupun delete dan put
    http_response_code(404);
    echo "Request Tidak diizinkan";
}


?>