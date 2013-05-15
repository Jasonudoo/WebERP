/* on ready function to attach event handlers for password hint link popup */
$(function(){
	hasLoggedIn = true;
	$("a#passwordHint").click(passwordHintClick);
    $(document).bind('keypress', function(evt){
       if (evt.keyCode == 27) {
            hidePasswordHint();
        }
    });
    $('#protrialClose').click(hidePasswordHint); 
    
    if(!hasLoggedIn) {
        var t = setTimeout(function(){$("#protrial").fadeIn('slow');}, 1000)
    }
    
    jQuery(document).ajaxStart(function(){
    	$("#username").attr("disabled", true);
    	$("#password").attr("disabled", true);
    	$("#btnSignIn").attr("disabled", true);
    });
    
    jQuery(document).ajaxStop(function(){
    	$("#username").attr("disabled", false);
    	$("#password").attr("disabled", false);
    	$("#btnSignIn").attr("disabled", false);
    });
    
    $("input#btnSignIn").click(function(){
    	var u = $.trim($('#username').val());
    	var p = $.trim($('#password').val());
    	var c = $.trim($('#cval').val());
    	$("div#jserror").hide();
    	if(u == "" || p == ""){
    		$("div#jserror").show();
    		return false;
    	}
    	$.ajax({
    		  type: 'POST',
    		  url: 'login.php',
    		  data: {u: u, p: p, a:'login', t:c, r:'ajax'},
    		  success: function(data){
    			  var d = eval("[" + data + "]");
    			  if(d[0].error){
    				  $("div#jserror").show();
    			  } else {
    				  window.location.href = d[0].message;
    			  }
    		  }
    	});
    	return false;
    });
       
});

function passwordHintClick() {
    if ( $('#protrial').is(':visible') ) {
        $('#protrial').hide();
    } else {
        $('#protrial').fadeIn('fast');   
    }
    return false;   
}

function hidePasswordHint() {
    $('#protrial').hide();   
}




