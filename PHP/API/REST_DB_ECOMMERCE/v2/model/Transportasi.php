<?php 
class Transportasi{

    // Koneksi database
    private $conn;
    private $table_name = "tbl_transport";

    // Properti objek
    public $id_transportasi;
    public $jenis_transportasi;
    public $nama_transportasi;
    public $jml_tersedia;


    // Constructor dengan DB
    public function __construct($db){
        $this->conn = $db;
    }

    // Membaca semua produk
    function read(){
    
        $query = "SELECT 
                   id_transportasi, jenis_transportasi, nama_transportasi, jml_tersedia
                  FROM
                    " . $this->table_name . "
                  ORDER BY
                    id_transportasi ASC";

        // Prepare Query
        $stmt = $this->conn->prepare($query);

        // Eksekusi query
        $stmt->execute();
        return $stmt;
    }
    
    // Membaca satu produk saja
    function readOne(){
        
            $query = "SELECT 
                       id_transportasi, jenis_transportasi, nama_transportasi, jml_tersedia
                      FROM
                        " . $this->table_name . " 
                      WHERE 
                        id_transportasi = ? 
                      LIMIT 1";
    
            // Prepare Query
            $stmt = $this->conn->prepare($query);

            // Bind Param 
            $stmt->bindParam(1, $this->id_transportasi);
    
            // Eksekusi query
            $stmt->execute();
            
            // Dapatakan row 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Buat value menjadi sebuah objek
            $this->id_transportasi = $row["id_transportasi"];
            $this->jenis_transportasi = $row["jenis_transportasi"];
            $this->nama_transportasi = $row["nama_transportasi"];
            $this->jml_tersedia = $row["jml_tersedia"];
            
          }


    // Membaca satu produk saja
    function check(){

      $query = "SELECT 
                  id_transportasi, jenis_transportasi, nama_transportasi, jml_tersedia
                FROM
                  " . $this->table_name . " 
                WHERE 
                  nama_transportasi = ? 
                LIMIT 1";

      // Prepare Query
      $stmt = $this->conn->prepare($query);

      // Bind Param 
      $stmt->bindParam(1, $this->nama_transportasi);

      // Eksekusi query
      $stmt->execute();
      
      // Dapatakan row 
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      
      // Buat value menjadi sebuah objek
      $this->id_transportasi = $row["id_transportasi"];
      $this->jenis_transportasi = $row["jenis_transportasi"];
      $this->nama_transportasi = $row["nama_transportasi"];
      $this->jml_tersedia = $row["jml_tersedia"];
      
    }
          
          // Membuat product
          function create(){

        // Query untuk melakukan insert
        $query = "INSERT INTO 
                    " . $this->table_name . "
                  SET
                    jenis_transportasi = :jenis_transportasi,
                    nama_transportasi = :nama_transportasi,
                    jml_tersedia = :jml_tersedia";

        // Siapkan query
        $stmt = $this->conn->prepare($query);

        // bind values
        $stmt->bindParam(":jenis_transportasi", $this->jenis_transportasi);
        $stmt->bindParam(":nama_transportasi", $this->nama_transportasi);
        $stmt->bindParam(":jml_tersedia", $this->jml_tersedia);
        
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
                        id_transportasi = :id_transportasi,
                        jenis_transportasi = :jenis_transportasi,
                        nama_transportasi = :nama_transportasi,                     
                        jml_tersedia = :jml_tersedia                     
                  WHERE
                        id_transportasi = :id_transportasi";
                  
                  // Prepare statement
                  $stmt = $this->conn->prepare($query);
                  
                  //Bind value baru
                  $stmt->bindParam(":id_transportasi", $this->id_transportasi);
                  $stmt->bindParam(":jenis_transportasi", $this->jenis_transportasi);
                  $stmt->bindParam(":nama_transportasi", $this->nama_transportasi);
                  $stmt->bindParam(":jml_tersedia", $this->jml_tersedia);
                    
                  // Eksekusi query
                  if($stmt->execute()){
                      return true;
                  }
                      
                      return false;
                }
                // Hapus product
                function delete(){
                    //Query untuk delete

                    $query = "DELETE FROM " . $this->table_name . " WHERE id_transportasi = ?";

                    // Prepare query 
                    $stmt = $this->conn->prepare($query);

                    //bind id yang mau dihapus
                    $stmt->bindParam(1, $this->id_transportasi);

                    // Eksekusi query
                    if($stmt->execute()){
                        return true;
                    }

                    return false;
                }
            }
            
            ?>