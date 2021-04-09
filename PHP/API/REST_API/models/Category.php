<?php 
    class Category {
        // Koneksi
        private $conn;
        private $table = 'categories';

        // Properti
        public $id;
        public $name;
        public $created_at;

        // Constructor dengan DB (sebuah method, method adalah function dalam kelas)
        public function __construct($db)
        {
            $this->conn = $db;
        }
        
        // Get Kategori
        public function read(){
            // Membuat query
            $query = 'SELECT
             id,
             name,
             created_at
            FROM
              ' . $this->table. '
            ORDER BY
              created_at DESC';

            // Persiapkkan Satetment
            $stmt = $this->conn->prepare($query);

            // Eksekusi
            $stmt->execute();

            return $stmt;
        }
    }
    

?>