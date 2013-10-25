$(document).ready(function(){
    // var dates = $(".post-index-text");
   $(".post-index-text").each(function(index){
    	var org = $(this).html();
    	var modified = $(this);
    	$.ajax({
		 	type: 'POST',
	 		url: 'http://localhost/yb2/util.php',
	 		data:{'orginData':org},
		 	success: function(data){
                modified.html(data);
		 	},
		 	dataType: 'html'
	 	});
    //});
});

