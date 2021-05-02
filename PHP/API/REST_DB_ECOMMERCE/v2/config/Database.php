<?php 
class Database{
    // Spesifikasi koneksi Database
    private $hosts = "localhost";
    private $db_name = "ecommerce_db";
    private $username = "root";
    private $password = "";
    public $conn;

    // Get koneksi
    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->hosts . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Koneksi Error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

?>