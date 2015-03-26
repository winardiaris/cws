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

function ubahSimbol(str) {
    var str1 = str.replace(/;/g, "xtitikkomax");
    var str1 = str1.replace(/:/g, "xtitikduax");
    var str1 = str1.replace(/'/g, "xpetiksatux");
    var str1 = str1.replace(/`/g, "xpetikx");
    var str1 = str1.replace(/"/g, "xpetikduax"); 
    var str1 = str1.replace(/,/g, "xkomax");   
    var str1 = str1.replace(/\./g, "xtitikx");  
    var str1 = str1.replace(/\//g, "xgaringx");  
    var str1 = str1.replace(/\\/g, "xgaring2x");  
    var str1 = str1.replace(/\|/g, "xtegakx");  
    var str1 = str1.replace(/-/g, "xstripx");  
    var str1 = str1.replace(/_/g, "xgwahx");  
    var str1 = str1.replace(/~/g, "xcacingx");  
    var str1 = str1.replace(/@/g, "xkeongx");  
    var str1 = str1.replace(/1=1/g, "x1smdgan1x");  
    var str1 = str1.replace(/!/g, "xserux");  
    var str1 = str1.replace(/</g, "xkkirix");  
    var str1 = str1.replace(/>/g, "xkkananx");    
    var str1 = str1.replace(/%/g, "xpersenx");  
	
	return str1;
}
function balikinSimbol(str){
	var str1 = str.replace(/xtitikkomax/g,";");
    var str1 = str1.replace(/xtitikduax/g,":");
    var str1 = str1.replace(/xpetiksatux/g,"'");
    var str1 = str1.replace(/xpetikx/g,"`");
    var str1 = str1.replace(/xpetikduax/g,"\""); 
    var str1 = str1.replace(/xkomax/g,",");   
    var str1 = str1.replace(/xtitikx/g,".");  
    var str1 = str1.replace(/xgaringx/g,"/");  
    var str1 = str1.replace(/xgaring2x/g,"\\");  
    var str1 = str1.replace(/xtegakx/g,"|");  
    var str1 = str1.replace(/xstripx/g,"-");  
    var str1 = str1.replace(/xgwahx/g,"_");  
    var str1 = str1.replace(/xcacingx/g,"~"); 
    var str1 = str1.replace(/xkeongx/g,"@"); 
    var str1 = str1.replace(/x1smdg1x/g,"1=1"); 
    var str1 = str1.replace(/xserux/g,"!"); 
    var str1 = str1.replace(/xkkirix/g,"<"); 
    var str1 = str1.replace(/xkkananx/g,">");  
    var str1 = str1.replace(/xpersenx/g,"%"); 
    
	return str1;
}



