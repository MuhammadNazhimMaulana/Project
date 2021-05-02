<?php 
class Jenis{

    // Koneksi database
    private $conn;
    private $table_name = "tbl_jns_barang";

    // Properti objek
    public $id_jns_barang;
    public $nama_jns_barang;
    public $aktif;


    // Constructor dengan DB
    public function __construct($db){
        $this->conn = $db;
    }

    // Membaca semua produk
    function read(){
    
        $query = "SELECT 
                    id_jns_barang, nama_jns_barang, aktif
                  FROM
                    " . $this->table_name . "
                  ORDER BY
                    id_jns_barang ASC";

        // Prepare Query
        $stmt = $this->conn->prepare($query);

        // Eksekusi query
        $stmt->execute();
        return $stmt;
    }
    
    // Membaca satu produk saja
    function readOne(){
        
            $query = "SELECT 
                        id_jns_barang, nama_jns_barang, aktif
                      FROM
                        " . $this->table_name . "
                      WHERE 
                        id_jns_barang = ?";
    
            // Prepare Query
            $stmt = $this->conn->prepare($query);

            // Bind Param 
            $stmt->bindParam(1, $this->id_jns_barang);
    
            // Eksekusi query
            $stmt->execute();
            
            // Dapatakan row 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Buat value menjadi sebuah objek
            $this->nama_jns_barang = $row["nama_jns_barang"];
            $this->aktif = $row["aktif"];
            
          }

    // Membaca satu produk saja
    function check(){
        
            $query = "SELECT 
                        id_jns_barang, nama_jns_barang, aktif
                      FROM
                        " . $this->table_name . "
                      WHERE 
                        nama_jns_barang = ?";
    
            // Prepare Query
            $stmt = $this->conn->prepare($query);

            // Bind Param 
            $stmt->bindParam(1, $this->nama_jns_barang);
    
            // Eksekusi query
            $stmt->execute();
            
            // Dapatakan row 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Buat value menjadi sebuah objek
            $this->id_jns_barang = $row["id_jns_barang"];
            $this->nama_jns_barang = $row["nama_jns_barang"];
            $this->aktif = $row["aktif"];
            
          }

          // Membuat product
          function create(){

        // Query untuk melakukan insert
        $query = "INSERT INTO 
                    " . $this->table_name . "
                  SET
                    nama_jns_barang = :nama_jns_barang,
                    aktif = :aktif";

        // Siapkan query
        $stmt = $this->conn->prepare($query);

        // bind values
        $stmt->bindParam(":nama_jns_barang", $this->nama_jns_barang);
        $stmt->bindParam(":aktif", $this->aktif);
        
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
                        nama_jns_barang = :nama_jns_barang,
                        aktif = :aktif                     
                  WHERE
                        id_jns_barang = :id_jns_barang";
                  
                  // Prepare statement
                  $stmt = $this->conn->prepare($query);
                  
                  //Bind value baru
                  $stmt->bindParam(":nama_jns_barang", $this->nama_jns_barang);
                  $stmt->bindParam(":aktif", $this->aktif);
                  $stmt->bindParam(":id_jns_barang", $this->id_jns_barang);
                    
                  // Eksekusi query
                  if($stmt->execute()){
                      return true;
                  }
                      
                      return false;
                }
                // Hapus product
                function delete(){
                    //Query untuk delete

                    $query = "DELETE FROM " . $this->table_name . " WHERE id_jns_barang = ?";

                    // Prepare query 
                    $stmt = $this->conn->prepare($query);

                    //bind id yang mau dihapus
                    $stmt->bindParam(1, $this->id_jns_barang);

                    // Eksekusi query
                    if($stmt->execute()){
                        return true;
                    }

                    return false;
                }
            }
            
            ?>