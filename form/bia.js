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
				alert("Please insert UNHCR Case Number");
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
				alert("Please insert UNHCR Case Number");
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
		$("#person1").change(function(){
			datanya = "&file_no="+file_no+"&value="+$(this).val();
			$.ajax({url:"form/bia-action.php",data:"op=saveph1"+datanya,cache:false,
				beforeSend:function(){$("#thistory").text("Saving data...")},
				success: function(msg){
					if(msg=="success"){$("#thistory").text("Data saved");}
					else{$("#thistory").text("Data not saved");}
				}
			});
		});
		$("#person2").change(function(){
			datanya = "&file_no="+file_no+"&value="+$(this).val();
			$.ajax({url:"form/bia-action.php",data:"op=saveph2"+datanya,cache:false,
				beforeSend:function(){$("#thistory").text("Saving data...")},
				success: function(msg){
					if(msg=="success"){$("#thistory").text("Data saved");}
					else{$("#thistory").text("Data not saved");}
				}
			});
		});
		$("#person3").change(function(){
			datanya = "&file_no="+file_no+"&value="+$(this).val();
			$.ajax({url:"form/bia-action.php",data:"op=saveph3"+datanya,cache:false,
				beforeSend:function(){$("#thistory").text("Saving data...")},
				success: function(msg){
					if(msg=="success"){$("#thistory").text("Data saved");}
					else{$("#thistory").text("Data not saved");}
				}
			});
		});
		$("#save_2").click(function(){
			alert("Data has been saved !!");
			$("#collapsePersonal").removeClass("in");
			$("#collapseIdentified").addClass("in");
			$("#thistory").text('');
			document.location.href="#collapseIdentified";
		});
		//Types of identified vulnerabilities
		$("#toiva1d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva1a:checked").length,b=$("#toiva1b:checked").length,c=$("#toiva1c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva1"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva2d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva2a:checked").length,b=$("#toiva2b:checked").length,c=$("#toiva2c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva2"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva3d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva3a:checked").length,b=$("#toiva3b:checked").length,c=$("#toiva3c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva3"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva4d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva4a:checked").length,b=$("#toiva4b:checked").length,c=$("#toiva4c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva4"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva5d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva5a:checked").length,b=$("#toiva5b:checked").length,c=$("#toiva5c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva5"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva6d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva6a:checked").length,b=$("#toiva6b:checked").length,c=$("#toiva6c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva6"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva7d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva7a:checked").length,b=$("#toiva7b:checked").length,c=$("#toiva7c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva7"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva8d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva8a:checked").length,b=$("#toiva8b:checked").length,c=$("#toiva8c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva8"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva9d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva9a:checked").length,b=$("#toiva9b:checked").length,c=$("#toiva9c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva9"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva10d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva10a:checked").length,b=$("#toiva10b:checked").length,c=$("#toiva10c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva10"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva11d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva11a:checked").length,b=$("#toiva11b:checked").length,c=$("#toiva11c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva11"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva12d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva12a:checked").length,b=$("#toiva12b:checked").length,c=$("#toiva12c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva12"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva13d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva13a:checked").length,b=$("#toiva13b:checked").length,c=$("#toiva13c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva13"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva14d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva14a:checked").length,b=$("#toiva14b:checked").length,c=$("#toiva14c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva14"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva15d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva15a:checked").length,b=$("#toiva15b:checked").length,c=$("#toiva15c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva15"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva16d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva16a:checked").length,b=$("#toiva16b:checked").length,c=$("#toiva16c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva16"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva17d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva17a:checked").length,b=$("#toiva17b:checked").length,c=$("#toiva17c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva17"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva18d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva18a:checked").length,b=$("#toiva18b:checked").length,c=$("#toiva18c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva18"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva19d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva19a:checked").length,b=$("#toiva19b:checked").length,c=$("#toiva19c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva19"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva20d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva20a:checked").length,b=$("#toiva20b:checked").length,c=$("#toiva20c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva20"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva21d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva21a:checked").length,b=$("#toiva21b:checked").length,c=$("#toiva21c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva21"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toiva22d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva22a:checked").length,b=$("#toiva22b:checked").length,c=$("#toiva22c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva22"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });


		$("#toiva22d").change(function(){ var file_no=$("#file_no").val(), a=$("#toiva22a:checked").length,b=$("#toiva22b:checked").length,c=$("#toiva22c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoiva22"+datanya,cache:false, beforeSend:function(){$("#ttoiva").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoiva").text("Data saved");}else{$("#ttoiva").text("Data not saved !!");}}}); });

		$("#toivb1d").change(function(){ var file_no=$("#file_no").val(), a=$("#toivb1a:checked").length,b=$("#toivb1b:checked").length,c=$("#toivb1c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoivb1"+datanya,cache:false, beforeSend:function(){$("#ttoivb").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoivb").text("Data saved");}else{$("#ttoivb").text("Data not saved !!");}}}); });

		//toivb
		$("#toivb2d").change(function(){ var file_no=$("#file_no").val(), a=$("#toivb2a:checked").length,b=$("#toivb2b:checked").length,c=$("#toivb2c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoivb2"+datanya,cache:false, beforeSend:function(){$("#ttoivb").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoivb").text("Data saved");}else{$("#ttoivb").text("Data not saved !!");}}}); });

		$("#toivb3d").change(function(){ var file_no=$("#file_no").val(), a=$("#toivb3a:checked").length,b=$("#toivb3b:checked").length,c=$("#toivb3c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoivb3"+datanya,cache:false, beforeSend:function(){$("#ttoivb").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoivb").text("Data saved");}else{$("#ttoivb").text("Data not saved !!");}}}); });

		$("#toivb4d").change(function(){ var file_no=$("#file_no").val(), a=$("#toivb4a:checked").length,b=$("#toivb4b:checked").length,c=$("#toivb4c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoivb4"+datanya,cache:false, beforeSend:function(){$("#ttoivb").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoivb").text("Data saved");}else{$("#ttoivb").text("Data not saved !!");}}}); });

		$("#toivb5d").change(function(){ var file_no=$("#file_no").val(), a=$("#toivb5a:checked").length,b=$("#toivb5b:checked").length,c=$("#toivb5c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoivb5"+datanya,cache:false, beforeSend:function(){$("#ttoivb").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoivb").text("Data saved");}else{$("#ttoivb").text("Data not saved !!");}}}); });

		$("#toivb6d").change(function(){ var file_no=$("#file_no").val(), a=$("#toivb6a:checked").length,b=$("#toivb6b:checked").length,c=$("#toivb6c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoivb6"+datanya,cache:false, beforeSend:function(){$("#ttoivb").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoivb").text("Data saved");}else{$("#ttoivb").text("Data not saved !!");}}}); });

		$("#toivb7d").change(function(){ var file_no=$("#file_no").val(), a=$("#toivb7a:checked").length,b=$("#toivb7b:checked").length,c=$("#toivb7c:checked").length,d=$(this).val(), datanya="&file_no="+file_no+"&value="+a+";"+b+";"+c+";"+d; $.ajax({url:"form/bia-action.php",data:"op=savetoivb7"+datanya,cache:false, beforeSend:function(){$("#ttoivb").text("Saving data...")}, success:function(msg){if(msg=="success"){$("#ttoivb").text("Data saved");}else{$("#ttoivb").text("Data not saved !!");}}}); });

		$("#save_3").click(function(){
			 $("#ttoiva").text('');
			 $("#ttoivb").text('');
			 alert("Data has been saved !!");
			 $("#collapseIdentified").removeClass("in");
			 $("#collapseEdu").addClass("in");
			 document.location.href="#collapseEdu";
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
						document.location.href="#collapseHealth";
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
						document.location.href="#collapsePsy";
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
						document.location.href="#collapseInteraction";
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
						document.location.href="#collapseLiving";
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
						document.location.href="#collapseCWS";
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
						document.location.href="#collapseoptional";
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
