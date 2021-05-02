<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Header, Authorization, X-Requested-With");

// dapatkan koneksi database
include_once '../../v2/config/Database.php';

// Intansi untuk modelnya
include_once '../../v2/model/Customer.php';

// Koneksi ke Database
$database = new Database();
$db = $database->getConnection();

// Membuat objek customer
$customer = new Customer($db);

// Get request method dari klien
$request = $_SERVER['REQUEST_METHOD'];

//Cek request method
switch($request){
    case 'GET' :
    // Jika request method get

        if(!isset($_GET['id_cst'])&& !isset($_GET['nama_cst'])){

            $stmt = $customer->read();
            $num = $stmt->rowCount();

            // Cek data yang ada (apabila record lebih dari 0)
            if($num > 0){

                // array produk
                $customer_arr = array();
                $customer_arr["records"] = array();

                // Mengembalikan isi tabel
                // fetch () leboh cepat daripada fetchAll()
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                    // Lakukan ekstrak row untuk membuat $row['name'] menjadi $name saja
                    extract($row);

                    $customer_item = array(
                        "id_cst" => $id_cst,
                        "nama_cst" => $nama_cst,
                        "alamat_cst" => $alamat_cst,
                        "email_cst" => $email_cst,
                        "telp_cst" => $telp_cst
                    );  

                    array_push($customer_arr["records"], $customer_item);
                }

                // Set respon menjadi 200
                http_response_code(200);

                // Menunjukkan data dalam bentuk json
                echo json_encode($customer_arr);
            }
            else{
                // Tidak ada produk dan silakan set respon menjado 404 not found
                http_response_code(404);

                // Beritahu user bahwa produk tidak ditemukan
                echo json_encode(
                    array("message" => "No customers Found.")
                );
            }
        }
        elseif($_GET['id_cst'] == NULL){
            echo json_encode(array("message" => "Parameter ID customer tidak boleh kosong"));
        }
        else{
            // menetukan ID yang akan dibaca
            $customer->id_cst = $_GET['id_cst'];


            // Read customer secara detail
            $customer->readOne();

            if($customer->id_cst != null){
                $customer_item = array(
                    "id_cst" => $customer->id_cst,
                    "nama_cst" => $customer->nama_cst,
                    "alamat_cst" => $customer->alamat_cst,
                    "email_cst" => $customer->email_cst,
                    "telp_cst" => $customer->telp_cst
                );

                // Set kode respon menjadi 200 ok
                http_response_code(200);

                // Buat menjadi format json
                echo json_encode($customer_item);
            }
            else{
                // Set respon menjadi 404
                http_response_code(404);

                // Beti tahu user bahwa yang dicari tidak ada
                echo json_encode(array("message" => "Customer does not exist."));
            }
        }
    break;    

    case 'POST' :
    // Jika request method post

    // Melakukan pengecekan parameter apakah dikirim dengan method request body -> x-www-form-urlencoded bukan melalui raw data
        if(
            isset($_POST['nama_cst'])&&
            isset($_POST['alamat_cst'])&&
            isset($_POST['email_cst'])&&
            isset($_POST['telp_cst'])
        )
    {
            // Menerima kiriman data dari method request POST
            $customer->nama_cst = $_POST['nama_cst'];
            $customer->alamat_cst = $_POST['alamat_cst'];
            $customer->email_cst = $_POST['email_cst'];
            $customer->telp_cst = $_POST['telp_cst'];


            // Read customer secara detail
            
            $customer->check();
    
            if($customer->nama_cst != null){
    
                // Set kode respon menjadi 400
                http_response_code(400);
    
                // Buat menjadi format json
                echo json_encode(array("Pesan" => "Nama customer sudah ada, gunakan nama yang berbeda"));
                
            }
            else{

                // Menerima kiriman data dari method request POST
                $customer->nama_cst = $_POST['nama_cst'];
                $customer->alamat_cst = $_POST['alamat_cst'];
                $customer->email_cst = $_POST['email_cst'];
                $customer->telp_cst = $_POST['telp_cst'];

                //Eksekusi create
                $customer->create();
                
                // Set respon menjadi 201 created
                http_response_code(201);
                // echo json_encode(array("Pesan" => "201"));

                echo json_encode(array("Pesan" => "customer berhasil dibuat"));
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
                "status_message" => "Unable to create customer"
            );
            echo json_encode($result);
        }
    break;    

    case 'PUT' :
    // Jika request method put
    $data = json_decode(file_get_contents("php://input"));
            $id = $data->id_cst;
            // echo 'parameter post' . $_POST['id'];
            // echo 'parameter put' . $_PUT['id'];
            if($id == "" || $id == null){
                echo json_encode(array("message" => "Parameter id tidak boleh kosong"));
            }
            else{

                $customer->id_cst = $data->id_cst;
                $customer->nama_cst = $data->nama_cst;
                $customer->alamat_cst = $data->alamat_cst;
                $customer->email_cst = $data->email_cst;
                $customer->telp_cst = $data->telp_cst;


            if($customer->update()){

                // Set respons menjadi 200
                http_response_code(200);

                // Beritahu penggunan
                echo json_encode(array("message" => "customer was updated"));

            }
            // Kalau gagal
            else{
                http_response_code(503);

                $result = array(
                    "status_kode" => 503,
                    "status_message" => "Bad Request, unable to update customer"
                );
                echo json_encode($result);

                // beritahu user
                echo json_encode(array("message" => "unable to update the customer"));
            }
            }
    break;    

    case 'DELETE' :
    // Jika request method delete

    if(!isset($_GET['id_cst'])){
        echo json_encode(array("message" => "Parameter id tidak boleh kosong"));
    }
    else{

        // set id produk yang mau dihapus
        $customer->id_cst = $_GET['id_cst'];

        // Hapus customer
        if($customer->delete()){

            // set kode respon menjadi 200 ok
            http_response_code(200);

            // Beritahu user
            echo json_encode(array("message" => "customer was deleted"));

        }
        // jikalau gagal menghapus
        else{

            // Sete kode respon menjadi 503 service unavailable
            http_response_code(503);

            $result = array(
                "status_kode" => 503,
                "status_message" => "Bad Request Unable to delete customer"
            );
            echo json_encode($result);

            // Beritahu user
            echo json_encode(array("message" => "Unable to delete customer"));
        }
    }
    break;   

    default :
    // Jika request method bukan get, post ataupun delete dan put
    http_response_code(404);
    echo "Request Tidak diizinkan";
}


?>