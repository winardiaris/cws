function setdisplay(ID,s) {
  if (s == "1") {
    $(ID).fadeIn();
  } else {
   $(ID).fadeOut();
  }
}
function CalAge(d,a){
	var dob = $(d).val();	
	if(dob != ''){
		var str=dob.split('-');    
		var firstdate=new Date(str[0],str[1],str[2]);
		var today = new Date();        
		var dayDiff = Math.ceil(today.getTime() - firstdate.getTime()) / (1000 * 60 * 60 * 24 * 365);
		var age = parseInt(dayDiff);
		$(a).val(age);
	}
}

