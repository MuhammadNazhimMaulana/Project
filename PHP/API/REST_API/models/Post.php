<?php 
    class Post{
        // DB STuff
        private $conn;
        private $table = 'posts';


        // Properti post
        public $id;
        public $category_id;
        public $category_name;
        public $title;
        public $body;
        public $author;
        public $created_at;

        // Constructor dengan DB (sebuah method, method adalah function dalam kelas)
        public function __construct($db)
        {
            $this->conn = $db;
        }

        // Get Post
        public function read(){
            // Mebuat query
            $query = 'SELECT 
                c.name as category_name,
                p.id,
                p.category_id,
                p.title,
                p.body,
                p.author,
                p.created_at
            FROM 
                '. $this->table. ' p
            LEFT JOIN
                categories c ON p.category_id = c.id
               ORDER BY
                p.created_at DESC';

        // Prepare staatement
        $stmt = $this->conn->prepare($query);

        // Eksekusi query
        $stmt->execute();

        return $stmt;
        }
        
        // Dapatkan Satu post
        public function read_single(){
            // Mebuat query
            $query = 'SELECT 
                c.name as category_name,
                p.id,
                p.category_id,
                p.title,
                p.body,
                p.author,
                p.created_at
            FROM 
                '. $this->table. ' p
            LEFT JOIN
                categories c ON p.category_id = c.id
               WHERE
                p.id = ?
               LIMIT 0,1';

               // Menyiapkan statement
               $stmt = $this->conn->prepare($query);

               // BIND ID
               $stmt->bindParam(1, $this->id);

               // Eksekusi
               $stmt->execute();

               $row = $stmt->fetch(PDO::FETCH_ASSOC);

               // Set Property
               $this->title = $row['title'];
               $this->body = $row['body'];
               $this->author = $row['author'];
               $this->category_id = $row['category_id'];
               $this->category_name = $row['category_name'];

    }

    // Membuat postingan
    public function create(){
        // Membuat query
        $query = 'INSERT INTO ' 
        . $this->table . '
        SET
            title = :title,
            body = :body,
            author = :author,
            category_id = :category_id';

     // Menyiapkan statement
     $stmt = $this->conn->prepare($query);

     // Bersihkan data
     $this->title = htmlspecialchars(strip_tags($this->title));
     $this->body = htmlspecialchars(strip_tags($this->body));
     $this->author = htmlspecialchars(strip_tags($this->author));
     $this->category_id = htmlspecialchars(strip_tags($this->category_id));
     

     // Bind Data
     $stmt->bindParam(':title', $this->title);
     $stmt->bindParam(':body', $this->body);
     $stmt->bindParam(':author', $this->author);
     $stmt->bindParam(':category_id', $this->category_id);


     // Eksekusi query
     if($stmt->execute()){
         return true;
     }

     // Print error kalau ada yang salah
     printf("Error: %s.\n", $stmt->error);

     return false;
    }


    // Update postingan
    public function update(){
        // Membuat query
        $query = 'UPDATE ' 
        . $this->table . '
        SET
            title = :title,
            body = :body,
            author = :author,
            category_id = :category_id
        WHERE
            id = :id';

     // Menyiapkan statement
     $stmt = $this->conn->prepare($query);
     
     // Bersihkan data
     $this->title = htmlspecialchars(strip_tags($this->title));
     $this->body = htmlspecialchars(strip_tags($this->body));
     $this->author = htmlspecialchars(strip_tags($this->author));
     $this->category_id = htmlspecialchars(strip_tags($this->category_id));
     $this->id = htmlspecialchars(strip_tags($this->id));
     
     
     // Bind Data
     $stmt->bindParam(':title', $this->title);
     $stmt->bindParam(':body', $this->body);
     $stmt->bindParam(':author', $this->author);
     $stmt->bindParam(':category_id', $this->category_id);
     $stmt->bindParam(':id', $this->id);
     
     
     // Eksekusi query
     if($stmt->execute()){
         return true;
     }
     
     // Print error kalau ada yang salah
     printf("Error: %s.\n", $stmt->error);
     
     return false;
    }
    
    // Delete Postingan
    public function delete(){
        // Membuat query
        $query = 'DELETE FROM ' . $this->table . '
                  WHERE id = :id';
        
        // Menyiapkan statement
        $stmt = $this->conn->prepare($query);

        // Bersihkan Data
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind Data
        $stmt->bindParam(':id', $this->id);

        // Eksekusi query
        if($stmt->execute()){
            return true;
        }
        
        // Print error kalau ada yang salah
        printf("Error: %s.\n", $stmt->error);
        
        return false;
    }
}


?>