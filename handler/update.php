<?php

require "../DataBaseBroker.php";
require "../modeli/prijavazavolontiranje.php";

if(isset($_POST['idPrijava']) && isset($_POST['izvodjac']) && isset($_POST['datum']) && isset($_POST['mesto']) && isset($_POST['idVolonter'])) {
$novaPrijava =  new VPrijava($_POST['idPrijava'], $_POST['izvodjac'], $_POST['datum'], $_POST['mesto'],$_POST['idVolonter']);
$status = VPrijava::update($novaPrijava,$conn);

if ($status){
    echo "Success";
}else{
    echo "Failed";
}

}
?>