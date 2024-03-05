<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
    class BooksDTO {
        private PDO $conn;

        public function __construct(PDO $conn) {
            $this->conn = $conn;
        }

        public function getAll() {
            $sql = 'SELECT * FROM S5L5.libri';
            $res = $this->conn->query($sql, PDO::FETCH_ASSOC);
    
            if($res) { // Controllo se ci sono dei dati nella variabile $res
                
                return $res;
            }

            return null;
        }
        public function getBookByID(int $id) {
            // print_r($id);
            $sql = 'SELECT * FROM S5L5.libri WHERE id = :id';
            $stm = $this->conn->prepare($sql);
            $res = $stm->execute(['id' => $id]);
    
            if($res) { // Controllo se ci sono dei dati nella variabile $res
                $libro = $stm->fetch(PDO::FETCH_ASSOC);
                return $libro;
            }

            return null;
        }
        public function addBook(array $libro) {
            $sql = "INSERT INTO S5L5.libri (titolo, autore, data_pub) VALUES (:titolo, :autore, :data_pub)";
            $stm = $this->conn->prepare($sql);
            $stm->execute(['titolo' => $libro['titolo'], 'autore' => $libro['autore'], 'data_pub' => $libro['data_pub']]);
            return $stm->rowCount();
        }
        public function libroPrestato(array $libro) {
            $sql = "UPDATE S5L5.libri SET prestato = :prestato WHERE id = :id";
            $stm = $this->conn->prepare($sql);
            $stm->execute(['prestato' => $libro['prestato'], 'id' => $libro['id']]);
            return $stm->rowCount();
        }

        // public function deleteUser(int $id) {
        //     $sql = "DELETE pdo_test.libri WHERE id = :id";
        //     $stm = $this->conn->prepare($sql);
        //     $stm->execute(['id' => $id]);
        //    return $stm->rowCount();
        // }
    }