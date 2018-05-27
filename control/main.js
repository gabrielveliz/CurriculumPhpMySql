$(document).ready(function() {

contar('#nombre','#cajanombre',50);
contar('#titulo','#cajatitulo',50);
contar('#universidad','#cajauniversidad',50);
contar('#objetivo','#cajaobjetivo',500);


	$("#nombre").keyup(function(){
	contar('#nombre','#cajanombre',50);
	});

	$("#titulo").keyup(function(){
	contar('#titulo','#cajatitulo',50);
	});

	$("#universidad").keyup(function(){
	contar('#universidad','#cajauniversidad',50);
	});

	$("#objetivo").keyup(function(){
	contar('#objetivo','#cajaobjetivo',500);
	});

var con=1;


    $("#activar").click(function(){
        if (con==1)
        {
        $("#m").hide();
        con=0;
        }
        else
        {
        $("#m").show();
        con=1;
        }
    });

});





function contar(campo1,campo2,total)
{
  var cantidad;
  cantidad=$(campo1).val().length;
  var resto = total - cantidad;

  $(campo2).html("<p>" + resto + " Caracteres Disponibles</p>");
}


$(document).ready(function() {
  var con=1;

$("#mostrar").hide();

    $(".activar").click(function(){
        if (con==1)
        {
        $("#m").hide();

        $("#ocultar").hide();
        $("#mostrar").show();
        con=0;
        }
        else
        {
        $("#m").show();

        $("#mostrar").hide();
        $("#ocultar").show();

        con=1;
        }
    });
   });

$(document).ready(function() {
  var con2=1;

$("#mostrar2").hide();

    $(".activar2").click(function(){
        if (con2==1)
        {
        $("#e").hide();

        $("#ocultar2").hide();
        $("#mostrar2").show();
        con2=0;
        }
        else
        {
        $("#e").show();

        $("#mostrar2").hide();
        $("#ocultar2").show();

        con2=1;
        }
    });
   });