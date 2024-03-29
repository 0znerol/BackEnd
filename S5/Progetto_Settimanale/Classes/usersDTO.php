<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
    class UsersDTO {
        private PDO $conn;

        public function __construct(PDO $conn) {
            $this->conn = $conn;
        }

        public function getAll() {
            $sql = 'SELECT * FROM S5PS.utenti';
            $res = $this->conn->query($sql, PDO::FETCH_ASSOC);
    
            if($res) { 
                // $allUsers = $res->fetch(PDO::FETCH_ASSOC);
                return $res;
            }

            return null;
        }
        public function getUsersByID(int $id) {
            // print_r($id);
            $sql = 'SELECT * FROM S5PS.utenti WHERE id = :id';
            $stm = $this->conn->prepare($sql);
            $res = $stm->execute(['id' => $id]);
    
            if($res) { 
                $libro = $stm->fetch(PDO::FETCH_ASSOC);
                return $libro;
            }

            return null;
        }
        public function addUser($user) {
            try {
                $sql = "INSERT INTO S5PS.utenti (username, email, pass) VALUES (:username, :email, :pass)";
                $stm = $this->conn->prepare($sql);
                if($stm->execute(['username' => $user->getUsername(), 'email' => $user->getEmail(), 'pass' => $user->getPassword()])){
                    return $stm->rowCount();
                } else {
                    header("Location: HTML/login.php?error=Errore nella registrazione");
                    exit();
                }
            } catch (PDOException $e) {
                if ($e->getCode() == '23000') {
                    header("Location: HTML/login.php?error=Utente gia registrato");
                    exit();
                } else {
                    header("Location: HTML/login.php?error=other_PDO_error");
                    exit();
                }
            }
        }

        public function getUserForLogin($username) {
            $sql = 'SELECT * FROM S5PS.utenti WHERE username = :username';
            $stm = $this->conn->prepare($sql);
            $res = $stm->execute(['username' => $username]);
            if($res) { 
                // print_r($res. " ");
                $user = $stm->fetch(PDO::FETCH_ASSOC);
                // print_r($user);
                return $user;
            }
            return null;
        }
        public function updateUser($user) {
            $sql = "UPDATE S5PS.utenti SET username = :username, email = :email WHERE id = :id";
            $stm = $this->conn->prepare($sql);
            $stm->execute(['id' => $user->getId(), 'username' => $user->getUsername(), 'email' => $user->getEmail()]);
            return $stm->rowCount();
        }
        public function deleteUser(int $id) {
            $sql = "DELETE FROM S5PS.utenti WHERE id = :id";
            $stm = $this->conn->prepare($sql);
            $stm->execute(['id' => $id]);
            return $stm->rowCount();
        }

        public function updatePass($id, $pass) {
            $sql = "UPDATE S5PS . utenti SET pass = :pass WHERE id = :id";
            $stm = $this->conn->prepare($sql);
            
            $stm->execute(['id' => $id, 'pass' => $pass]);
            return $stm->rowCount();
        }

    }