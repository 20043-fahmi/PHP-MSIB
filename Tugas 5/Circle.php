<?php 

require_once "Class2D.php";

class Circle extends Class2D {

    public $jari_jari;

    public function __construct($jari_jari){
        $this->jari_jari = $jari_jari;
    }

    public function namaBidang(){
        echo "Lingkaran";
    }

    public function luasBidang(){
        $luas = 3.14 * $this->jari_jari * $this->jari_jari;
        return $luas;
    }

    public function kelilingBidang(){
        $keliling = 2 * 3.14 * $this->jari_jari;
        return $keliling;
    }

    public function keterangan(){
        echo "Jari-Jari : ". $this->jari_jari;
    }
}

?>