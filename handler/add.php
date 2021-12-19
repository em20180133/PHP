<?php

require "../DataBaseBroker.php";
require "../modeli/prijavazavolontiranje.php";

if(isset($_POST['izvodjac']) && isset($_POST['datum']) 
&& isset($_POST['mesto']) && isset($_POST['idVolonter'])){
    $prijava = new VPrijava(null,$_POST['izvodjac'],$_POST['datum'],$_POST['mesto'],$_POST['idVolonter'] );
    $status = VPrijava::add($prijava, $conn);

    if($status){
        echo 'Success';
    }else{
        echo $status;
        echo "Failed";
    }
}


?>