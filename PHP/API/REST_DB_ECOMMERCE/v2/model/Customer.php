<?php 
class Customer{

    // Koneksi database
    private $conn;
    private $table_name = "tbl_customer";

    // Properti objek
    public $id_cst;
    public $nama_cst;
    public $alamat_cst;
    public $email_cst;
    public $telp_cst;


    // Constructor dengan DB
    public function __construct($db){
        $this->conn = $db;
    }

    // Membaca semua produk
    function read(){
    
        $query = "SELECT 
                   id_cst, nama_cst, alamat_cst, email_cst, telp_cst
                  FROM
                    " . $this->table_name . "
                  ORDER BY
                    id_cst ASC";

        // Prepare Query
        $stmt = $this->conn->prepare($query);

        // Eksekusi query
        $stmt->execute();
        return $stmt;
    }
    
    // Membaca satu produk saja
    function readOne(){
        
            $query = "SELECT 
                       id_cst, nama_cst, alamat_cst, email_cst, telp_cst
                      FROM
                        " . $this->table_name . " 
                      WHERE 
                        id_cst = ? 
                      LIMIT 1";
    
            // Prepare Query
            $stmt = $this->conn->prepare($query);

            // Bind Param 
            $stmt->bindParam(1, $this->id_cst);
    
            // Eksekusi query
            $stmt->execute();
            
            // Dapatakan row 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Buat value menjadi sebuah objek
            $this->id_cst = $row["id_cst"];
            $this->nama_cst = $row["nama_cst"];
            $this->alamat_cst = $row["alamat_cst"];
            $this->email_cst = $row["email_cst"];
            $this->telp_cst = $row["telp_cst"];
            
          }

    // Membaca satu produk saja
    function check(){
        
            $query = "SELECT 
                       id_cst, nama_cst, alamat_cst, email_cst, telp_cst
                      FROM
                        " . $this->table_name . " 
                      WHERE 
                        nama_cst = ? 
                      LIMIT 1";
    
            // Prepare Query
            $stmt = $this->conn->prepare($query);

            // Bind Param 
            $stmt->bindParam(1, $this->nama_cst);
    
            // Eksekusi query
            $stmt->execute();
            
            // Dapatakan row 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Buat value menjadi sebuah objek
            $this->id_cst = $row["id_cst"];
            $this->nama_cst = $row["nama_cst"];
            $this->alamat_cst = $row["alamat_cst"];
            $this->email_cst = $row["email_cst"];
            $this->telp_cst = $row["telp_cst"];
            
          }

          // Membuat product
          function create(){

        // Query untuk melakukan insert
        $query = "INSERT INTO 
                    " . $this->table_name . "
                  SET
                    nama_cst = :nama_cst,
                    alamat_cst = :alamat_cst,
                    email_cst = :email_cst,
                    telp_cst = :telp_cst";

        // Siapkan query
        $stmt = $this->conn->prepare($query);

        // bind values
        $stmt->bindParam(":nama_cst", $this->nama_cst);
        $stmt->bindParam(":alamat_cst", $this->alamat_cst);
        $stmt->bindParam(":email_cst", $this->email_cst);
        $stmt->bindParam(":telp_cst", $this->telp_cst);
        
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
                        id_cst = :id_cst,
                        nama_cst = :nama_cst,
                        alamat_cst = :alamat_cst,                     
                        email_cst = :email_cst,                     
                        telp_cst = :telp_cst                     
                  WHERE
                        id_cst = :id_cst";
                  
                  // Prepare statement
                  $stmt = $this->conn->prepare($query);
                  
                  //Bind value baru
                  $stmt->bindParam(":id_cst", $this->id_cst);
                  $stmt->bindParam(":nama_cst", $this->nama_cst);
                  $stmt->bindParam(":alamat_cst", $this->alamat_cst);
                  $stmt->bindParam(":email_cst", $this->email_cst);
                  $stmt->bindParam(":telp_cst", $this->telp_cst);
                    
                  // Eksekusi query
                  if($stmt->execute()){
                      return true;
                  }
                      
                      return false;
                }
                // Hapus product
                function delete(){
                    //Query untuk delete

                    $query = "DELETE FROM " . $this->table_name . " WHERE id_cst = ?";

                    // Prepare query 
                    $stmt = $this->conn->prepare($query);

                    //bind id yang mau dihapus
                    $stmt->bindParam(1, $this->id_cst);

                    // Eksekusi query
                    if($stmt->execute()){
                        return true;
                    }

                    return false;
                }
            }
            
            ?>