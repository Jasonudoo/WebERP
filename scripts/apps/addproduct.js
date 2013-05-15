Ext.onReady(function(){
	Ext.BLANK_IMAGE_URL = '../ext/resources/images/default/s.gif';
	var main_post_url = "main.php?u=product&actions=add";
	var submit_result = true;
	
	//check the bar code
	$("#Bar").bind("blur", function(){
		if($.trim($(this).val()) == ""){
			$.post(main_post_url,{"a":"create_bar", "caller":"ajax"}, function(data){
				var d = eval("[" + data + "]");
				$("#Bar").val(d[0]['barcode']);
				$("#Bar").removeClass("errormsg");
				$("#errormsg_Bar").hide();
			});
		} else {
			$.post(main_post_url,{"a":"check_bar", "caller":"ajax", "barcode":$(this).val()}, function(data){
				var d = eval("[" + data + "]");
				if( d[0]['error'] ){
					$("#errormsg_Bar").html("The bar code has exists! Please enter a new one");
					$("#errormsg_Bar").show();
					$(this).addClass("errormsg");
				} else {
					$("#errormsg_Bar").hide();
					$(this).removeClass("errormsg");
				}
			});
		}
	});

	//check the product id
	$("#Product_ID").bind("blur", function(){
		if($.trim($(this).val()) == ""){
			$.post(main_post_url,{"a":"create_id", "caller":"ajax"}, function(data){
				var d = eval("[" + data + "]");
				$("#Product_ID").val(d[0]['ID']);
				$("#Product_ID").removeClass("errormsg");
				$("#errormsg_Product_ID").hide();
			});
		} else {
			$.post(main_post_url,{"a":"check_id", "caller":"ajax", "pid":$(this).val()}, function(data){
				var d = eval("[" + data + "]");
				if( d[0]['error'] ){
					$("#errormsg_Product_ID").html("The product ID has exists! Please enter a new one");
					$("#errormsg_Product_ID").show();
					$(this).addClass("errormsg");
				} else {
					$("#errormsg_Product_ID").hide();
					$(this).removeClass("errormsg");
				}
			});
		}
	});
	
	//reset action
	$("#btnReset").bind("click", function(){
		$("#main").resetForm();
	});
	
	//ajax form submit
    $('#main').ajaxForm({ 
        url:        	main_post_url,   
        type:			'post',
        dataType:		'json',
        beforeSubmit:  validate,
        success:       showResponse
    });
    
});

function format_float(pFloat, pDp){
	return parseFloat(new Number(pFloat).toFixed(pDp));
}


//pre-submit callback 
function validate(formData, jqForm, options) {
	var result = true;
	var number_field = ["Unit_Price", "Product_Cost", "Raw_Cost", "Lau_Stock", "Ojm_Stock", "WebPrice"];
	var required_field = ["Bar", "Product_ID", "Title", "US_Style", "HK_Style", "Category_Code", "Category", "Vendor", "Unit_Price", "Product_Cost", "Raw_Cost", "Lau_Stock", "Ojm_Stock"];
	
	//check required fields
	$.each(required_field, function(i,v){
		$("#errormsg_" + v).hide();
		$("#" + v).removeClass("errormsg");
		if($.trim($("#" + v).val()) == ""){
			$("#"+v).addClass("errormsg");
			$("#errormsg_" + v).html("This information is required!");
			$("#errormsg_" + v).show();
			result = false;
		}
	});
	
	//check number fields
	$.each(number_field, function(i,v){
		$("#errormsg_" + v).hide();
		$("#" + v).removeClass("errormsg");
		if($.trim($("#" + v).val()) != ""){
			var n = parseFloat($("#" + v).val().replace(/\,/g,''));
			if( isNaN(n) ){
				$("#" + v).val("0.00");
				$("#errormsg_" + v).html("The field value should be number");
				$("#" + v).addClass("errormsg");
				$("#errormsg_" + v).show();
				result = false;
			} else {
				$(this).val(format_float(n, 2));
			}
		} else {
			$("#" + v).val("0.00");
		}
	});

	myMask = new Ext.LoadMask(Ext.get("main"), {msg:"Submiting..."});
	myMask.show();
	
	if(result){
		return true;
	}
	else {
		myMask.hide();
		return false;
	}
} 
 
// post-submit callback 
function showResponse(responseText, statusText, xhr, $form){
	myMask.hide();
	var d = responseText;
	$("#dialog-confirm").html(d.message);
	$("#dialog-confirm").dialog("open");
} 