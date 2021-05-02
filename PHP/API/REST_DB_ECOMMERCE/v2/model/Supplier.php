<?php 
class Supplier{

    // Koneksi database
    private $conn;
    private $table_name = "tbl_supplier";

    // Properti objek
    public $id_supplier;
    public $nama_supplier;
    public $alamat_supplier;
    public $tlp_supplier;


    // Constructor dengan DB
    public function __construct($db){
        $this->conn = $db;
    }

    // Membaca semua produk
    function read(){
    
        $query = "SELECT 
                   id_supplier, nama_supplier, alamat_supplier, tlp_supplier
                  FROM
                    " . $this->table_name . "
                  ORDER BY
                    id_supplier ASC";

        // Prepare Query
        $stmt = $this->conn->prepare($query);

        // Eksekusi query
        $stmt->execute();
        return $stmt;
    }
    
    // Membaca satu produk saja
    function readOne(){
        
            $query = "SELECT 
                       id_supplier, nama_supplier, alamat_supplier, tlp_supplier
                      FROM
                        " . $this->table_name . " 
                      WHERE 
                        id_supplier = ? 
                      LIMIT 1";
    
            // Prepare Query
            $stmt = $this->conn->prepare($query);

            // Bind Param 
            $stmt->bindParam(1, $this->id_supplier);
    
            // Eksekusi query
            $stmt->execute();
            
            // Dapatakan row 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Buat value menjadi sebuah objek
            $this->id_supplier = $row["id_supplier"];
            $this->nama_supplier = $row["nama_supplier"];
            $this->alamat_supplier = $row["alamat_supplier"];
            $this->tlp_supplier = $row["tlp_supplier"];
            
          }

    // Membaca satu produk saja
    function check(){
        
      $query = "SELECT 
                  id_supplier, nama_supplier, alamat_supplier, tlp_supplier
                FROM
                  " . $this->table_name . " 
                WHERE 
                  nama_supplier = ? 
                  LIMIT 1";

      // Prepare Query
      $stmt = $this->conn->prepare($query);

      // Bind Param 
      $stmt->bindParam(1, $this->nama_supplier);

      // Eksekusi query
      $stmt->execute();
      
      // Dapatakan row 
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      
      // Buat value menjadi sebuah objek
      $this->id_supplier = $row["id_supplier"];
      $this->nama_supplier = $row["nama_supplier"];
      $this->alamat_supplier = $row["alamat_supplier"];
      $this->tlp_supplier = $row["tlp_supplier"];
      
    }

          // Membuat product
          function create(){

        // Query untuk melakukan insert
        $query = "INSERT INTO 
                    " . $this->table_name . "
                  SET
                    nama_supplier = :nama_supplier,
                    alamat_supplier = :alamat_supplier,
                    tlp_supplier = :tlp_supplier";

        // Siapkan query
        $stmt = $this->conn->prepare($query);

        // bind values
        $stmt->bindParam(":nama_supplier", $this->nama_supplier);
        $stmt->bindParam(":alamat_supplier", $this->alamat_supplier);
        $stmt->bindParam(":tlp_supplier", $this->tlp_supplier);
        
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
                        id_supplier = :id_supplier,
                        nama_supplier = :nama_supplier,
                        alamat_supplier = :alamat_supplier,                     
                        tlp_supplier = :tlp_supplier                     
                  WHERE
                        id_supplier = :id_supplier";
                  
                  // Prepare statement
                  $stmt = $this->conn->prepare($query);
                  
                  //Bind value baru
                  $stmt->bindParam(":id_supplier", $this->id_supplier);
                  $stmt->bindParam(":nama_supplier", $this->nama_supplier);
                  $stmt->bindParam(":alamat_supplier", $this->alamat_supplier);
                  $stmt->bindParam(":tlp_supplier", $this->tlp_supplier);
                    
                  // Eksekusi query
                  if($stmt->execute()){
                      return true;
                  }
                      
                      return false;
                }
                // Hapus product
                function delete(){
                    //Query untuk delete

                    $query = "DELETE FROM " . $this->table_name . " WHERE id_supplier = ?";

                    // Prepare query 
                    $stmt = $this->conn->prepare($query);

                    //bind id yang mau dihapus
                    $stmt->bindParam(1, $this->id_supplier);

                    // Eksekusi query
                    if($stmt->execute()){
                        return true;
                    }

                    return false;
                }
            }
            
            ?>