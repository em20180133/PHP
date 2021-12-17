<?php
class VPrijava{
public $idPrijava;
public $izvodjac;
public $datum;
public $mesto;
public $idVolonter;

public function __construct($idPrijava=null,$izvodjac=null,$datum=null,$mesto=null,$idVolonter=null){
  $this->idPrijava=$idPrijava;
  $this->izvodjac=$izvodjac;
  $this->datum=$datum;
  $this->mesto=$mesto;
  $this->idVolonter=$idVolonter;
}
public static function prikaziSveKoncerte(mysqli $conn)
    {
        $query = "SELECT * FROM prijavazavolontiranje";
        return $conn->query($query);
    }

}
?>