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

    public static function getById($idPrijava, mysqli $conn){
        $query = "SELECT * FROM prijavazavolontiranje WHERE idPrijava=$idPrijava";

        $myObj = array();
        if($msqlObj = $conn->query($query)){
            while($red = $msqlObj->fetch_array(1)){
                $myObj[]= $red;
            }
        }

        return $myObj;

    }

    

    public function deleteById(mysqli $conn)
    {
        $query = "DELETE FROM prijavazavolontiranje WHERE idPrijava=$this->idPrijava";
        return $conn->query($query);
    }

    
    public static function update(VPrijava $novaPrijava, mysqli $conn) {
        $query="UPDATE prijavazavolontiranje set izvodjac='$novaPrijava->izvodjac', datum='$novaPrijava->datum', mesto='$novaPrijava->mesto', idVolonter='$novaPrijava->idVolonter' WHERE idPrijava='$novaPrijava->idPrijava'";
        return $conn->query($query);
    }

    
    public static function add(VPrijava $prijava, mysqli $conn)
    {
        $query = "INSERT INTO prijavazavolontiranje (izvodjac, datum, mesto, idVolonter) VALUES ('$prijava->izvodjac','$prijava->datum','$prijava->mesto',$prijava->idVolonter)";
        return $conn->query($query);
    }
}
 


?>