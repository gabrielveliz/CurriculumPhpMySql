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

// Get the modal1-----------------------------
var modal = document.getElementById('myModal1');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg1');
var modalImg = document.getElementById("img1");
var captionText = document.getElementById("caption1");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close1")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}

// Get the modal2------------------------------
var modal2 = document.getElementById('myModal2');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img2 = document.getElementById('myImg2');
var modalImg2 = document.getElementById("img2");
var captionText2 = document.getElementById("caption2");

img2.onclick = function(){
    modal2.style.display = "block";
    modalImg2.src = this.src;
    captionText2.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("close2")[0];

// When the user clicks on <span> (x), close the modal
span2.onclick = function() { 
    modal2.style.display = "none";
}

// Get the modal3------------------------------
var modal3 = document.getElementById('myModal3');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img3 = document.getElementById('myImg3');
var modalImg3 = document.getElementById("img3");
var captionText3 = document.getElementById("caption3");

img3.onclick = function(){
    modal3.style.display = "block";
    modalImg3.src = this.src;
    captionText3.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span3 = document.getElementsByClassName("close3")[0];

// When the user clicks on <span> (x), close the modal
span3.onclick = function() { 
    modal3.style.display = "none";
}