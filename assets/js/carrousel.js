
$(document).ready(function(){

var imgC = 1;	
var autoBool = false;
$("#buttons").append('<p><button id = "Prec" class="button" >Precedent</button> <button id = "Suiv" class="button" >Suivant</button> <button id = "Auto" class="button" >Auto</button></p>');
	


$("#Thumbs img").css("border-style","none");
$("#Thumbs .img1").css("border-style","solid");
$("#carrousel img").css("display","none");
$("#carrousel .img1").css("display","block");
var max = 1;
ini();
function ini ()
{
while($("#carrousel .img"+max).length)
{
max = max +1;
}
max=max-1;
}

function defilement(next)
{

	if (next == true) imgC++;
	else imgC--;
		
	
	if(next == true && imgC > max) imgC = 1;
	else if (next == false && imgC < 1 ) imgC = max;
	
	$("#carrousel img").fadeTo("slow",0);
	$("#carrousel .img"+imgC).fadeTo("slow",1);
	$("#Thumbs img").css("border-style","none");
	$("#Thumbs .img"+imgC).css("border-style","solid");
}


function maBoucle(){
	
setTimeout(function(){ defilement(true);
 if (autoBool) maBoucle(); 
 } , 2000);
}

$("#Auto").click(function(){ autoBool = !autoBool;
if (autoBool) $("#Auto").text("Stop");
else $("#Auto").text ("Auto");
if (autoBool) maBoucle(); });

$("#Suiv").click(function(){	defilement(true); })
$("#Prec").click(function(){	 defilement(false); })
 

$("#Thumbs ul li img").click(function(){

	$("#carrousel img").fadeTo("slow",0)
	$("#carrousel ."+$(this).attr('class')).fadeTo("slow",1);
	$("#Thumbs img").css("border-style","none");
	$("#Thumbs ."+$(this).attr('class')).css("border-style","solid");
	
	
	imgC=parseInt($(this).attr('class')[3]);
	
});



});