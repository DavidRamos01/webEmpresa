<?php
    class conexion{
        private $server = "localhost";
        private $user = "root";
        private $password = "";
        private $db = "webEmpresa";

        public function conectar(){
            $conexion = new mysqli($this->server,$this->user,$this->password,$this->db);
            return $conexion;
        }
    }
?>