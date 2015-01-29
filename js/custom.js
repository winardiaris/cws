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
//function prints(){
	//a = $(".panel-collapse");b = a.length;
	//for (i=1;i<=b;i++){a.addClass("in");}
	
	//c = $(".btn");d=c.length;
	//for (j=1;j<=d;j++){c.addClass("hidden");}
	
	//e = $(".form-control"); f=e.length;
	//for (k=1;k<=f;k++){e.addClass("form-control-print").removeClass("form-control");}

	//g = $("table"); h=g.length;
	//for (l=1;l<=h;l++){e.addClass("table-bordered");}
	
	////alert(h);
	//window.print();
	
//}

