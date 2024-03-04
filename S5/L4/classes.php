<?php

abstract class MaterialeBibliotecario implements Prestito {
    protected static $contatoreLibri = 0;
    protected static $contatoreDVD = 0;

    private $titolo;
    private $autore;
    private $annoPubblicazione;

    public function prestaLibro() {
        self::$contatoreLibri--;
        echo "Prestato";

    }

    public function restituisciLibro() {
        self::$contatoreLibri++;
    }
    public function prestaDVD() {
        self::$contatoreDVD--;
    }

    public function restituisciDVD() {
        self::$contatoreDVD++;
    }


}

// Definizione della sottoclasse Libro
class Libro extends MaterialeBibliotecario {
    public function __construct($titolo, $autore, $annoPubblicazione) {
        $this->titolo = $titolo;
        $this->autore = $autore;
        $this->annoPubblicazione = $annoPubblicazione;
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

// Definizione della sottoclasse DVD
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