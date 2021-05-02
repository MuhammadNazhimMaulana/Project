<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Header, Authorization, X-Requested-With");

// dapatkan koneksi database
include_once '../../v2/config/Database.php';

// Intansi untuk modelnya
include_once '../../v2/model/Barang.php';

// Koneksi ke Database
$database = new Database();
$db = $database->getConnection();

// Membuat objek barang
$barang = new Barang($db);

// Get request method dari klien
$request = $_SERVER['REQUEST_METHOD'];

//Cek request method
switch($request){
    case 'GET' :
    // Jika request method get

        if(!isset($_GET['id_barang'])){

            $stmt = $barang->read();
            $num = $stmt->rowCount();

            // Cek data yang ada (apabila record lebih dari 0)
            if($num > 0){

                // array produk
                $barang_arr = array();
                $barang_arr["records"] = array();

                // Mengembalikan isi tabel
                // fetch () leboh cepat daripada fetchAll()
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                    // Lakukan ekstrak row untuk membuat $row['name'] menjadi $name saja
                    extract($row);

                    $barang_item = array(
                        "id_barang" => $id_barang,
                        "id_supplier" => $id_supplier,
                        "supplier" => $supplier,
                        "id_jns_barang" => $id_jns_barang,
                        "jns_barang" => $jns_barang,
                        "nama_barang" => $nama_barang,
                        "harga" => $harga
                    );  

                    array_push($barang_arr["records"], $barang_item);
                }

                // Set respon menjadi 200
                http_response_code(200);

                // Menunjukkan data dalam bentuk json
                echo json_encode($barang_arr);
            }
            else{
                // Tidak ada produk dan silakan set respon menjado 404 not found
                http_response_code(404);

                // Beritahu user bahwa produk tidak ditemukan
                echo json_encode(
                    array("message" => "No barangs Found.")
                );
            }
        }
        elseif($_GET['id_barang'] == NULL){
            echo json_encode(array("message" => "Parameter ID barang tidak boleh kosong"));
        }
        else{
            // menetukan ID yang akan dibaca
            $barang->id_barang = $_GET['id_barang'];


            // Read barang secara detail
            $barang->readOne();

            if($barang->id_barang != null){
                $barang_item = array(
                    "id_barang" => $barang->id_barang,
                    "id_supplier" => $barang->id_supplier,
                    "supplier" => $barang->supplier,
                    "id_jns_barang" => $barang->id_jns_barang,
                    "jns_barang" => $barang->jns_barang,
                    "nama_barang" => $barang->nama_barang,
                    "harga" => $barang->harga
                );

                // Set kode respon menjadi 200 ok
                http_response_code(200);

                // Buat menjadi format json
                echo json_encode($barang_item);
            }
            else{
                // Set respon menjadi 404
                http_response_code(404);

                // Beti tahu user bahwa yang dicari tidak ada
                echo json_encode(array("message" => "barang does not exist."));
            }
        }
    break;    

    case 'POST' :
    // Jika request method post

    // Melakukan pengecekan parameter apakah dikirim dengan method request body -> x-www-form-urlencoded bukan melalui raw data
        if(
            isset($_POST['id_supplier'])&&
            isset($_POST['id_jns_barang'])&&
            isset($_POST['nama_barang'])&&
            isset($_POST['harga'])
        )
    {
            // Menerima kiriman data dari method request POST
            $barang->id_supplier = $_POST['id_supplier'];
            $barang->id_jns_barang = $_POST['id_jns_barang'];
            $barang->nama_barang = $_POST['nama_barang'];
            $barang->harga = $_POST['harga'];


            // Read barang secara detail
            
            $barang->check();
    
            if($barang->nama_barang != null){
    
                // Set kode respon menjadi 400
                http_response_code(400);
    
                // Buat menjadi format json
                echo json_encode(array("Pesan" => "Nama barang sudah ada, gunakan nama yang berbeda"));
                
            }
            else{

                // Menerima kiriman data dari method request POST
                $barang->id_supplier = $_POST['id_supplier'];
                $barang->id_jns_barang = $_POST['id_jns_barang'];
                $barang->nama_barang = $_POST['nama_barang'];
                $barang->harga = $_POST['harga'];

                //Eksekusi create
                $barang->create();
                
                // Set respon menjadi 201 created
                http_response_code(201);
                // echo json_encode(array("Pesan" => "201"));

                echo json_encode(array("Pesan" => "Goods berhasil dibuat"));
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
                "status_message" => "Unable to create goods"
            );
            echo json_encode($result);
        }
    break;    

    case 'PUT' :
    // Jika request method put
    $data = json_decode(file_get_contents("php://input"));
            $id = $data->id_barang;
            // echo 'parameter post' . $_POST['id'];
            // echo 'parameter put' . $_PUT['id'];
            if($id == "" || $id == null){
                echo json_encode(array("message" => "Parameter id tidak boleh kosong"));
            }
            else{

                $barang->id_barang = $data->id_barang;
                $barang->id_supplier = $data->id_supplier;
                $barang->id_jns_barang = $data->id_jns_barang;
                $barang->nama_barang = $data->nama_barang;
                $barang->harga = $data->harga;


            if($barang->update()){

                // Set respons menjadi 200
                http_response_code(200);

                // Beritahu penggunan
                echo json_encode(array("message" => "goods was updated"));

            }
            // Kalau gagal
            else{
                http_response_code(503);

                $result = array(
                    "status_kode" => 503,
                    "status_message" => "Bad Request, unable to update goods"
                );
                echo json_encode($result);

                // beritahu user
                echo json_encode(array("message" => "unable to update the goods"));
            }
            }
    break;    

    case 'DELETE' :
    // Jika request method delete

    if(!isset($_GET['id_barang'])){
        echo json_encode(array("message" => "Parameter id tidak boleh kosong"));
    }
    else{

        // set id produk yang mau dihapus
        $barang->id_barang = $_GET['id_barang'];

        // Hapus barang
        if($barang->delete()){

            // set kode respon menjadi 200 ok
            http_response_code(200);

            // Beritahu user
            echo json_encode(array("message" => "goods was deleted"));

        }
        // jikalau gagal menghapus
        else{

            // Sete kode respon menjadi 503 service unavailable
            http_response_code(503);

            $result = array(
                "status_kode" => 503,
                "status_message" => "Bad Request Unable to delete goods"
            );
            echo json_encode($result);

            // Beritahu user
            echo json_encode(array("message" => "Unable to delete goods"));
        }
    }
    break;   

    default :
    // Jika request method bukan get, post ataupun delete dan put
    http_response_code(404);
    echo "Request Tidak diizinkan";
}


?>