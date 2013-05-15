var number_field = ["sales_to_date", "credit_limit", "balance", "pastdue", "net_discount", "discount"];
var main_post_url = "main.php?u=customer&actions=add";
var submit_result = true;
var myMask; 

$("[title]").tipTip({activation:'focus', defaultPosition:'right'});
//autocomplete event for city
$("#city").autocomplete({
	source: function(request, response) {
		$.ajax({
			url: "http://ws.geonames.org/searchJSON",
			dataType: "jsonp",
			data: {
				featureClass: "P",
				style: "full",
				maxRows: 12,
				country:'US',
				name_startsWith: request.term
			},
			success: function(data) {
				response($.map(data.geonames, function(item) {
					return {
						label: item.name + (item.adminName1 ? ", " + item.adminName1 : ""),
						value: item.name,
						state: item.adminName1 ? item.adminName1 : ""
					}
				}))
			}
		})
	},
	minLength: 2,
	select: function(event, ui) {
		if(ui.item){
			$(this).val(ui.item.value);
			$("#region").val(ui.item.state);
			if($.trim($("#ship_city").val()) == ""){
				$("#ship_city").val(ui.item.value);
			}
			if($.trim($("#ship_state").val()) == ""){
				$("#ship_state").val(ui.item.state);
			}
		}
	},
	open: function() {
		$(this).removeClass("ui-corner-all").addClass("ui-corner-top");
	},
	close: function() {
		$(this).removeClass("ui-corner-top").addClass("ui-corner-all");
	}
});

//autocomplete for ship city
$("#ship_city").autocomplete({
	source: function(request, response) {
		$.ajax({
			url: "http://ws.geonames.org/searchJSON",
			dataType: "jsonp",
			data: {
				featureClass: "P",
				style: "full",
				maxRows: 12,
				country:'US',
				name_startsWith: request.term
			},
			success: function(data) {
				response($.map(data.geonames, function(item) {
					return {
						label: item.name + (item.adminName1 ? ", " + item.adminName1 : ""),
						value: item.name,
						state: item.adminName1 ? item.adminName1 : ""
					}
				}))
			}
		})
	},
	minLength: 2,
	select: function(event, ui) {
		if(ui.item){
			$(this).val(ui.item.value);
			$("#ship_state").val(ui.item.state);
		}
	},
	open: function() {
		$(this).removeClass("ui-corner-all").addClass("ui-corner-top");
	},
	close: function() {
		$(this).removeClass("ui-corner-top").addClass("ui-corner-all");
	}
});

//ajax form submit
var frm_opt = { 
        url:        	main_post_url,   
        type:			'post',
        dataType:		'json',
        beforeSubmit:  validate,
        success:       showResponse
};
$('#main').ajaxForm(frm_opt); 

//pre-submit callback 
function validate(formData, jqForm, options) {
	var result = true;
	var require_field = ["company_name", "customer_id", "contact_name", "store_number", "city", "region", "postal_code", "phone", "fax", "salesman", "tax_id", "email", "terms"];
	
	//check required fields
	$.each(require_field, function(i,v){
		$("#errormsg_" + v).hide();
		$("#" + v).removeClass("errormsg");
		if($.trim($("#" + v).val()) == ""){
			$("#"+v).addClass("errormsg");
			if( v == "region" || v == "postal_code") v= "city";
			$("#errormsg_" + v).html("This information is required!");
			$("#errormsg_" + v).show();
			result = false;
		} else {
			if( v == "customer_id" || v == "email" ){
				if(!submit_result) $("#"+v).trigger("blur");
			}
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
	
	if(result && submit_result){
		return true;
	}
	else {
		myMask.hide();
		return false;
	}
}

//post-submit callback 
function showResponse(responseText, statusText, xhr, $form){
	myMask.hide();
	var d = responseText;
	$("#dialog-confirm").html(d.message);
	$("#dialog-confirm").dialog("open");
}