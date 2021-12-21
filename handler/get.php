<?php

require "../DataBaseBroker.php";
require "../modeli/prijavazavolontiranje.php";

if(isset($_POST['idPrijava'])){
    $myArray = VPrijava::getById($_POST['idPrijava'], $conn);
    echo json_encode($myArray);
}
?>