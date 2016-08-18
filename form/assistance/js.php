<script>

$(document).ready(function(){
		var file_no = "";
    var fa_type_value_amount="";
    var uam="";
    var fa_value=0;

<?php
    if($edit=='1'){
    echo "//edit=1\n";
    echo "var efile_no='$file_no';";
    echo "var erfa='$rfa';";
    echo "var efa_day='$fa_day';";
    echo "var efa_type_value_amount='$fa_type_value_amount';";
    echo "var euam='$uam';";
    echo "var eha_note='$ha_note';";
    echo "var eea_class='$ea_class';";
    echo "var eea_note='$ea_note';";
    echo "var epc_note='$pc_note';";
?>
    $(".edit").html("[edit]");
    $('#unhcr').val(efile_no).prop('disabled',true);
    $("input[name='rfa'][value='"+erfa+"']").prop('checked',true);
    $('.save').html("<i class='fa fa-save'></i> Update").removeClass('btn-success').addClass('btn-primary').attr('id',"update_personalinformation");
    $("input[name='FA-day'][value='"+efa_day+"']").prop('checked',true);

    var es = efa_type_value_amount.split(';');
    var ec = es.length;
    for(i=0;i<ec;i++){
      ess=es[i];
      var es2=ess.split(',');
      console.log(es[i]);
      etype=es2[0];
      evalue=es2[1];
      eamount=es2[2];
      setype=etype.split('-');
      $("#"+etype).prop('checked',true);
      $("#FA-value-"+setype[2]).val(evalue);
      $("#FA-amount-"+setype[2]).val(eamount);
    }

    suam = euam.split(',');
    suam2 = suam[0].split('-');
    $("#"+suam[0]).prop('checked',true);
    $("#UAM-value-"+suam2[2]).val(suam[1]);

    $(document).click(function(){
      countChecked();
    });

    $("#HA-in-notes").val(he.decode(balikinSimbol(eha_note)));
    $("input[name='EA'][value='"+eea_class+"']").prop('checked',true);
    $("#EA-in-notes").val(balikinSimbol(eea_note));
    $("#PC-in-notes").val(balikinSimbol(epc_note));



    $(".btn").removeClass('btn-success').addClass('btn-primary').html("<i class='fa fa-save'></i> Update");

<?php
echo "//edit=1\n";
}
?>


    //check available
		$("#unhcr").change(function(){
      file_no=$(this).val();
      var datanya = "&file_no="+$(this).val();
			
			$.ajax({url: "form/assistance/action.php",data: "op=check"+datanya,cache: false,
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
    
    //save personal information
    $("#save_personalinformation").click(function(){
			if(file_no == ""){
				alert("Please insert UNHCR Case Number");
				$("#unhcr").val("").focus();
			}
			else if($("#a").hasClass("text-warning")){
				alert("File Number in use");
				$("#unhcr").val("").focus();
			}
			else if($("#a").hasClass("text-danger")){
				var r = confirm("No Data for ["+file_no+"], Add new Data?");
				if (r == true) {window.location="?page=person-form";} 
				else {$("#unhcr").val("").focus();}
			}
			else{
				var file_no = $("#unhcr").val();
				var rfa = $("input[name='rfa']:checked").val();
				var datanya = "&file_no="+file_no+"&rfa="+rfa;
				$.ajax({url: "form/assistance/action.php",data: "op=addassistance"+datanya,cache: false,
					success: function(msg){
						if(msg=="success"){
							alert("Data has been saved !!");
							$("a[href='#financeassistance']").click();
							$("#unhcr").attr("disabled",true);
							$("#a").html("");
						}
						else{alert("Data not saved !!");}
					}
				});
			}

    });
    //save_financeassistance
    $("#save_financeassistance").click(function(){
        var file_no = $("#unhcr").val();
        var fa_day=$("input[name='FA-day']:checked").val();
        var fa_type_value_amount = $("#fa_type_value_amount").val();
        var uam = $("#uam").val();
        
				var datanya = "&fa_day="+fa_day+"&file_no="+file_no+"&fa_type_value_amount="+fa_type_value_amount+"&uam="+uam;
				$.ajax({url: "form/assistance/action.php",data: "op=save_financeassistance"+datanya,cache: false,
					success: function(msg){
						if(msg=="success"){
							alert("Data has been saved !!");
							$("a[href='#healthassistance']").click();
							$("#unhcr").attr("disabled",true);
						}
						else{alert("Data not saved !!");}
					}
				});
    });

    $('#save_healthassistance').click(function(){
      var file_no = $("#unhcr").val();
      var ha_note = $('#HA-in-notes').val();
      var datanya = "&file_no="+file_no+"&ha_note="+ubahSimbol(ha_note);
				$.ajax({url: "form/assistance/action.php",data: "op=save_healthassistance"+datanya,cache: false,
					success: function(msg){
						if(msg=="success"){
							alert("Data has been saved !!");
							$("a[href='#educationaccess']").click();
							$("#unhcr").attr("disabled",true);
						}
						else{alert("Data not saved !!"); console.log(msg)}
					}
				});
    });
    
    $('#save_educationaccess').click(function(){
      var file_no = $("#unhcr").val();
      var ea_class = $("input[name='EA']:checked").val();
      var ea_note = $('#EA-in-notes').val();
      var datanya = "&file_no="+file_no+"&ea_note="+ubahSimbol(ea_note)+"&ea_class="+ea_class;
      console.log(datanya);
				$.ajax({url: "form/assistance/action.php",data: "op=save_educationaccess"+datanya,cache: false,
					success: function(msg){
						if(msg=="success"){
							alert("Data has been saved !!");
							$("a[href='#psychologicalcounselling']").click();
							$("#unhcr").attr("disabled",true);
						}
						else{alert("Data not saved !!"); console.log(msg)}
					}
				});
    });

    $("#save_psychologicalcounselling").click(function(){
      var file_no = $("#unhcr").val();
      var pc_note = $("#PC-in-notes").val();
      var datanya="&file_no="+file_no+"&pc_note="+ubahSimbol(pc_note);
      console.log(datanya);
				$.ajax({url: "form/assistance/action.php",data: "op=save_psychologicalcounselling"+datanya,cache: false,
					success: function(msg){
						if(msg=="success"){
							alert("Data has been saved !!");
							$("a[href='#psychologicalcounselling']").click();
							$("#unhcr").attr("disabled",true);
						}
						else{alert("Data not saved !!"); console.log(msg)}
					}
				});

      
    });


    
    var countChecked = function(){
      fa_values=parseInt(0);
      fa_type_value_amount="";
      uam="";
      $(".fa-ch:checked").each(function(){
        var id = $(this).attr('id');
        var s=id.split('-');
        var v=$("#FA-value-"+s[2]).val();
        var a=$("#FA-amount-"+s[2]).val();
        /* console.log(v); */
        fa_values += parseInt(v*a);
        fa_type_value_amount += id+","+v+","+a+";";
      });
      $("input[name='UAM']:checked").each(function(){
        var id = $(this).attr('id');
        var s=id.split('-');
        var v = $("#UAM-value-"+s[2]).val();

        fa_values += parseInt(v);
        uam += id+","+v;

      });

      fa_value=fa_values;
      fa_value2=fa_values.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
      console.log(fa_value);
      console.log(fa_type_value_amount);
      console.log(uam);
      $('#total-finance .rp').html(fa_value2);
      $("#fa_type_value_amount").val(fa_type_value_amount);
      $('#uam').val(uam);
    };
    /* countChecked(); */

    //checkbox FA-ch
    $(".FA-ch").click(function(){
      countChecked();
    });
    $(".FA-value").change(function(){
      countChecked();
    });
    $(".FA-amount").change(function(){
      countChecked();
    });
    $("input[name='UAM']").change(function(){
      countChecked();
    });
    $(".UAM-value").change(function(){
      countChecked();
    });


    //
    //
});
</script>
