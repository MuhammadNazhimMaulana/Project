<?php 
class Pengiriman{

    // Koneksi database
    private $conn;
    private $table_name = "tbl_pengiriman";

    // Properti objek
    public $id_kirim;
    public $id_transportasi;
    public $transport;
    public $tgl_pengiriman;


    // Constructor dengan DB
    public function __construct($db){
        $this->conn = $db;
    }

    // Membaca semua produk
    function read(){
    
        $query = "SELECT 
                    a.id_kirim, 
                    a.id_transportasi, 
                    b.nama_transportasi as transport, 
                    a.tgl_pengiriman
                  FROM
                    " . $this->table_name . " a
                  JOIN
                  tbl_transport b ON a.id_transportasi = b.id_transportasi
                  ORDER BY
                    a.id_kirim ASC";

        // Prepare Query
        $stmt = $this->conn->prepare($query);

        // Eksekusi query
        $stmt->execute();
        return $stmt;
    }
    
    // Membaca satu produk saja
    function readOne(){
        
            $query = "SELECT 
                        a.id_kirim, 
                        a.id_transportasi,
                        b.nama_transportasi as transport,  
                        a.tgl_pengiriman
                      FROM
                        " . $this->table_name . " a
                      JOIN
                      tbl_transport b ON a.id_transportasi = b.id_transportasi
                      WHERE 
                        id_kirim = ?";
    
            // Prepare Query
            $stmt = $this->conn->prepare($query);

            // Bind Param 
            $stmt->bindParam(1, $this->id_kirim);
    
            // Eksekusi query
            $stmt->execute();
            
            // Dapatakan row 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Buat value menjadi sebuah objek
            $this->id_kirim = $row["id_kirim"];
            $this->id_transportasi = $row["id_transportasi"];
            $this->transport = $row["transport"];
            $this->tgl_pengiriman = $row["tgl_pengiriman"];
            
          }

          // Membuat product
          function create(){

        // Query untuk melakukan insert
        $query = "INSERT INTO 
                    " . $this->table_name . "
                  SET
                    id_transportasi = :id_transportasi,
                    tgl_pengiriman = :tgl_pengiriman";

        // Siapkan query
        $stmt = $this->conn->prepare($query);

        // bind values
        $stmt->bindParam(":id_transportasi", $this->id_transportasi);
        $stmt->bindParam(":tgl_pengiriman", $this->tgl_pengiriman);
        
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
                        tgl_pengiriman = :tgl_pengiriman                     
                  WHERE
                        id_kirim = :id_kirim";
                  
                  // Prepare statement
                  $stmt = $this->conn->prepare($query);
                  
                  //Bind value baru
                  $stmt->bindParam(":id_transportasi", $this->id_transportasi);
                  $stmt->bindParam(":tgl_pengiriman", $this->tgl_pengiriman);
                  $stmt->bindParam(":id_kirim", $this->id_kirim);
                    
                  // Eksekusi query
                  if($stmt->execute()){
                      return true;
                  }
                      
                      return false;
                }
                // Hapus product
                function delete(){
                    //Query untuk delete

                    $query = "DELETE FROM " . $this->table_name . " WHERE id_kirim = ?";

                    // Prepare query 
                    $stmt = $this->conn->prepare($query);

                    //bind id yang mau dihapus
                    $stmt->bindParam(1, $this->id_kirim);

                    // Eksekusi query
                    if($stmt->execute()){
                        return true;
                    }

                    return false;
                }
            }
            
            ?>