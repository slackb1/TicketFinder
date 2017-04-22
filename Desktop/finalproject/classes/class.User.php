<?php 
    class User {
        protected $userID;
        protected $username;
        private $database;
        public $isAdmin;
        
        function __construct($userID, $db) {
            $sql = file_get_contents('sql/getUser.sql');
            $params = array('userID' => $userID);
            $statement = $db->prepare($sql);
            $statement->execute($params);
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
            $user = $users[0];
            
            $this->userID = $user['userID'];
            $this->username = $user['username'];
            $this->isAdmin = $user['isAdmin'];
            $this->database = $db;
        }
        
        public function getName() {
            return $this->username;
        }
        
        public function getUserID() {
            return $this->userID;
        }
        
        public function getIsAdmin() {
            return $this->isAdmin;
        }
        
    }

?>