<?php
class Slider {
        private $id;
        private $foto;

        public function __construct($foto) {
            $this->foto = $foto;
        }

        public static function obtenerSliders() {
            $c = new conexion(); 
            $conexion = $c->conectar();
            $sliders = [];

            $query = "SELECT * FROM slider";
            $resultado = mysqli_query($conexion, $query);

            if ($resultado) {
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $slider = new Slider($fila['foto']);
                    $slider->id = $fila['id'];
                    $sliders[] = $slider;
                }
            }

            return $sliders;
        }
        public function actualizarSlider($id) {
            $c = new conexion();
            $conexion = $c->conectar();
        
            $fotoEscapada = mysqli_real_escape_string($conexion, $this->foto);
        
            $query = "UPDATE slider SET foto = '$fotoEscapada' WHERE id = $id";
            return mysqli_query($conexion, $query);
        }
        
        
        public function getId() {
            return $this->id;
        }

        public function getFoto() {
            return $this->foto;
        }
    }
?>