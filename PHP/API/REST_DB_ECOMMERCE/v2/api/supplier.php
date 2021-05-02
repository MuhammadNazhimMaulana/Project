<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Header, Authorization, X-Requested-With");

// dapatkan koneksi database
include_once '../../v2/config/Database.php';

// Intansi untuk modelnya
include_once '../../v2/model/Supplier.php';

// Koneksi ke Database
$database = new Database();
$db = $database->getConnection();

// Membuat objek supplier
$supplier = new Supplier($db);

// Get request method dari klien
$request = $_SERVER['REQUEST_METHOD'];

//Cek request method
switch($request){
    case 'GET' :
    // Jika request method get

        if(!isset($_GET['id_supplier'])){

            $stmt = $supplier->read();
            $num = $stmt->rowCount();

            // Cek data yang ada (apabila record lebih dari 0)
            if($num > 0){

                // array produk
                $supplier_arr = array();
                $supplier_arr["records"] = array();

                // Mengembalikan isi tabel
                // fetch () leboh cepat daripada fetchAll()
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                    // Lakukan ekstrak row untuk membuat $row['name'] menjadi $name saja
                    extract($row);

                    $supplier_item = array(
                        "id_supplier" => $id_supplier,
                        "nama_supplier" => $nama_supplier,
                        "alamat_supplier" => $alamat_supplier,
                        "tlp_supplier" => $tlp_supplier
                    );  

                    array_push($supplier_arr["records"], $supplier_item);
                }

                // Set respon menjadi 200
                http_response_code(200);

                // Menunjukkan data dalam bentuk json
                echo json_encode($supplier_arr);
            }
            else{
                // Tidak ada produk dan silakan set respon menjado 404 not found
                http_response_code(404);

                // Beritahu user bahwa produk tidak ditemukan
                echo json_encode(
                    array("message" => "No suppliers Found.")
                );
            }
        }
        elseif($_GET['id_supplier'] == NULL){
            echo json_encode(array("message" => "Parameter ID Supplier tidak boleh kosong"));
        }
        else{
            // menetukan ID yang akan dibaca
            $supplier->id_supplier = $_GET['id_supplier'];


            // Read supplier secara detail
            $supplier->readOne();

            if($supplier->id_supplier != null){
                $supplier_item = array(
                    "id_supplier" => $supplier->id_supplier,
                    "nama_supplier" => $supplier->nama_supplier,
                    "alamat_supplier" => $supplier->alamat_supplier,
                    "tlp_supplier" => $supplier->tlp_supplier
                );

                // Set kode respon menjadi 200 ok
                http_response_code(200);

                // Buat menjadi format json
                echo json_encode($supplier_item);
            }
            else{
                // Set respon menjadi 404
                http_response_code(404);

                // Beti tahu user bahwa yang dicari tidak ada
                echo json_encode(array("message" => "Suppliers does not exist."));
            }
        }
    break;    

    case 'POST' :
    // Jika request method post

    // Melakukan pengecekan parameter apakah dikirim dengan method request body -> x-www-form-urlencoded bukan melalui raw data
        if(
            isset($_POST['nama_supplier'])&&
            isset($_POST['alamat_supplier'])&&
            isset($_POST['tlp_supplier'])
        )
     {
            // Menerima kiriman data dari method request POST
            $supplier->nama_supplier = $_POST['nama_supplier'];
            $supplier->alamat_supplier = $_POST['alamat_supplier'];
            $supplier->tlp_supplier = $_POST['tlp_supplier'];
            
            // Read supplier secara detail
            
            $supplier->check();
            if($supplier->nama_supplier != null){
                
                // Set kode respon menjadi 400
                http_response_code(400);
                
                // Buat menjadi format json
                echo json_encode(array("Pesan" => "Nama supplier sudah ada, gunakan nama yang berbeda"));
                
            }
            else{
                
                $supplier->nama_supplier = $_POST['nama_supplier'];
                $supplier->alamat_supplier = $_POST['alamat_supplier'];
                $supplier->tlp_supplier = $_POST['tlp_supplier'];
                
                $supplier->create();
                // Set respon menjadi 201 created
                http_response_code(201);
                // echo json_encode(array("Pesan" => "201"));
                
                echo json_encode(array("Pesan" => "supplier berhasil dibuat"));
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
                "status_message" => "Unable to create supplier"
            );
            echo json_encode($result);
        }

        break;    

    case 'PUT' :
    // Jika request method put
    $data = json_decode(file_get_contents("php://input"));
            $id = $data->id_supplier;
            // echo 'parameter post' . $_POST['id'];
            // echo 'parameter put' . $_PUT['id'];
            if($id == "" || $id == null){
                echo json_encode(array("message" => "Parameter id tidak boleh kosong"));
            }
            else{

                $supplier->id_supplier = $data->id_supplier;
                $supplier->nama_supplier = $data->nama_supplier;
                $supplier->alamat_supplier = $data->alamat_supplier;
                $supplier->tlp_supplier = $data->tlp_supplier;


            if($supplier->update()){

                // Set respons menjadi 200
                http_response_code(200);

                // Beritahu penggunan
                echo json_encode(array("message" => "supplier was updated"));

            }
            // Kalau gagal
            else{
                http_response_code(503);

                $result = array(
                    "status_kode" => 503,
                    "status_message" => "Bad Request, unable to update supplier"
                );
                echo json_encode($result);

                // beritahu user
                echo json_encode(array("message" => "unable to update the supplier"));
            }
            }
    break;    

    case 'DELETE' :
    // Jika request method delete

    if(!isset($_GET['id_supplier'])){
        echo json_encode(array("message" => "Parameter id tidak boleh kosong"));
    }
    else{

        // set id produk yang mau dihapus
        $supplier->id_supplier = $_GET['id_supplier'];

        // Hapus supplier
        if($supplier->delete()){

            // set kode respon menjadi 200 ok
            http_response_code(200);

            // Beritahu user
            echo json_encode(array("message" => "supplier was deleted"));

        }
        // jikalau gagal menghapus
        else{

            // Sete kode respon menjadi 503 service unavailable
            http_response_code(503);

            $result = array(
                "status_kode" => 503,
                "status_message" => "Bad Request Unable to delete supplier"
            );
            echo json_encode($result);

            // Beritahu user
            echo json_encode(array("message" => "Unable to delete supplier"));
        }
    }
    break;   

    default :
    // Jika request method bukan get, post ataupun delete dan put
    http_response_code(404);
    echo "Request Tidak diizinkan";
}


?>