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

<div class="diva2"  >
    <div class="div3">
        <button id="vidi"  class="btn_vidi" 
        s> Pregledaj zakazane koncerte</button>
    </div><br>
    <div class="div4">
        <button id="prijavise" type="button" class="btn_prijavise"
        data-toggle="modal" data-target="#volontirajModal"  > Volontiraj</button>

    </div><br>
    <div class="div5"> 
        <button id="nadji" class="btn_nadji"
                > Pronađi željeni koncert</button>
        <input type="text" id="ulaz" onkeyup="nadji()" placeholder="Pronadji traženi koncert po datumu" hidden>
    </div><br>
</div>

<div  class="divx" >

    <div class="div6" >
        <table id="table" class="tabela_koncerata" border="3" style=" background-color: white">
            <thead class ="zaglavlje">
            <tr >
                <th scope="kolona" style="background-color:white " >Izvođač</th>
                <th scope="kolona" style="background-color:white " >Datum</th>    
                <th scope="kolona" style="background-color:white " >Mesto</th>
                <th scope="kolona" style="background-color:white  " >Volonter </th>
            </tr>
            </thead>
            <tbody>
            
                <tr >
                    <td><?php echo $red["izvodjac"] ?></td>
                    <td><?php echo $red["datum"] ?></td>
                    <td><?php echo $red["mesto"] ?></td>
                    
                    <td><?php echo $red["idVolonter"] ?></td>
                    <td >
                        <label class="oznaci">
                            <input type="radio" name="checked-donut" value=<?php echo $red["idPrijava"] ?>>
                            <span class="check"></span>
                        </label>
                    </td>

                </tr>
             
            </tbody>
        </table>
        <div class="div7" >
            <div class="div8" >
                <button id="azuriraj" type="button" class="btn_azuriraj" data-toggle="modal" data-target="#azurirajModal">AŽURIRAJ</button>
                
            </div>

            <div class="div9" >
                <button id="ukloni" class="btn_ukloni" >UKLONI</button>
            </div>

            <div class="div10"  >
                    <button id="uredi" class="btn_uredi" onclick="sortirajTabelu()">SORTIRAJ</button>
                </div>

        </div>
    </div>
</div>

<br><br>

<div class="modal" id="volontirajModal"  role="dialog"  style=" background-color:#FFDAB9">
    <div class="div12" style=" background-color:#FFDAB9">

        
        <div class="modal-content" style=" background-color:#FFDAB9">
            <div class="div14">
                <button type="button" class="zatvori" data-dismiss="modal">&times;</button>
            </div>
            <div class="div14">
                <div class="fprijava">
                    <form action="#" method="post" id="dodajFormu">
                        <h3  >Volontiraj</h3>
                        <div class="div2">
                            <div class="div16 ">
                                <div class="div17">
                                    <label for="">Izvođač: </label>
                                    <input type="text"  name="izvodjac" class="izvodjac_i"/> 
                                </div><br>
                                <div class="div18">
                                <div class="div19">
                                    <label for="">Datum: </label>
                                    <input type="date"   name="datum" class="fdatum_i"/>
                                </div>
                                </div><br>
                                
                                <div class="div20">
                                    <label for="mesto">Mesto: </label>
                                    <input type="mesto"  name="mesto" class="mesto_i"/>
                                </div><br>
                                <div class="div21">
                                <label for="">Volonter: </label>
                                    <input type="text"  name="volonter" class="volonter_i"/>
                                </div><br>
                                <div class="div22">
                                    <button id="btnUnesi" type="submit" class="unesi"
                                    >Unesi novi koncert</button>
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
                        <div class="div2">
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



</body>
</html>