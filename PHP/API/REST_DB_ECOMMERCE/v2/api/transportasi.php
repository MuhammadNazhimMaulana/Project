<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Header, Authorization, X-Requested-With");

// dapatkan koneksi database
include_once '../../v2/config/Database.php';

// Intansi untuk modelnya
include_once '../../v2/model/Transportasi.php';

// Koneksi ke Database
$database = new Database();
$db = $database->getConnection();

// Membuat objek transportasi
$transportasi = new Transportasi($db);

// Get request method dari klien
$request = $_SERVER['REQUEST_METHOD'];

//Cek request method
switch($request){
    case 'GET' :
    // Jika request method get

        if(!isset($_GET['id_transportasi'])){

            $stmt = $transportasi->read();
            $num = $stmt->rowCount();

            // Cek data yang ada (apabila record lebih dari 0)
            if($num > 0){

                // array produk
                $transportasi_arr = array();
                $transportasi_arr["records"] = array();

                // Mengembalikan isi tabel
                // fetch () leboh cepat daripada fetchAll()
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                    // Lakukan ekstrak row untuk membuat $row['name'] menjadi $name saja
                    extract($row);

                    $transportasi_item = array(
                        "id_transportasi" => $id_transportasi,
                        "jenis_transportasi" => $jenis_transportasi,
                        "nama_transportasi" => $nama_transportasi,
                        "jml_tersedia" => $jml_tersedia
                    );  

                    array_push($transportasi_arr["records"], $transportasi_item);
                }

                // Set respon menjadi 200
                http_response_code(200);

                // Menunjukkan data dalam bentuk json
                echo json_encode($transportasi_arr);
            }
            else{
                // Tidak ada produk dan silakan set respon menjado 404 not found
                http_response_code(404);

                // Beritahu user bahwa produk tidak ditemukan
                echo json_encode(
                    array("message" => "No transportations Found.")
                );
            }
        }
        elseif($_GET['id_transportasi'] == NULL){
            echo json_encode(array("message" => "Parameter ID transportasi tidak boleh kosong"));
        }
        else{
            // menetukan ID yang akan dibaca
            $transportasi->id_transportasi = $_GET['id_transportasi'];


            // Read transportasi secara detail
            $transportasi->readOne();

            if($transportasi->id_transportasi != null){
                $transportasi_item = array(
                    "id_transportasi" => $transportasi->id_transportasi,
                    "jenis_transportasi" => $transportasi->jenis_transportasi,
                    "nama_transportasi" => $transportasi->nama_transportasi,
                    "jml_tersedia" => $transportasi->jml_tersedia
                );

                // Set kode respon menjadi 200 ok
                http_response_code(200);

                // Buat menjadi format json
                echo json_encode($transportasi_item);
            }
            else{
                // Set respon menjadi 404
                http_response_code(404);

                // Beti tahu user bahwa yang dicari tidak ada
                echo json_encode(array("message" => "Transportation does not exist."));
            }
        }
    break;    

    case 'POST' :
    // Jika request method post

    // Melakukan pengecekan parameter apakah dikirim dengan method request body -> x-www-form-urlencoded bukan melalui raw data
        if(
            isset($_POST['jenis_transportasi'])&&
            isset($_POST['nama_transportasi'])&&
            isset($_POST['jml_tersedia'])
        )
    {
        // Menerima kiriman data dari method request POST
        $transportasi->jenis_transportasi = $_POST['jenis_transportasi'];
        $transportasi->nama_transportasi = $_POST['nama_transportasi'];
        $transportasi->jml_tersedia = $_POST['jml_tersedia'];


        // Read transportasi secara detail
            
            $transportasi->check();
    
            if($transportasi->nama_transportasi != null){
    
                // Set kode respon menjadi 400
                http_response_code(400);
    
                // Buat menjadi format json
                echo json_encode(array("Pesan" => "Nama transportasi sudah ada, gunakan nama yang berbeda"));
                
            }else{

            // Menerima kiriman data dari method request POST
            $transportasi->jenis_transportasi = $_POST['jenis_transportasi'];
            $transportasi->nama_transportasi = $_POST['nama_transportasi'];
            $transportasi->jml_tersedia = $_POST['jml_tersedia'];

            $transportasi->create();
            // Set respon menjadi 201 created
            http_response_code(201);
            // echo json_encode(array("Pesan" => "201"));

            echo json_encode(array("Pesan" => "transportasi berhasil dibuat"));
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
                "status_message" => "Unable to create transportation"
            );
            echo json_encode($result);
        }

        break;    

    case 'PUT' :
    // Jika request method put
    $data = json_decode(file_get_contents("php://input"));
            $id = $data->id_transportasi;
            // echo 'parameter post' . $_POST['id'];
            // echo 'parameter put' . $_PUT['id'];
            if($id == "" || $id == null){
                echo json_encode(array("message" => "Parameter id tidak boleh kosong"));
            }
            else{

                $transportasi->id_transportasi = $data->id_transportasi;
                $transportasi->jenis_transportasi = $data->jenis_transportasi;
                $transportasi->nama_transportasi = $data->nama_transportasi;
                $transportasi->jml_tersedia = $data->jml_tersedia;


            if($transportasi->update()){

                // Set respons menjadi 200
                http_response_code(200);

                // Beritahu penggunan
                echo json_encode(array("message" => "transportation was updated"));

            }
            // Kalau gagal
            else{
                http_response_code(503);

                $result = array(
                    "status_kode" => 503,
                    "status_message" => "Bad Request, unable to update transportation"
                );
                echo json_encode($result);

                // beritahu user
                echo json_encode(array("message" => "unable to update the transportation"));
            }
            }
    break;    

    case 'DELETE' :
    // Jika request method delete

    if(!isset($_GET['id_transportasi'])){
        echo json_encode(array("message" => "Parameter id tidak boleh kosong"));
    }
    else{

        // set id produk yang mau dihapus
        $transportasi->id_transportasi = $_GET['id_transportasi'];

        // Hapus transportasi
        if($transportasi->delete()){

            // set kode respon menjadi 200 ok
            http_response_code(200);

            // Beritahu user
            echo json_encode(array("message" => "transportation was deleted"));

        }
        // jikalau gagal menghapus
        else{

            // Sete kode respon menjadi 503 service unavailable
            http_response_code(503);

            $result = array(
                "status_kode" => 503,
                "status_message" => "Bad Request Unable to delete transportation"
            );
            echo json_encode($result);

            // Beritahu user
            echo json_encode(array("message" => "Unable to delete transportation"));
        }
    }
    break;   

    default :
    // Jika request method bukan get, post ataupun delete dan put
    http_response_code(404);
    echo "Request Tidak diizinkan";
}


?>