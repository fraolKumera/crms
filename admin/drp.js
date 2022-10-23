function myFunction(){
	var x =
	document.getElementbyId("myTopnav");
	if (x.className === "topnav") {
		x.className +="responsive";
	}else{
		x.className ="topnav"
	}
}