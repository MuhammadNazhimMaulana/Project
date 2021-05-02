<?php 
class Transaksi{

    // Koneksi database
    private $conn;
    private $table_name = "tbl_transaksi";

    // Properti objek
    public $id_transaksi;
    public $id_cst;
    public $cst;
    public $id_kirim;
    public $kirim;
    public $id_barang;
    public $barang;
    public $tgl_transaksi;
    public $keterangan;


    // Constructor dengan DB
    public function __construct($db){
        $this->conn = $db;
    }

    // Membaca semua produk
    function read(){
    
        $query = "SELECT 
                   a.id_transaksi, 
                   a.id_cst, 
                   b.nama_cst as cst, 
                   a.id_kirim,
                   c.tgl_pengiriman as kirim, 
                   a.id_barang, 
                   d.nama_barang as barang, 
                   a.tgl_transaksi,
                   a.keterangan
                  FROM
                    " . $this->table_name . " a
                  JOIN
                  tbl_customer b ON a.id_cst = b.id_cst
                  JOIN
                  tbl_pengiriman c ON a.id_kirim = c.id_kirim
                  JOIN
                  tbl_barang d ON a.id_barang = d.id_barang
                  ORDER BY
                    a.id_transaksi ASC";

        // Prepare Query
        $stmt = $this->conn->prepare($query);

        // Eksekusi query
        $stmt->execute();
        return $stmt;
    }
    
    // Membaca satu produk saja
    function readOne(){
        
      $query = "SELECT 
                   a.id_transaksi, 
                   a.id_cst, 
                   b.nama_cst as cst, 
                   a.id_kirim,
                   c.tgl_pengiriman as kirim, 
                   a.id_barang, 
                   d.nama_barang as barang, 
                   a.tgl_transaksi,
                   a.keterangan
              FROM
                " . $this->table_name . " a
                  JOIN
                  tbl_customer b ON a.id_cst = b.id_cst
                  JOIN
                  tbl_pengiriman c ON a.id_kirim = c.id_kirim
                  JOIN
                  tbl_barang d ON a.id_barang = d.id_barang
              WHERE
                  a.id_transaksi = ?";
    
            // Prepare Query
            $stmt = $this->conn->prepare($query);

            // Bind Param 
            $stmt->bindParam(1, $this->id_transaksi);
    
            // Eksekusi query
            $stmt->execute();
            
            // Dapatakan row 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Buat value menjadi sebuah objek
            $this->id_transaksi = $row["id_transaksi"];
            $this->id_cst = $row["id_cst"];
            $this->cst = $row["cst"];
            $this->id_kirim = $row["id_kirim"];
            $this->kirim = $row["kirim"];
            $this->id_barang = $row["id_barang"];
            $this->barang = $row["barang"];
            $this->tgl_transaksi = $row["tgl_transaksi"];
            $this->keterangan = $row["keterangan"];
            
          }

          // Membuat product
          function create(){

        // Query untuk melakukan insert
        $query = "INSERT INTO 
                    " . $this->table_name . "
                  SET
                    id_cst = :id_cst,
                    id_kirim = :id_kirim,
                    id_barang = :id_barang,
                    tgl_transaksi = :tgl_transaksi,
                    keterangan = :keterangan";

        // Siapkan query
        $stmt = $this->conn->prepare($query);

        // bind values
        $stmt->bindParam(":id_cst", $this->id_cst);
        $stmt->bindParam(":id_kirim", $this->id_kirim);
        $stmt->bindParam(":id_barang", $this->id_barang);
        $stmt->bindParam(":tgl_transaksi", $this->tgl_transaksi);
        $stmt->bindParam(":keterangan", $this->keterangan);
        
        // Eksekusi query
        if($stmt->execute()){
            return true;
        }
        
        return false;
    }
    
    // Update product
    function update(){
        // Query update
        $query = "UPDATE
                    " . $this->table_name . "
                  SET 
                        id_transaksi = :id_transaksi,
                        id_cst = :id_cst,                     
                        id_kirim = :id_kirim,                     
                        id_barang = :id_barang,                     
                        tgl_transaksi = :tgl_transaksi,                     
                        keterangan = :keterangan                     
                  WHERE
                        id_transaksi = :id_transaksi";
                  
                  // Prepare statement
                  $stmt = $this->conn->prepare($query);
                  
                  //Bind value baru
                  $stmt->bindParam(":id_transaksi", $this->id_transaksi);
                  $stmt->bindParam(":id_cst", $this->id_cst);
                  $stmt->bindParam(":id_kirim", $this->id_kirim);
                  $stmt->bindParam(":id_barang", $this->id_barang);
                  $stmt->bindParam(":tgl_transaksi", $this->tgl_transaksi);
                  $stmt->bindParam(":keterangan", $this->keterangan);
                    
                  // Eksekusi query
                  if($stmt->execute()){
                      return true;
                  }
                      
                      return false;
                }
                // Hapus product
                function delete(){
                    //Query untuk delete

                    $query = "DELETE FROM " . $this->table_name . " WHERE id_transaksi = ?";

                    // Prepare query 
                    $stmt = $this->conn->prepare($query);

                    //bind id yang mau dihapus
                    $stmt->bindParam(1, $this->id_transaksi);

                    // Eksekusi query
                    if($stmt->execute()){
                        return true;
                    }

                    return false;
                }
            }
            
            ?>