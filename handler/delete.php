<?php

require "../DataBaseBroker.php";
require "../modeli/prijavazavolontiranje.php";

if(isset($_POST['idPrijava'])){
    $obj = new VPrijava($_POST['idPrijava']);
    $status = $obj->deleteById($conn);
    if ($status){
        echo "Success";
    }else{
        echo "Failed";
    }
}

?>