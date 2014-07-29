/* this is signupjax code for the sign up page 
	@author udeme.samuel
	@author-email udemesamuel256@gmail.com
*/

$(document).ready(function(){

	/* use ajax form submit for the form */
	$(document).on('submit','#signupjax',function(e){
		e.preventDefault();
		loader = $('#loader'); loader.show();
		data = $(this).serialize();
		url = 	$(this).prop('action');
		//url = base + '/dashboardpost';
		$.ajax({
			type: "POST",
			data: data,
			url: url
		}).done(function(response){
			loader.hide();
			
			response_json = jQuery.parseJSON(response);
            notification = $('.notification').html(response_json.message);
		}).fail(function(){ console.log('failed'); });
	});
});