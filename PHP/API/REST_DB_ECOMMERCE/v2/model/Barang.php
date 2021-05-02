<?php 
class Barang{

    // Koneksi database
    private $conn;
    private $table_name = "tbl_barang";

    // Properti objek
    public $id_barang;
    public $id_supplier;
    public $supplier;
    public $id_jns_barang;
    public $jns_barang;
    public $nama_barang;
    public $harga;


    // Constructor dengan DB
    public function __construct($db){
        $this->conn = $db;
    }

    // Membaca semua produk
    function read(){
    
        $query = "SELECT 
                   a.id_barang, 
                   a.id_supplier, 
                   b.nama_supplier as supplier, 
                   a.id_jns_barang,
                   c.nama_jns_barang as jns_barang, 
                   a.nama_barang, 
                   a.harga
                  FROM
                    " . $this->table_name . " a
                  JOIN
                  tbl_supplier b ON a.id_supplier = b.id_supplier
                  JOIN
                  tbl_jns_barang c ON a.id_jns_barang = c.id_jns_barang
                  ORDER BY
                    a.id_barang ASC";

        // Prepare Query
        $stmt = $this->conn->prepare($query);

        // Eksekusi query
        $stmt->execute();
        return $stmt;
    }
    
    // Membaca satu produk saja
    function readOne(){
        
      $query = "SELECT 
                a.id_barang, 
                a.id_supplier, 
                b.nama_supplier as supplier, 
                a.id_jns_barang,
                c.nama_jns_barang as jns_barang, 
                a.nama_barang, 
                a.harga
              FROM
                " . $this->table_name . " a
              JOIN
              tbl_supplier b ON a.id_supplier = b.id_supplier
              JOIN
              tbl_jns_barang c ON a.id_jns_barang = c.id_jns_barang
              WHERE
                a.id_barang = ?";
    
            // Prepare Query
            $stmt = $this->conn->prepare($query);

            // Bind Param 
            $stmt->bindParam(1, $this->id_barang);
    
            // Eksekusi query
            $stmt->execute();
            
            // Dapatakan row 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Buat value menjadi sebuah objek
            $this->id_barang = $row["id_barang"];
            $this->id_supplier = $row["id_supplier"];
            $this->supplier = $row["supplier"];
            $this->id_jns_barang = $row["id_jns_barang"];
            $this->jns_barang = $row["jns_barang"];
            $this->nama_barang = $row["nama_barang"];
            $this->harga = $row["harga"];
            
          }

    // Membaca satu produk saja
    function check(){
        
      $query = "SELECT 
                a.id_barang, 
                a.id_supplier, 
                b.nama_supplier as supplier, 
                a.id_jns_barang,
                c.nama_jns_barang as jns_barang, 
                a.nama_barang, 
                a.harga
              FROM
                " . $this->table_name . " a
              LEFT JOIN
              tbl_supplier b ON a.id_supplier = b.id_supplier
              LEFT JOIN
              tbl_jns_barang c ON a.id_jns_barang = c.id_jns_barang
              WHERE
                a.nama_barang = ?";
    
            // Prepare Query
            $stmt = $this->conn->prepare($query);

            // Bind Param 
            $stmt->bindParam(1, $this->nama_barang);
    
            // Eksekusi query
            $stmt->execute();
            
            // Dapatakan row 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Buat value menjadi sebuah objek
            $this->id_barang = $row["id_barang"];
            $this->id_supplier = $row["id_supplier"];
            $this->supplier = $row["supplier"];
            $this->id_jns_barang = $row["id_jns_barang"];
            $this->jns_barang = $row["jns_barang"];
            $this->nama_barang = $row["nama_barang"];
            $this->harga = $row["harga"];
            
          }

          // Membuat product
          function create(){

        // Query untuk melakukan insert
        $query = "INSERT INTO 
                    " . $this->table_name . "
                  SET
                    id_supplier = :id_supplier,
                    id_jns_barang = :id_jns_barang,
                    nama_barang = :nama_barang,
                    harga = :harga";

        // Siapkan query
        $stmt = $this->conn->prepare($query);

        // bind values
        $stmt->bindParam(":id_supplier", $this->id_supplier);
        $stmt->bindParam(":id_jns_barang", $this->id_jns_barang);
        $stmt->bindParam(":nama_barang", $this->nama_barang);
        $stmt->bindParam(":harga", $this->harga);
        
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
                        id_barang = :id_barang,
                        id_supplier = :id_supplier,                     
                        id_jns_barang = :id_jns_barang,                     
                        nama_barang = :nama_barang,                     
                        harga = :harga                     
                  WHERE
                        id_barang = :id_barang";
                  
                  // Prepare statement
                  $stmt = $this->conn->prepare($query);
                  
                  //Bind value baru
                  $stmt->bindParam(":id_barang", $this->id_barang);
                  $stmt->bindParam(":id_supplier", $this->id_supplier);
                  $stmt->bindParam(":id_jns_barang", $this->id_jns_barang);
                  $stmt->bindParam(":nama_barang", $this->nama_barang);
                  $stmt->bindParam(":harga", $this->harga);
                    
                  // Eksekusi query
                  if($stmt->execute()){
                      return true;
                  }
                      
                      return false;
                }
                // Hapus product
                function delete(){
                    //Query untuk delete

                    $query = "DELETE FROM " . $this->table_name . " WHERE id_barang = ?";

                    // Prepare query 
                    $stmt = $this->conn->prepare($query);

                    //bind id yang mau dihapus
                    $stmt->bindParam(1, $this->id_barang);

                    // Eksekusi query
                    if($stmt->execute()){
                        return true;
                    }

                    return false;
                }
            }
            
            ?>