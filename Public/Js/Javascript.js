$(Document).ready(function()
{
    var DIRPAGE="http//"+document.location.hostname+"/";

    $('#FormComprar').on('submit', function (event)
    {
        event.preventDefault();
        var Dados=$(this).serialize();

        $.ajax({
            url: DIRPAGE+'comprar-veiculo/comprarVeiculos',
            method:'post',
            dataType:'html',
            data: Dados,
            success:function(Dados){
                $('.buy-button').html(Dados);
            }
        });
    });
});