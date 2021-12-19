<?php

require "DataBaseBroker.php";
require "modeli/prijavazavolontiranje.php";

session_start();
if (!isset($_SESSION['volonter_id'])) {
    header('Location: index.php');
    exit();
}
$data = VPrijava::prikaziSveKoncerte($conn);
if (!$data) {
    echo "Neuspesno preuzimanje podataka!";
    die();
}
if ($data->num_rows == 0) {
    echo "Prazna tabela!";
    die();
} else {

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="dizajn/pocetna.css">
    <title>Zakazivanje koncerata</title>

</head>

<body>


<div class="div1" ><h1>Stranica za zakazivanje koncerata</h1></div> <br><br><br>
<p id="usloviv"><i>Unošenjem ispravnih vrednosti u datu tabelu i podnošenjem prijave, obavezujete se da volontirate prilikom 
pripreme i realizacije humanitarnih koncerata, <br> bez ikakve naknade. U suprotnom vaša prijava se neće obrađivati.Veliko vam hvala!</i></p><br><br><br><br>
<div class="row"  >
    <div class="div3">
        <button id="vidi"  class="btn_vidi" 
        s> Pregledaj zakazane koncerte</button>
    </div><br>
    
    <div class="div4">
            <button id="prijavise" type="button" class="btn_prijavise" data-toggle="modal" data-target="#volontirajModal">Volontiraj</button>

        </div>
    
    
    <br>
    <div class="div5"> 
 
            <button id="nadji" class="btn_pretraga" > Pretraži koncert</button><br>
            <input type="text" id="ulaz" onkeyup="nadji()" placeholder="Pretraži koncerte po izvođaču" >
        
    </div><br>
</div>



<div  class="divp" >

    <div class="div6" >
        <table id="tabela" class="tabela_koncerata" border="3" style=" background-color:rgb(230, 105, 105)">
            <thead class ="zaglavlje">
            <tr >
                <th scope="kolona" style="background-color:rgb(230, 105, 105) " >Izvođač</th>
                <th scope="kolona" style="background-color:rgb(230, 105, 105) " >Datum</th>    
                <th scope="kolona" style="background-color:rgb(230, 105, 105) " >Mesto</th>
                <th scope="kolona" style="background-color:rgb(230, 105, 105) " >Volonter </th>
            </tr>
            </thead>
            <tbody>
            <?php
                    while ($red = $data->fetch_array()) :
                    ?>
                <tr >
                    <td><?php echo $red["izvodjac"] ?></td>
                    <td><?php echo $red["datum"] ?></td>
                    <td><?php echo $red["mesto"] ?></td>
                    <td><?php echo $red["idVolonter"] ?></td>
                    <td >
                        <label class="oznaci">
                        <input type="radio" name="cekiranje" value=<?php echo $red["idPrijava"] ?>>
                                    <span class="checkmark"></span>
                        </label>
                    </td>

                </tr>
                <?php
                    endwhile;
                } 
                ?>
            </tbody>
        </table>
        <div class="row" >
            <div class="div8" >
                <button id="azuriraj" type="button" class="btn_azuriraj" data-toggle="modal" data-target="#azurirajModal">AŽURIRAJ</button>
                
            </div>

            
            <div class="col-md-12" >
                    <button id="btn-obrisi" type="button" formmethod="post" class="btn btn-danger" style="
    
    background-color: rgb(223, 11, 82);
    border-radius: 10px">UKLONI</button>
                </div>
            <div class="div10"  >
                    <button id="uredi" class="btn_uredi" onclick="sortirajTabelu()">SORTIRAJ</button>
                </div>

        </div>
    </div>
</div>



<div class="modal" id="volontirajModal"  role="dialog"  style=" background-color:#FFDAB9">
    <div class="div12" style=" background-color:#FFDAB9">

        
        <div class="modal-content" style=" background-color:#FFDAB9">
            <div class="div14">
                <button type="button" class="zatvori" data-dismiss="modal">&times;</button>
            </div>
            <div class="div15">
                <div class="fprijava">
                    <form action="#" method="post" id="dodajForm">
                        <h3>Volontiraj</h3>
                        <div class="row">
                            <div class="div16 ">
                                <div class="form-group">
                                    <label for="">Izvođač: </label>
                                    <input type="text"  name="izvodjac" class="form-control"/> 
                                </div><br>
                                <div class="div18">
                                <div class="form-group">
                                    <label for="">Datum: </label>
                                    <input type="date"   name="datum" class="form-control"/>
                                </div>
                                </div><br>
                                
                                <div class="form-group">
                                    <label for="mesto">Mesto: </label>
                                    <input type="mesto"  name="mesto" class="form-control"/>
                                </div><br>
                                <div class="form-group">
                                <label for="">Volonter: </label>
                                    <input type="text"  name="volonter" class="form-control"/>
                                </div><br>
                                
                                <div class="form-group">
                                        <button id="btnDodaj" type="submit" class="btn btn-success btn-block">Zakazi</button>
                                    </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



 </div>



 <div class="modal" id="azurirajModal" role="dialog"  style=" background-color: #FFDAB9">
    <div class="div24" style=" background-color: #FFDAB9">

     
        <div class="modal-content" style=" background-color:#FFDAB9">
            <div class="div26" style=" background-color:#FFDAB9">
                <button type="button" class="zatvori" data-dismiss="modal">&times;</button>
            </div>
            <div class="div27" >
                <div class="div28">
                    <form action="#" method="post" id="azuriranje">
                        <h3 >Ažuriraj koncert</h3>
                        <div class="row">
                            <div class="div30">
                                <div class="div31">
                                    <input id="idPrijava" type="text" name="idPrijava" class="frm"
                                           placeholder="idPrijave *" value="" readonly />
                                </div><br>
                                <div class="div32">
                                    <input id="izvodjac" type="text" name="izvodjac" class="frm"
                                           placeholder="Izvođac *" value=""/>
                                </div><br>
                                <div class="div35">
                                    <input id="datum" type="date" name="datum" class="frm"
                                           placeholder="Datum *" value=""/>
                                </div><br>
                                <div class="div33">
                                    <input id="mesto" type="text" name="mesto" class="frm"
                                           placeholder="Mesto *" value=""/>
                                </div><br>
                                <div class="div34">
                                    <input id="idVolonter" type="text" name="idVolonter" class="frm"
                                           placeholder="idVolonter *" value=""/>
                                </div><br>
                                
                                <div class="div36">
                                    <button id="btnIzmeni" type="submit" class="izmeni"
                                           > Izmeni
                                    </button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="div37">
                <button type="button" class="kraj " data-dismiss="modal">Kraj</button>
            </div>
        </div>



</div>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
  
    <script src="js/main.js"></script>




<script>
    //sortiramo po datumu
        function sortirajTabelu() {
            var table, rows, s, i, a, b, shouldS;
            table = document.getElementById("tabela");
            s = true;

            while (s) {
                s = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldS = false;
                    a = rows[i].getElementsByTagName("td")[1];
                    b = rows[i + 1].getElementsByTagName("td")[1];
                    if (a.innerHTML.toLowerCase() > b.innerHTML.toLowerCase()) {
                        shouldS = true;
                        break;
                    }
                }
                if (shouldS) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    s = true;
                }
            }
        }
//pretrazivanje po izvodjacu
        function nadji() {
            var unos, filter, table, tr, td, i, txtValue;
            unos = document.getElementById("ulaz");
            filter = unos.value.toUpperCase();
            table = document.getElementById("tabela");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
       


    


    </script>

</body>
</html>

