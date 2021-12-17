

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="dizajn/index.css">
    <title>Dobrovoljno volontiranje</title>
</head>
<body>
    <div class="vdiv">
    <h2>Dobro nam došli volonteri!</h2><br>
    <p>Svake godine, zbog hladnoće, gladi, bolesti izazvanih istima, ostanemo bez hiljade i hiljade najmlađih stanovnika naše planete. <br>
Hvala vam što ste pružate svoju pomoć prilikom pripreme i realizacije humanitarnih koncerata, koji se organizuju u cilju prikupljanja <br>
novčanih sredstava onima kojima su ta sredstva najviše potrebna. Hvala!</p>
    <div class="forma_za_prijavu">
        <div class="divf">
            <form method="POST" action="#">
                <div class="prijava">
                <label class="username">Korisničko ime: </label> <br>
                    <input type="text" name="username" class="fusername"  required> <br>
                    <br>
                    <label class="email">Email: </label> <br>
                    <input type="text" name="email" class="femail"  required> <br>
                    <br>
                    <label for="password">Šifra: </label><br>
                    <input type="password" name="password" class="fpassword" required><br> <br>
                    <button type="submit" class="btn_prijavi_se" name="submit">PRIJAVI SE</button>
                </div>
            </form><br>
            
        </div>
        <img src="slike/deca.jpg" alt="Hvala vam" id="deca"><br> <br> <br>
<a href="https://www.youtube.com/c/SpecialBooksbySpecialKids" id=snimak> <span> -> -> -> WATCH <- <- <- </span></a> <br> <br>
    </div>
    </div>


    

</body>
</html> 

        
    </div>
</body>
</html>


<?php

require "DataBaseBroker.php";
require "modeli/volonter.php";

session_start();
if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
    $vname = $_POST['username'];
    $vemail = $_POST['email'];
    $vpassword = $_POST['password'];


    // $conn = new mysqli() ;
    $user = new Volonter(1, $vname,$vemail, $vpassword);
   
    $odg = Volonter::prijavaVolontera($user, $conn); 

    if($odg->num_rows==1){
        echo  `
        <script>
        console.log( "Uspešna prijava volontera na sistem!");
        </script>
        `;
        $_SESSION['volonter_id'] = $user->id;
        header('Location: pocetna.php');
        exit();
    }else{
        echo `
        <script>
        console.log( "Neuspešna prijava volontera na sistem!");
        </script>
        `;
    }

}

?>