<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Header, Authorization, X-Requested-With");

// dapatkan koneksi database
include_once '../../v2/config/Database.php';

// Intansi untuk modelnya
include_once '../../v2/model/Pengiriman.php';

// Koneksi ke Database
$database = new Database();
$db = $database->getConnection();

// Membuat objek pengiriman
$pengiriman = new Pengiriman($db);

// Get request method dari klien
$request = $_SERVER['REQUEST_METHOD'];

//Cek request method
switch($request){
    case 'GET' :
    // Jika request method get

        if(!isset($_GET['id_kirim'])){

            $stmt = $pengiriman->read();
            $num = $stmt->rowCount();

            // Cek data yang ada (apabila record lebih dari 0)
            if($num > 0){

                // array produk
                $pengiriman_arr = array();
                $pengiriman_arr["records"] = array();

                // Mengembalikan isi tabel
                // fetch () leboh cepat daripada fetchAll()
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                    // Lakukan ekstrak row untuk membuat $row['name'] menjadi $name saja
                    extract($row);

                    $pengiriman_item = array(
                        "id_kirim" => $id_kirim,
                        "id_transportasi" => $id_transportasi,
                        "transport" => $transport,
                        "tgl_pengiriman" => $tgl_pengiriman
                    );  

                    array_push($pengiriman_arr["records"], $pengiriman_item);
                }

                // Set respon menjadi 200
                http_response_code(200);

                // Menunjukkan data dalam bentuk json
                echo json_encode($pengiriman_arr);
            }
            else{
                // Tidak ada produk dan silakan set respon menjado 404 not found
                http_response_code(404);

                // Beritahu user bahwa produk tidak ditemukan
                echo json_encode(
                    array("message" => "No deliverys Found.")
                );
            }
        }
        elseif($_GET['id_kirim'] == NULL){
            echo json_encode(array("message" => "Parameter ID pengiriman tidak boleh kosong"));
        }
        else{
            // menetukan ID yang akan dibaca
            $pengiriman->id_kirim = $_GET['id_kirim'];


            // Read pengiriman secara detail
            $pengiriman->readOne();

            if($pengiriman->id_kirim != null){
                $pengiriman_item = array(
                    "id_kirim" => $pengiriman->id_kirim,
                    "id_transportasi" => $pengiriman->id_transportasi,
                    "transport" => $pengiriman->transport,
                    "tgl_pengiriman" => $pengiriman->tgl_pengiriman
                );

                // Set kode respon menjadi 200 ok
                http_response_code(200);

                // Buat menjadi format json
                echo json_encode($pengiriman_item);
            }
            else{
                // Set respon menjadi 404
                http_response_code(404);

                // Beti tahu user bahwa yang dicari tidak ada
                echo json_encode(array("message" => "Delivery does not exist."));
            }
        }
    break;    

    case 'POST' :
    // Jika request method post

    // Melakukan pengecekan parameter apakah dikirim dengan method request body -> x-www-form-urlencoded bukan melalui raw data
        if(
            isset($_POST['id_transportasi'])&&
            isset($_POST['tgl_pengiriman'])
        )
    {
        // Menerima kiriman data dari method request POST
        $pengiriman->id_transportasi = $_POST['id_transportasi'];
        $pengiriman->tgl_pengiriman = $_POST['tgl_pengiriman'];

        // Membuat produk
        if($pengiriman->create()){

            // Set respon menjadi 201 created
            http_response_code(201);
            // echo json_encode(array("Pesan" => "201"));

            echo json_encode(array("Pesan" => "pengiriman berhasil dibuat"));
        }

        // Jikalau gagal membuat produk

        else{
            // Set respon menjadi 503 layanan tidak ada

            http_response_code(503);

            // Beritahu user
            // echo json_encode(array("message" => "Tidak bisa membuat produk"));

            $result = array(
                "status_kode" => 503,
                "status_message" => "Unable to create delivery"
            );
            echo json_encode($result);
        }
    }else{
            // Set respon menajdi 400 - bad request
            http_response_code(400);

            // Beritahu user

            $result = array(
                "status_kode" => 400,
                "status_message" => "Unable to create delivery"
            );
            echo json_encode($result);
            
    }
    break;    

    case 'PUT' :
    // Jika request method put
    $data = json_decode(file_get_contents("php://input"));
            $id = $data->id_kirim;
            // echo 'parameter post' . $_POST['id'];
            // echo 'parameter put' . $_PUT['id'];
            if($id == "" || $id == null){
                echo json_encode(array("message" => "Parameter id tidak boleh kosong"));
            }
            else{

                $pengiriman->id_kirim = $data->id_kirim;
                $pengiriman->id_transportasi = $data->id_transportasi;
                $pengiriman->tgl_pengiriman = $data->tgl_pengiriman;


            if($pengiriman->update()){

                // Set respons menjadi 200
                http_response_code(200);

                // Beritahu penggunan
                echo json_encode(array("message" => "delivery was updated"));

            }
            // Kalau gagal
            else{
                http_response_code(503);

                $result = array(
                    "status_kode" => 503,
                    "status_message" => "Bad Request, unable to update delivery"
                );
                echo json_encode($result);

                // beritahu user
                echo json_encode(array("message" => "unable to update the delivery"));
            }
            }
    break;    

    case 'DELETE' :
    // Jika request method delete

    if(!isset($_GET['id_kirim'])){
        echo json_encode(array("message" => "Parameter id tidak boleh kosong"));
    }
    else{

        // set id produk yang mau dihapus
        $pengiriman->id_kirim = $_GET['id_kirim'];

        // Hapus pengiriman
        if($pengiriman->delete()){

            // set kode respon menjadi 200 ok
            http_response_code(200);

            // Beritahu user
            echo json_encode(array("message" => "delivery was deleted"));

        }
        // jikalau gagal menghapus
        else{

            // Sete kode respon menjadi 503 service unavailable
            http_response_code(503);

            $result = array(
                "status_kode" => 503,
                "status_message" => "Bad Request Unable to delete delivery"
            );
            echo json_encode($result);

            // Beritahu user
            echo json_encode(array("message" => "Unable to delete delivery"));
        }
    }
    break;   

    default :
    // Jika request method bukan get, post ataupun delete dan put
    http_response_code(404);
    echo "Request Tidak diizinkan";
}


?>