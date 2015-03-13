$(document).ready(function(){
	var	file_no = $("#file_no").val(),
		aa = $("#col9aa"),ab = $("#col9ab"),
		ba = $("#col9ba"),bb = $("#col9bb"),
		ca = $("#col9ca"),cb = $("#col9cb"),
		da = $("#col9da"),db = $("#col9db"),
		ea = $("#col9ea"),eb = $("#col9eb");
		
		ab.slideUp();bb.slideUp();cb.slideUp(),db.slideUp();eb.slideUp();
		
		$(aa).click(function(){
			if (ab.is(':visible')) {ab.slideUp(100);}
			else {window.location="#col9aa";ab.slideDown();bb.slideUp();cb.slideUp();db.slideUp();eb.slideUp();}
		});
		$(ba).click(function(){
			if (bb.is(':visible')) {bb.slideUp(100);}
			else {window.location="#col9ba";bb.slideDown();ab.slideUp();cb.slideUp();db.slideUp();eb.slideUp();}
		});
		$(ca).click(function(){
			if (cb.is(':visible')) {cb.slideUp(100);}
			else {window.location="#col9ca";cb.slideDown();ab.slideUp();bb.slideUp();db.slideUp();eb.slideUp();}
		});
		$(da).click(function(){
			if (db.is(':visible')) {db.slideUp(100);}
			else {window.location="#col9da";db.slideDown();ab.slideUp();bb.slideUp();cb.slideUp();eb.slideUp();}
		});
		$(ea).click(function(){
			if (eb.is(':visible')) {eb.slideUp(100);}
			else {window.location="#col9ea";eb.slideDown();ab.slideUp();bb.slideUp();cb.slideUp();db.slideUp();}
		});
		
		//check available
		$("#file_no").change(function(){
			var datanya = "&file_no="+$(this).val();
			
			$.ajax({url: "form/bia-action.php",data: "op=check"+datanya,cache: false,
				success: function(msg){
					if(msg=="inuse"){
						$("#a").addClass("text-warning").removeClass("text-success text-danger").html("<i class='fa fa-warning'></i> In use");
					}
					else if(msg=="avail"){
						$("#a").addClass("text-success").removeClass("text-danger text-warning").html("<i class='fa fa-check'></i> Available");
					}
					else{
						$("#a").addClass("text-danger").removeClass("text-success text-warning").html("<i class='fa fa-warning'></i> No Data");
					}
				}
			});
		});
		
		//Date of Assessment
		$("#save_1").click(function(){
			var	file_no = $("#file_no").val();
			if(file_no == ""){
				alert("Please insert File No");
				$("#file_no").val("").focus();
			}
			else if($("#a").hasClass("text-warning")){
				alert("File Number in use");
				$("#file_no").val("").focus();
			}
			else if($("#a").hasClass("text-danger")){
				var r = confirm("No Data for ["+file_no+"], Add new Data?");
				if (r == true) {window.location="?page=person-form";} 
				else {$("#file_no").val("").focus();}
			}
			else{	
				var	doa = $("#date_assessment").val(),
					location = $("#location_assessment").val(),
					cworker = $("#case_worker").val(),
					org = $("#org").val(),
					inorg = $("#inorg").val(),
					ioc = $('input:radio[name=ioc]:checked').val();
					
					if(ioc == "other"){
						var others = $("#others").val();
						var datanya = "&file_no="+file_no+"&doa="+doa+"&value="+location+";"+cworker+";"+org+";"+inorg+";"+ioc+";"+others;
					}
					
					else{
						var datanya = "&file_no="+file_no+"&doa="+doa+"&value="+location+";"+cworker+";"+org+";"+inorg+";"+ioc;
					}
					$.ajax({url:"form/bia-action.php",data:"op=saveassessment"+datanya,cache:false,success: function(msg){
							if(msg=="success"){
								alert("Data has been saved !!");
								$("#collapseDate").removeClass("in");
								$("#collapsePersonal").addClass("in");
								if(file_no !=""){
									$("#file_no").attr("disabled", true);
								}
								}else{alert("Data not saved !!");}}
					});
			}
		});
		//update Date of Assessment
		$("#update_1").click(function(){
			var	file_no = $("#file_no").val();
			if(file_no == ""){
				alert("Please insert File No");
				$("#file_no").val("").focus();
			}
			else if($("#a").hasClass("text-warning")){
				alert("File Number in use");
				$("#file_no").val("").focus();
			}
			else if($("#a").hasClass("text-danger")){
				var r = confirm("No Data for ["+file_no+"], Add new Data?");
				if (r == true) {window.location="?page=person-form";} 
				else {$("#file_no").val("").focus();}
			}
			else{	
				var	doa = $("#date_assessment").val(),
					location = $("#location_assessment").val(),
					cworker = $("#case_worker").val(),
					org = $("#org").val(),
					inorg = $("#inorg").val(),
					ioc = $('input:radio[name=ioc]:checked').val();
					
					if(ioc == "other"){
						var others = $("#others").val();
						var datanya = "&file_no="+file_no+"&doa="+doa+"&value="+location+";"+cworker+";"+org+";"+inorg+";"+ioc+";"+others;
					}
					
					else{
						var datanya = "&file_no="+file_no+"&doa="+doa+"&value="+location+";"+cworker+";"+org+";"+inorg+";"+ioc;
					}
					$.ajax({url:"form/bia-action.php",data:"op=updateassessment"+datanya,cache:false,success: function(msg){
							if(msg=="success"){
								alert("Data has been updated !!");
								$("#collapseDate").removeClass("in");
								$("#collapsePersonal").addClass("in");
								if(file_no !=""){
									$("#file_no").attr("disabled", true);
								}
								}else{alert("Data not saved !!");}}
					});
			}
		});
		//Personal history
		$("#save_2").click(function(){
			var	file_no = $("#file_no").val(),
				person1 = $("#person1").val(),
				person2 = $("#person2").val(),
				person3 = $("#person3").val(),
				datanya = "&file_no="+file_no+"&value="+person1+";"+person2+";"+person3;
				$.ajax({url:"form/bia-action.php",data:"op=savehistory"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#collapsePersonal").removeClass("in");
						$("#collapseIdentified").addClass("in");
					}else{alert("Data not saved !!");}}
				});
		});
		//Types of identified vulnerabilities
		$("#save_3").click(function(){
			var	file_no = $("#file_no").val(),
				toiv1a = $("#toiv1a:checked").length, toiv1b = $("#toiv1b:checked").length, toiv1c = $("#toiv1c:checked").length, toiv1d = $("#toiv1d").val(), toiv2a = $("#toiv2a:checked").length, toiv2b = $("#toiv2b:checked").length, toiv2c = $("#toiv2c:checked").length, toiv2d = $("#toiv2d").val(), toiv3a = $("#toiv3a:checked").length, toiv3b = $("#toiv3b:checked").length, toiv3c = $("#toiv3c:checked").length, toiv3d = $("#toiv3d").val(), toiv4a = $("#toiv4a:checked").length, toiv4b = $("#toiv4b:checked").length, toiv4c = $("#toiv4c:checked").length, toiv4d = $("#toiv4d").val(), toiv5a = $("#toiv5a:checked").length, toiv5b = $("#toiv5b:checked").length, toiv5c = $("#toiv5c:checked").length, toiv5d = $("#toiv5d").val(), toiv6a = $("#toiv6a:checked").length, toiv6b = $("#toiv6b:checked").length, toiv6c = $("#toiv6c:checked").length, toiv6d = $("#toiv6d").val(), toiv7a = $("#toiv7a:checked").length, toiv7b = $("#toiv7b:checked").length, toiv7c = $("#toiv7c:checked").length, toiv7d = $("#toiv7d").val(), toiv8a = $("#toiv8a:checked").length, toiv8b = $("#toiv8b:checked").length, toiv8c = $("#toiv8c:checked").length, toiv8d = $("#toiv8d").val(), toiv9a = $("#toiv9a:checked").length, toiv9b = $("#toiv9b:checked").length, toiv9c = $("#toiv9c:checked").length, toiv9d = $("#toiv9d").val(), toiv10a = $("#toiv10a:checked").length, toiv10b = $("#toiv10b:checked").length, toiv10c = $("#toiv10c:checked").length, toiv10d = $("#toiv10d").val(), toiv11a = $("#toiv11a:checked").length, toiv11b = $("#toiv11b:checked").length, toiv11c = $("#toiv11c:checked").length, toiv11d = $("#toiv11d").val(), toiv12a = $("#toiv12a:checked").length, toiv12b = $("#toiv12b:checked").length, toiv12c = $("#toiv12c:checked").length, toiv12d = $("#toiv12d").val(), toiv13a = $("#toiv13a:checked").length, toiv13b = $("#toiv13b:checked").length, toiv13c = $("#toiv13c:checked").length, toiv13d = $("#toiv13d").val(), toiv14a = $("#toiv14a:checked").length, toiv14b = $("#toiv14b:checked").length, toiv14c = $("#toiv14c:checked").length, toiv14d = $("#toiv14d").val(), toiv15a = $("#toiv15a:checked").length, toiv15b = $("#toiv15b:checked").length, toiv15c = $("#toiv15c:checked").length, toiv15d = $("#toiv15d").val(), toiv16a = $("#toiv16a:checked").length, toiv16b = $("#toiv16b:checked").length, toiv16c = $("#toiv16c:checked").length, toiv16d = $("#toiv16d").val(), toiv17a = $("#toiv17a:checked").length, toiv17b = $("#toiv17b:checked").length, toiv17c = $("#toiv17c:checked").length, toiv17d = $("#toiv17d").val(), toiv18a = $("#toiv18a:checked").length, toiv18b = $("#toiv18b:checked").length, toiv18c = $("#toiv18c:checked").length, toiv18d = $("#toiv18d").val(), toiv19a = $("#toiv19a:checked").length, toiv19b = $("#toiv19b:checked").length, toiv19c = $("#toiv19c:checked").length, toiv19d = $("#toiv19d").val(), toiv20a = $("#toiv20a:checked").length, toiv20b = $("#toiv20b:checked").length, toiv20c = $("#toiv20c:checked").length, toiv20d = $("#toiv20d").val(), toiv21a = $("#toiv21a:checked").length, toiv21b = $("#toiv21b:checked").length, toiv21c = $("#toiv21c:checked").length, toiv21d = $("#toiv21d").val(), toiv22a = $("#toiv22a:checked").length, toiv22b = $("#toiv22b:checked").length, toiv22c = $("#toiv22c:checked").length, toiv22d = $("#toiv22d").val(), toiv23a = $("#toiv23a:checked").length, toiv23b = $("#toiv23b:checked").length, toiv23c = $("#toiv23c:checked").length, toiv23d = $("#toiv23d").val(), toiv24a = $("#toiv24a:checked").length, toiv24b = $("#toiv24b:checked").length, toiv24c = $("#toiv24c:checked").length, toiv24d = $("#toiv24d").val(), toiv25a = $("#toiv25a:checked").length, toiv25b = $("#toiv25b:checked").length, toiv25c = $("#toiv25c:checked").length, toiv25d = $("#toiv25d").val(), toiv26a = $("#toiv26a:checked").length, toiv26b = $("#toiv26b:checked").length, toiv26c = $("#toiv26c:checked").length, toiv26d = $("#toiv26d").val(), toiv27a = $("#toiv27a:checked").length, toiv27b = $("#toiv27b:checked").length, toiv27c = $("#toiv27c:checked").length, toiv27d = $("#toiv27d").val(), toiv28a = $("#toiv28a:checked").length, toiv28b = $("#toiv28b:checked").length, toiv28c = $("#toiv28c:checked").length, toiv28d = $("#toiv28d").val(), toiv29a = $("#toiv29a:checked").length, toiv29b = $("#toiv29b:checked").length, toiv29c = $("#toiv29c:checked").length, toiv29d = $("#toiv29d").val();
				
			var datanya = "&file_no="+file_no+"&value="+toiv1a+";"+toiv1b+";"+toiv1c+";"+toiv1d+";"+toiv2a+";"+toiv2b+";"+toiv2c+";"+toiv2d+";"+toiv3a+";"+toiv3b+";"+toiv3c+";"+toiv3d+";"+toiv4a+";"+toiv4b+";"+toiv4c+";"+toiv4d+";"+toiv5a+";"+toiv5b+";"+toiv5c+";"+toiv5d+";"+toiv6a+";"+toiv6b+";"+toiv6c+";"+toiv6d+";"+toiv7a+";"+toiv7b+";"+toiv7c+";"+toiv7d+";"+toiv8a+";"+toiv8b+";"+toiv8c+";"+toiv8d+";"+toiv9a+";"+toiv9b+";"+toiv9c+";"+toiv9d+";"+toiv10a+";"+toiv10b+";"+toiv10c+";"+toiv10d+";"+toiv11a+";"+toiv11b+";"+toiv11c+";"+toiv11d+";"+toiv12a+";"+toiv12b+";"+toiv12c+";"+toiv12d+";"+toiv13a+";"+toiv13b+";"+toiv13c+";"+toiv13d+";"+toiv14a+";"+toiv14b+";"+toiv14c+";"+toiv14d+";"+toiv15a+";"+toiv15b+";"+toiv15c+";"+toiv15d+";"+toiv16a+";"+toiv16b+";"+toiv16c+";"+toiv16d+";"+toiv17a+";"+toiv17b+";"+toiv17c+";"+toiv17d+";"+toiv18a+";"+toiv18b+";"+toiv18c+";"+toiv18d+";"+toiv19a+";"+toiv19b+";"+toiv19c+";"+toiv19d+";"+toiv20a+";"+toiv20b+";"+toiv20c+";"+toiv20d+";"+toiv21a+";"+toiv21b+";"+toiv21c+";"+toiv21d+";"+toiv22a+";"+toiv22b+";"+toiv22c+";"+toiv22d+";"+toiv23a+";"+toiv23b+";"+toiv23c+";"+toiv23d+";"+toiv24a+";"+toiv24b+";"+toiv24c+";"+toiv24d+";"+toiv25a+";"+toiv25b+";"+toiv25c+";"+toiv25d+";"+toiv26a+";"+toiv26b+";"+toiv26c+";"+toiv26d+";"+toiv27a+";"+toiv27b+";"+toiv27c+";"+toiv27d+";"+toiv28a+";"+toiv28b+";"+toiv28c+";"+toiv28d+";"+toiv29a+";"+toiv29b+";"+toiv29c+";"+toiv29d;
			
			
				$.ajax({url:"form/bia-action.php",data:"op=savetoiv"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#collapseIdentified").removeClass("in");
						$("#collapseEdu").addClass("in");
					}else{alert("Data not saved !!");}}
				});
		});
		// education
		$("#save_4").click(function(){
			var	file_no = $("#file_no").val(),
				edu1 = $("#edu1").val(),edu2 = $("#edu2").val(),edu3 = $("#edu3").val(),edu4 = $("#edu4").val(),
				edu5 = $("#edu5").val(),edu6 = $("#edu6").val(),edu7 = $("#edu7").val();
			var datanya = "&file_no="+file_no+"&value="+edu1+";"+edu2+";"+edu3+";"+edu4+";"+edu5+";"+edu6+";"+edu7;
				$.ajax({url:"form/bia-action.php",data:"op=saveedu"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#collapseEdu").removeClass("in");
						$("#collapseHealth").addClass("in");
					}else{alert("Data not saved !!");}}
				});
		});
		// health
		$("#save_5").click(function(){
			var	file_no = $("#file_no").val(),
				health1 = $("#health1").val(),
				health2 = $("#health2").val(),
				health3 = $('input:radio[name=health3]:checked').val(),
				health4 = $("#health4").val(),
				health5a = $("#health5a:checked").length, health5b = $("#health5b:checked").length,health5c = $("#health5c:checked").length,health5d = $("#health5d").val(),health6a = $("#health6a:checked").length, health6b = $("#health6b:checked").length,health6c = $("#health6c:checked").length,health6d = $("#health6d").val(),health7a = $("#health7a:checked").length, health7b = $("#health7b:checked").length,health7c = $("#health7c:checked").length,health7d = $("#health7d").val(),health8a = $("#health8a:checked").length, health8b = $("#health8b:checked").length,health8c = $("#health8c:checked").length,health8d = $("#health8d").val(),health9a = $("#health9a:checked").length, health9b = $("#health9b:checked").length,health9c = $("#health9c:checked").length,health9d = $("#health9d").val();
			
			var datanya = "&file_no="+file_no+"&value="+health1+";"+health2+";"+health3+";"+health4+";"+health5a+";"+health5b+";"+health5c+";"+health5d+";"+health6a+";"+health6b+";"+health6c+";"+health6d+";"+health7a+";"+health7b+";"+health7c+";"+health7d+";"+health8a+";"+health8b+";"+health8c+";"+health8d+";"+health9a+";"+health9b+";"+health9c+";"+health9d;
				
				$.ajax({url:"form/bia-action.php",data:"op=savehealth"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#collapseHealth").removeClass("in");
						$("#collapsePsy").addClass("in");
					}else{alert("Data not saved !!");}}
				});
		});
		//Psychosocial
		$("#save_6").click(function(){
			var	file_no = $("#file_no").val(),
				psy1 = $("#psy1").val(),psy2 = $("#psy2").val(),psy3 = $("#psy3").val(),psy4 = $("#psy4").val(),psy5 = $("#psy5").val(),psy6 = $("#psy6").val(),psy7 = $("#psy7").val(),
				psy8a = $('input:radio[name=psy8a]:checked').val(),psy8b = $("#psy8b").val(),psy9a = $('input:radio[name=psy9a]:checked').val(),psy9b = $("#psy9b").val(),psy10a = $('input:radio[name=psy10a]:checked').val(),psy10b = $("#psy10b").val(),psy11a = $('input:radio[name=psy11a]:checked').val(),psy11b = $("#psy11b").val(),psy12a = $('input:radio[name=psy12a]:checked').val(),psy12b = $("#psy12b").val(),psy13a = $('input:radio[name=psy13a]:checked').val(),psy13b = $("#psy13b").val(),psy14a = $('input:radio[name=psy14a]:checked').val(),psy14b = $("#psy14b").val(),psy15a = $('input:radio[name=psy15a]:checked').val(),psy15b = $("#psy15b").val(),psy16a = $('input:radio[name=psy16a]:checked').val(),psy16b = $("#psy16b").val(),psy17a = $('input:radio[name=psy17a]:checked').val(),psy17b = $("#psy17b").val(),psy18a = $('input:radio[name=psy18a]:checked').val(),psy18b = $("#psy18b").val();
			var datanya = "&file_no="+file_no+"&value="+psy1+";"+psy2+";"+psy3+";"+psy4+";"+psy5+";"+psy6+";"+psy7+";"+psy8a+";"+psy8b+";"+psy9a+";"+psy9b+";"+psy10a+";"+psy10b+";"+psy11a+";"+psy11b+";"+psy12a+";"+psy12b+";"+psy13a+";"+psy13b+";"+psy14a+";"+psy14b+";"+psy15a+";"+psy15b+";"+psy16a+";"+psy16b+";"+psy17a+";"+psy17b+";"+psy18a+";"+psy18b;
			
				$.ajax({url:"form/bia-action.php",data:"op=savepsy"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#collapsePsy").removeClass("in");
						$("#collapseInteraction").addClass("in");
					}else{alert("Data not saved !!");}}
				});
		});
		//interaction
		$("#save_7").click(function(){
			var	file_no = $("#file_no").val(),
				interaction = $("#interaction").val();
				datanya ="&file_no="+file_no+"&value="+interaction;
			
				$.ajax({url:"form/bia-action.php",data:"op=saveinter"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#collapseInteraction").removeClass("in");
						$("#collapseLiving").addClass("in");
					}else{alert("Data not saved !!");}}
				});
		});
		//living condition
		//a
		$("#save_living_a").click(function(){
			var file_no = $("#file_no").val(),
			liva1 = $("#liva1").val(),
			liva2 = $("#liva2").val(),
			liva3 = $("#liva3").val(),
			liva4 = $('input:radio[name=liva4]:checked').val(),
			liva5 = $("#liva5").val(),
			liva6 = $("#liva6").val(),
			datanya = "&file_no="+file_no+"&value="+liva1+";"+liva2+";"+liva3+";"+liva4+";"+liva5+";"+liva6;
			
			$.ajax({url:"form/bia-action.php",data:"op=saveliva"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#col9ab").slideUp();
						$("#col9ba").trigger("click");
					}else{alert("Data not saved !!");}}
			});
		});
		//b
		$("#save_living_b").click(function(){
			var	file_no = $("#file_no").val(),
				livb1 = $("#livb1:checked").length,livb2 = $("#livb2:checked").length,livb3 = $("#livb3:checked").length,livb4 = $("#livb4:checked").length,livb5 = $("#livb5:checked").length,livb6 = $("#livb6:checked").length,livb7 = $("#livb7:checked").length,livb8 = $("#livb8:checked").length,livb9 = $("#livb9:checked").length,livb10 = $("#livb10:checked").length,livb11 = $("#livb11:checked").length,livb12 = $("#livb12:checked").length,
				livb13 = $("#livb13").val();
			var datanya = "&file_no="+file_no+"&value="+livb1+";"+livb2+";"+livb3+";"+livb4+";"+livb5+";"+livb6+";"+livb7+";"+livb8+";"+livb9+";"+livb10+";"+livb11+";"+livb12+";"+livb13;
			
			$.ajax({url:"form/bia-action.php",data:"op=savelivb"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#col9bb").slideUp();
						$("#col9ca").trigger("click");
					}else{alert("Data not saved !!");}}
			});
		});
		//c
		$("#save_living_c").click(function(){
			var	file_no = $("#file_no").val(),
				livc1a = $("#livc1a:checked").length,livc1b = $('input:radio[name=livc1b]:checked').val(),
				livc2a = $("#livc2a:checked").length,livc2b = $('input:radio[name=livc2b]:checked').val(),
				livc3a = $("#livc3a:checked").length,livc3b = $('input:radio[name=livc3b]:checked').val(),
				livc4a = $("#livc4a:checked").length,livc4b = $('input:radio[name=livc4b]:checked').val(),
				livc5a = $("#livc5a:checked").length,livc5b = $('input:radio[name=livc5b]:checked').val(),
				livc6a = $("#livc6a:checked").length,livc6b = $('input:radio[name=livc6b]:checked').val(),
				livc7a = $("#livc7a:checked").length,livc7b = $('input:radio[name=livc7b]:checked').val(),
				livc8a = $("#livc8a:checked").length,livc8b = $('input:radio[name=livc8b]:checked').val(),
				livc9a = $("#livc9a:checked").length,livc9b = $('input:radio[name=livc9b]:checked').val(),
				livc10a = $("#livc10a:checked").length,livc10b = $('input:radio[name=livc10b]:checked').val(),
				livc11a = $("#livc11a:checked").length,livc11b = $('input:radio[name=livc11b]:checked').val(),
				livc12a = $("#livc12a:checked").length,livc12b = $('input:radio[name=livc12b]:checked').val();
			var datanya="&file_no="+file_no+"&value="+livc1a+";"+livc1b+";"+livc2a+";"+livc2b+";"+livc3a+";"+livc3b+";"+livc4a+";"+livc4b+";"+livc5a+";"+livc5b+";"+livc6a+";"+livc6b+";"+livc7a+";"+livc7b+";"+livc8a+";"+livc8b+";"+livc9a+";"+livc9b+";"+livc10a+";"+livc10b+";"+livc11a+";"+livc11b+";"+livc12a+";"+livc12b;
			
			$.ajax({url:"form/bia-action.php",data:"op=savelivc"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#col9cb").slideUp();
						$("#col9da").trigger("click");
					}else{alert("Data not saved !!");}}
			});	
		});
		//d
		$("#save_living_d").click(function(){
			var	file_no = $("#file_no").val(),
				livd1 = $("#livd1:checked").length,
				livd2 = $("#livd2:checked").length,
				livd3 = $("#livd3:checked").length,
				livd4 = $("#livd4:checked").length,
				livd5 = $("#livd5:checked").length,
				livd6 = $("#livd6:checked").length,
				livd7 = $("#livd7:checked").length,
				livd8 = $("#livd8").val(),
				datanya="&file_no="+file_no+"&value="+livd1+";"+livd2+";"+livd3+";"+livd4+";"+livd5+";"+livd6+";"+livd7+";"+livd8;
			
			$.ajax({url:"form/bia-action.php",data:"op=savelivd"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#col9db").slideUp();
						$("#col9ea").trigger("click");
					}else{alert("Data not saved !!");}}
			});	
		});
		//e
		$("#save_living_e").click(function(){
			var	file_no = $("#file_no").val(),
				live1 = $("#live1").val(),
				live2 = $("#live2:checked").length,
				live3 = $("#live3:checked").length,
				live4 = $("#live4:checked").length,
				live5 = $("#live5").val(),
				datanya = "&file_no="+file_no+"&value="+live1+";"+live2+";"+live3+";"+live4+";"+live5;
			
			$.ajax({url:"form/bia-action.php",data:"op=savelive"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#col9eb").slideUp();
					}else{alert("Data not saved !!");}}
			});	
		});
		//financial situation and supporting system
		$("#save_8").click(function(){
			var	file_no = $("#file_no").val(),
				fin1 = $("#fin1").val(),fin2 = $("#fin2").val(),fin3 = $("#fin3").val(),fin4 = $("#fin4:checked").length,fin5 = $("#fin5:checked").length,fin6 = $("#fin6:checked").length,fin7 = $("#fin7:checked").length,fin8 = $("#fin8:checked").length,fin9 = $("#fin9:checked").length,fin10 = $("#fin10:checked").length,fin11 = $("#fin11").val(),fin12 = $("#fin12").val();
			var datanya = "&file_no="+file_no+"&value="+fin1+";"+fin2+";"+fin3+";"+fin4+";"+fin5+";"+fin6+";"+fin7+";"+fin8+";"+fin9+";"+fin10+";"+fin11+";"+fin12;
			
			$.ajax({url:"form/bia-action.php",data:"op=savefin"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#collapseFinancial").removeClass("in");
						$("#collapseCWS").addClass("in");
					}else{alert("Data not saved !!");}}
			});
		});
		// CWS analysis
		$("#save_9").click(function(){
			var	file_no = $("#file_no").val(),
				cws1a = $('input:radio[name=cws1]:checked').val(),cws1b = $("#cws1").val(),cws2a = $('input:radio[name=cws2]:checked').val(),cws2b = $("#cws2").val(),cws3a = $('input:radio[name=cws3]:checked').val(),cws3b = $("#cws3").val(),cws4a = $('input:radio[name=cws4]:checked').val(),cws4b = $("#cws4").val(),cws5a = $('input:radio[name=cws5]:checked').val(),cws5b = $("#cws5").val(),cws6a = $('input:radio[name=cws6]:checked').val(),cws6b = $("#cws6").val(),cws7a = $('input:radio[name=cws7]:checked').val(),cws7b = $("#cws7").val(),cws8a = $('input:radio[name=cws8]:checked').val(),cws8b = $("#cws8").val(),cws9a = $('input:radio[name=cws9]:checked').val(),cws9b = $("#cws9").val(),cws10a = $('input:radio[name=cws10]:checked').val(),cws10b = $("#cws10").val(),cws11a = $('input:radio[name=cws11]:checked').val(),cws11b = $("#cws11").val(),cws12a = $('input:radio[name=cws12]:checked').val(),cws12b = $("#cws12").val(),cws13a = $('input:radio[name=cws13]:checked').val(),cws13b = $("#cws13").val(),cws14a = $('input:radio[name=cws14]:checked').val(),cws14b = $("#cws14").val(),cws15=$("#cws15").val();
			var datanya = "&file_no="+file_no+"&value="+cws1a+";"+cws1b+";"+cws2a+";"+cws2b+";"+cws3a+";"+cws3b+";"+cws4a+";"+cws4b+";"+cws5a+";"+cws5b+";"+cws6a+";"+cws6b+";"+cws7a+";"+cws7b+";"+cws8a+";"+cws8b+";"+cws9a+";"+cws9b+";"+cws10a+";"+cws10b+";"+cws11a+";"+cws11b+";"+cws12a+";"+cws12b+";"+cws13a+";"+cws13b+";"+cws14a+";"+cws14b+";"+cws15;
			
			
			$.ajax({url:"form/bia-action.php",data:"op=savecws"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#collapseCWS").removeClass("in");
						$("#collapseoptional").addClass("in");
					}else{alert("Data not saved !!");}}
			});
		});
		// optional
		$("#save_opt").click(function(){
			var	file_no = $("#file_no").val(),opt1 = $("#opt1").val(),opt2 = $("#opt2").val(),opt3 = $("#opt3").val(),opt4 = $("#opt4").val(),datanya="&file_no="+file_no+"&value="+opt1+";"+opt2+";"+opt3+";"+opt4;
			$.ajax({url:"form/bia-action.php",data:"op=saveopt"+datanya,cache:false,success: function(msg){
					if(msg=="success"){
						alert("Data has been saved !!");
						$("#collapseoptional").removeClass("in");
						window.location="?page=bia-data";
					}else{alert("Data not saved !!");}}
			});
		});
		
		
		//comment
		$("#comment").change(function(){
			var	file_no = $("#file_no").val(),comments = $(this).val();
			var 	datanya = "&file_no="+file_no+"&comment="+comments;
			$.ajax({url: "form/general-action.php",data: "op=bia_comment"+datanya,cache: false,
				beforeSend:function(){$("#t").text("Saving data...")},
				success: function(msg){
					if(msg=="success"){$("#t").text("Data saved");}
					else{$("#t").text("Data not saved !!");}
				}
			});
		});

});
