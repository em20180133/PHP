

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