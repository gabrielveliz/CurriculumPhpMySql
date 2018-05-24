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

});

function contar(campo1,campo2,total)
{
  var cantidad;
  cantidad=$(campo1).val().length;
  var resto = total - cantidad;

  $(campo2).html("<p>" + resto + " Caracteres Disponibles</p>");
}