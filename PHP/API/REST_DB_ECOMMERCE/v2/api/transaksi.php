<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Header, Authorization, X-Requested-With");

// dapatkan koneksi database
include_once '../../v2/config/Database.php';

// Intansi untuk modelnya
include_once '../../v2/model/Transaksi.php';

// Koneksi ke Database
$database = new Database();
$db = $database->getConnection();

// Membuat objek transaksi
$transaksi = new Transaksi($db);

// Get request method dari klien
$request = $_SERVER['REQUEST_METHOD'];

//Cek request method
switch($request){
    case 'GET' :
    // Jika request method get

        if(!isset($_GET['id_transaksi'])){

            $stmt = $transaksi->read();
            $num = $stmt->rowCount();

            // Cek data yang ada (apabila record lebih dari 0)
            if($num > 0){

                // array produk
                $transaksi_arr = array();
                $transaksi_arr["records"] = array();

                // Mengembalikan isi tabel
                // fetch () leboh cepat daripada fetchAll()
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                    // Lakukan ekstrak row untuk membuat $row['name'] menjadi $name saja
                    extract($row);

                    $transaksi_item = array(
                        "id_transaksi" => $id_transaksi,
                        "id_cst" => $id_cst,
                        "cst" => $cst,
                        "id_kirim" => $id_kirim,
                        "kirim" => $kirim,
                        "id_barang" => $id_barang,
                        "barang" => $barang,
                        "tgl_transaksi" => $tgl_transaksi,
                        "keterangan" => $keterangan
                    );  

                    array_push($transaksi_arr["records"], $transaksi_item);
                }

                // Set respon menjadi 200
                http_response_code(200);

                // Menunjukkan data dalam bentuk json
                echo json_encode($transaksi_arr);
            }
            else{
                // Tidak ada produk dan silakan set respon menjado 404 not found
                http_response_code(404);

                // Beritahu user bahwa produk tidak ditemukan
                echo json_encode(
                    array("message" => "No transaksi Found.")
                );
            }
        }
        elseif($_GET['id_transaksi'] == NULL){
            echo json_encode(array("message" => "Parameter ID transaksi tidak boleh kosong"));
        }
        else{
            // menetukan ID yang akan dibaca
            $transaksi->id_transaksi = $_GET['id_transaksi'];


            // Read transaksi secara detail
            $transaksi->readOne();

            if($transaksi->id_transaksi != null){
                $transaksi_item = array(
                    "id_transaksi" => $transaksi->id_transaksi,
                    "id_cst" => $transaksi->id_cst,
                    "cst" => $transaksi->cst,
                    "id_kirim" => $transaksi->id_kirim,
                    "kirim" => $transaksi->kirim,
                    "id_barang" => $transaksi->id_barang,
                    "barang" => $transaksi->barang,
                    "tgl_transaksi" => $transaksi->tgl_transaksi,
                    "keterangan" => $transaksi->keterangan
                );

                // Set kode respon menjadi 200 ok
                http_response_code(200);

                // Buat menjadi format json
                echo json_encode($transaksi_item);
            }
            else{
                // Set respon menjadi 404
                http_response_code(404);

                // Beti tahu user bahwa yang dicari tidak ada
                echo json_encode(array("message" => "Transaction does not exist."));
            }
        }
    break;    

    case 'POST' :
    // Jika request method post

    // Melakukan pengecekan parameter apakah dikirim dengan method request body -> x-www-form-urlencoded bukan melalui raw data
        if(
            isset($_POST['id_cst'])&&
            isset($_POST['id_kirim'])&&
            isset($_POST['id_barang'])&&
            isset($_POST['tgl_transaksi'])&&
            isset($_POST['keterangan'])
        )
    {
            // Menerima kiriman data dari method request POST
            $transaksi->id_cst = $_POST['id_cst'];
            $transaksi->id_kirim = $_POST['id_kirim'];
            $transaksi->id_barang = $_POST['id_barang'];
            $transaksi->tgl_transaksi = $_POST['tgl_transaksi'];
            $transaksi->keterangan = $_POST['keterangan'];


                //Eksekusi create
                $transaksi->create();
                
                // Set respon menjadi 201 created
                http_response_code(201);
                // echo json_encode(array("Pesan" => "201"));

                echo json_encode(array("Pesan" => "Transaction berhasil dibuat"));
        }
        // Jikalau gagal membuat produk

        else{
            // Set respon menjadi 503 layanan tidak ada

            http_response_code(503);

            // Beritahu user
            // echo json_encode(array("message" => "Tidak bisa membuat produk"));

            $result = array(
                "status_kode" => 503,
                "status_message" => "Unable to create transaction"
            );
            echo json_encode($result);
        }
    break;    

    case 'PUT' :
    // Jika request method put
    $data = json_decode(file_get_contents("php://input"));
            $id = $data->id_transaksi;
            // echo 'parameter post' . $_POST['id'];
            // echo 'parameter put' . $_PUT['id'];
            if($id == "" || $id == null){
                echo json_encode(array("message" => "Parameter id tidak boleh kosong"));
            }
            else{

                $transaksi->id_transaksi = $data->id_transaksi;
                $transaksi->id_cst = $data->id_cst;
                $transaksi->id_kirim = $data->id_kirim;
                $transaksi->id_barang = $data->id_barang;
                $transaksi->tgl_transaksi = $data->tgl_transaksi;
                $transaksi->keterangan = $data->keterangan;


            if($transaksi->update()){

                // Set respons menjadi 200
                http_response_code(200);

                // Beritahu penggunan
                echo json_encode(array("message" => "transaction was updated"));

            }
            // Kalau gagal
            else{
                http_response_code(503);

                $result = array(
                    "status_kode" => 503,
                    "status_message" => "Bad Request, unable to update transaction"
                );
                echo json_encode($result);

                // beritahu user
                echo json_encode(array("message" => "unable to update the transaction"));
            }
            }
    break;    

    case 'DELETE' :
    // Jika request method delete

    if(!isset($_GET['id_transaksi'])){
        echo json_encode(array("message" => "Parameter id tidak boleh kosong"));
    }
    else{

        // set id produk yang mau dihapus
        $transaksi->id_transaksi = $_GET['id_transaksi'];

        // Hapus transaksi
        if($transaksi->delete()){

            // set kode respon menjadi 200 ok
            http_response_code(200);

            // Beritahu user
            echo json_encode(array("message" => "transaction was deleted"));

        }
        // jikalau gagal menghapus
        else{

            // Sete kode respon menjadi 503 service unavailable
            http_response_code(503);

            $result = array(
                "status_kode" => 503,
                "status_message" => "Bad Request Unable to delete transaction"
            );
            echo json_encode($result);

            // Beritahu user
            echo json_encode(array("message" => "Unable to delete transaction"));
        }
    }
    break;   

    default :
    // Jika request method bukan get, post ataupun delete dan put
    http_response_code(404);
    echo "Request Tidak diizinkan";
}


?>