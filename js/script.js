function visa(){
	var text = document.getElementById("valfriText").value;
	
if (text===""){
alert("Den är ju tom för fan, skriv något i rutan!");

}
else{
	alert(text);
}


}


Function raknare(){
for (var i = 0; i <= 11; i++) {
	var a += i +"<br>";
	document.write(a); 
	}

}

var question = function(){
var svar = confirm("Glad idag?");	
if (svar){
 alert("Fint att höra!");
}
else{
 alert("Hur ska vi lösa detta?");	
}
}



$(document).ready(function(){
 $("h1").mouseenter(function(){
 	$("h1").fadeTo(100,0.4);

 });


 $("h1").mouseleave(function(){
 	$("h1").fadeTo(100, 1.0);

 });

});