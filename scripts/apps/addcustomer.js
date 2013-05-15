Ext.BLANK_IMAGE_URL = '../ext/resources/images/default/s.gif';

var number_field = ["sales_to_date", "credit_limit", "balance", "pastdue", "net_discount", "discount"];
var main_post_url = "main.php?u=customer&actions=add";
var submit_result = true;
var myMask; 

$(function(){
	$("#last_order_date").datepicker();
	$("#last_order_date").datepicker('option', {dateFormat: 'yy-mm-dd'});
	$("#last_sale_date").datepicker();
	$("#last_sale_date").datepicker('option', {dateFormat: 'yy-mm-dd'});
	$("[title]").tipTip({activation:'focus', defaultPosition:'right'});
	$(".errormsg").hide();
	
	$.each(number_field, function(i,v){
		$("#"+v).bind("change keyup", function(){
			var charge=format_float($(this).val(), 2);
			if( isNaN(charge) ){
				$(this).val("0.00");
			} else {
				$(this).val(charge);
			}
		});
	});
	
	if($.trim($("#ship_address1").val()) == ""){
		$("#address1").bind("change keyup", function(){
			$("#ship_address1").val($(this).val());
		});
	}
	
	if($.trim($("#ship_address2").val()) == ""){
		$("#address2").bind("change keyup", function(){
			$("#ship_address2").val($(this).val());
		});
	}
	
	if($.trim($("#ship_name").val()) == ""){
		$("#contact_name").bind("change keyup", function(){
			$("#ship_name").val($(this).val());
		});
	}
	
	if($.trim($("#ship_zip").val()) == ""){
		$("#postal_code").bind("change keyup", function(){
			$("#ship_zip").val($("#postal_code").val());
		});
	}
	
	//check the customer id
	$("#customer_id").bind("blur", function(){
		if($.trim($(this).val()) == ""){
			$.post(main_post_url,
					{"a":"create_customer", "caller":"ajax"}, 
					function(data){
						var d = eval("[" + data + "]");
						$("#customer_id").val(d[0]['customer_id']);
						$("#customer_id").removeClass("errormsg");
						$("#errormsg_customer_id").hide();
						if($.trim($("#store_number").val()) == ""){
							$("#store_number").val(d[0]['customer_id']);
							$("#store_number").removeClass("errormsg");
							$("#errormsg_store_number").hide();
						}
					}
			);
		} else {
			$.post(main_post_url,
					{"a":"check_customer", "caller":"ajax", "customer_id":$(this).val()}, 
					function(data){
						var d = eval("[" + data + "]");
						if( d[0]['error'] ){
							$("#errormsg_customer_id").html("The customer id has exists! Please enter a new one");
							$("#errormsg_customer_id").show();
							$(this).addClass("errormsg");
							submit_result = false;
						} else {
							$("#errormsg_customer_id").hide();
							$(this).removeClass("errormsg");
							submit_result = false;
						}
					}
			);
		}
	});
	
	//check the email
	$("#email").bind("blur", function(){
		if($.trim($(this).val()) != ""){
			$.post(main_post_url,
					{"a":"check_email", "caller":"ajax", "email": $(this).val()},
					function(data){
						var d = eval("[" + data + "]");
						if(d[0]['error']){
							$("#errormsg_email").html(d[0]['message']);
							$("#errormsg_email").show();
							$("#email").addClass("errormsg");
							submit_result = false;
						} else {
							$("#errormsg_email").hide();
							$("#email").removeClass("errormsg");
							submit_result = true;
						}
					}
			);
		}
	});
	
	//check the url
	$("#website").bind("blur", function(){
		if($.trim($(this).val()) != ""){
			$.post(main_post_url,
					{"a":"check_website", "caller":"ajax", "website": $(this).val()},
					function(data){
						var d = eval("[" + data + "]");
						if(d[0]['error']){
							$("#errormsg_website").html(d[0]['message']);
							$("#errormsg_website").show();
							$("#website").addClass("errormsg");
							submit_result = false;
						} else {
							$("#errormsg_website").hide();
							$("#website").removeClass("errormsg");
							submit_result = true;
						}
					}
			);
		}
	});
	
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
	
	//reset action
	$("#btnReset").bind("click", function(){
		$("#main").resetForm();
	});

	$("#dialog-confirm").dialog({
		autoOpen: false,
		resizable: false,
		height:200,
		width:300,
		modal: true,
		title : "Add an another new customer?",
		buttons: {
			'Yes': function() {
				$("#main").clearForm();
				$(this).dialog('close');
			},
			'No': function() {
				$(this).dialog('close');
				window.location.href = "main.php?u=customer&actions=list";
			}
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
});

function format_float(pFloat, pDp){return parseFloat(new Number(pFloat).toFixed(pDp));}

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
 
// post-submit callback 
function showResponse(responseText, statusText, xhr, $form){
	myMask.hide();
	var d = responseText;
	$("#dialog-confirm").html(d.message);
	$("#dialog-confirm").dialog("open");
} 