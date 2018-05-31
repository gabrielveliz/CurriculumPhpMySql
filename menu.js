$(document).ready(main);

var contador = 1;
function main()
{
    $('.menu_bar').click(function(){

        if(contador==1)
        {
            $('nav').animate({
                left: '0'
            });
            contador=0;
        }else
        {
            $('nav').animate({
                left: '-100%'
            });
            contador = 1;
        }
    });
}

var a="";
var cantidad=0;
   
$("#ForTex1").keyup(function(){
    a= $("#ForTex1").val();
    cantidad=a.length;
    $("#ForTex1").css("color", "black");
    if(cantidad==0)
    {
          $("#ForTex1").css("background-color", "#FFCDD2");
          
    }
    if(cantidad>0)
    {
          $("#ForTex1").css("background-color", "#CCFF90");
          $("#ForTex1").css("color", "black"); 
    }
  });

$("#ForTex2").keyup(function(){
    a= $("#ForTex2").val();
    $("#ForTex2").css("color", "black");
    if(a.indexOf('@') != -1 && a.indexOf('.') != -1)
    {
          $("#ForTex2").css("background-color", "#CCFF90");
           
    }else
    {
        $("#ForTex2").css("background-color", "#FFCDD2");
    }
  });

$("#ForTex3").keyup(function(){
    a= $("#ForTex3").val();
    cantidad=a.length;
    $("#ForTex3").css("color", "black");  
    if(cantidad==0)
    {
          $("#ForTex3").css("background-color", "#FFCDD2");
          
    }
    if(cantidad>0)
    {
          $("#ForTex3").css("background-color", "#CCFF90");
          
    }
  });
$("#borrar").click(function(){
    $("#ForTex1").css("background-color", "white");
    $("#ForTex2").css("background-color", "white");
    $("#ForTex3").css("background-color", "white"); 
});

