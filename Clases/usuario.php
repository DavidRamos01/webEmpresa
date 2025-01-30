<?php
    class usuario{

        public $nombre;
        public $password;


        public function __construct($nombre,$password){
            $this->nombre = $nombre;
            $this->password = password_hash($password, PASSWORD_BCRYPT);
        }
        
        public function getNombre(){
            return $this->nombre;
        }
        public function getPassword(){
            return $this->password;
        }
    }
?>