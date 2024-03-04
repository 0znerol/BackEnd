<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

abstract class MaterialeBibliotecario implements Prestito {
    protected static $contatoreLibri = 0;
    protected static $contatoreDVD = 0;

    private $titolo;
    private $autore;
    private $annoPubblicazione;
    public $prestato;

    // public function prestaLibro() {
    //     self::$contatoreLibri--;

    // }
    // public function prestaDVD() {
    //     self::$contatoreDVD--;
    // }

    public function prestaLibro() {
        self::$contatoreLibri--;
        $this->prestato = true;
    }
    public function restituisciLibro() {
        self::$contatoreLibri++;
        $this->prestato = false;
    }

}

class Libro extends MaterialeBibliotecario {


    public function __construct($titolo, $autore, $annoPubblicazione) {
        $this->titolo = $titolo;
        $this->autore = $autore;
        $this->annoPubblicazione = $annoPubblicazione;
        $this->prestato = false;

        self::$contatoreLibri++;
    }

    public static function contaLibri() {
        return self::$contatoreLibri;
    }
    public function getTitolo() {
        return $this->titolo;
    }
    public function getAutore() {
        return $this->autore;
    }
    public function getAnnoPubblicazione() {
        return $this->annoPubblicazione;
    }

}

class DVD extends MaterialeBibliotecario {
    public function __construct($titolo, $autore, $annoPubblicazione) {
        $this->titolo = $titolo;
        $this->autore = $autore;
        $this->annoPubblicazione = $annoPubblicazione;
        self::$contatoreDVD++;
    }

    public static function contaDVD() {
        return self::$contatoreDVD;
    }
    public function getTitolo() {
        return $this->titolo;
    }
    public function getAutore() {
        return $this->autore;
    }
    public function getAnnoPubblicazione() {
        return $this->annoPubblicazione;
    }
}