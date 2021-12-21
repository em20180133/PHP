

$('#dodajForm').submit(function(){
    event.preventDefault();
    console.log("Dodavanje");
    const $form =$(this);
    const $input = $form.find('input, select, button, textarea');

    const serijalizacija = $form.serialize();
    console.log(serijalizacija);

    $input.prop('disabled', true);

    req = $.ajax({
        url: 'handler/add.php',
        type:'post',
        data: serijalizacija
    });

    req.done(function(res, textStatus, jqXHR){
        if(res=="Success"){
            alert("Koncert uspešno zakazan");
            console.log("Dodat koncert");
            location.reload(true);
        }else console.log("Koncert nije dodat "+res);
        console.log(res);
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Sledeca greska se desila> '+textStatus, errorThrown)
    });
});




$('#btn-obrisi').click(function(){
    console.log("Brisanje");

    const checked = $('input[name=cekiranje]:checked');

    req = $.ajax({
        url: 'handler/delete.php',
        type:'post',
        data: {'idPrijava':checked.val()}
    });

    req.done(function(res, textStatus, jqXHR){
        if(res=="Success"){
           checked.closest('tr').remove();
           alert('Obrisan koncert');
           console.log('Obrisan');
        }else {
        console.log("Koncert nije obrisan "+res);
        alert("Koncert nije obrisan ");

        }
        console.log(res);
    });

});


$('#vidi').click(function () {
    $('#tabela').toggle();
});
$('#btnUnesi').submit(function () {
    $('#volontirajModal').modal('toggle');
    return false;
});

$('#vidi').submit(function () {
    $('#azurirajModal').modal('toggle');
    return false;
});





$('#azuriraj').click(function (event) {
    event.preventDefault();
    const checked = $('input[name=cekiranje]:checked');

    request = $.ajax({
        url: 'handler/get.php',
        type: 'post',
        data: {'idPrijava': checked.val()},
        dataType : "json"
    });


    request.done(function (response,textStatus,jqXHR) {
        console.log('Popunjena forma');
        $('#izvodjac').val(response[0]['izvodjac']);
        console.log(response[0]['izvodjac']);

        $('#datum').val(response[0]['datum'].trim());
        console.log(response[0]['datum'].trim());

        $('#mesto').val(response[0]['mesto'].trim());
        console.log(response[0]['mesto'].trim());

        $('#idVolonter').val(response[0]['idVolonter'].trim());
        console.log(response[0]['idVolonter'].trim());

        $('#idPrijava').val(checked.val());

        console.log(response);
    });

   request.fail(function (jqXHR,textStatus, errorThrown) {
       console.error('Error: ' + textStatus, errorThrown);
   });

   
});
$('#azuriranje').submit(function (event) {
    event.preventDefault();
  
    console.log("Nove vrednosti");
    const $form = $(this);
    const $inputs = $form.find('input, select, button, textarea');
    const serializedData = $form.serialize();
    console.log(serializedData);
    $inputs.prop('disabled', true);

    
    request = $.ajax({
        url: 'handler/update.php',
        type: 'post',
        data: serializedData
      
    });

    request.done(function (response,textStatus,jqXHR) {


        if (response == "Success") {
            console.log('Koncert je azuriran');
            location.reload(true);
            $('#azuriranje').reset;
        }
        else console.log('Koncert nije azuriran ' + response);
        console.log(response);
    });

    request.fail(function (jqXHR,textStatus, errorThrown) {
        console.error('Error: ' + textStatus, errorThrown);
    });


    
    $('#azurirajModal').modal('hide');
});
