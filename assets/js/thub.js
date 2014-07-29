$(document).ready(function(){
	// Ajax Registration
	/*$(document).on('submit',".reg", function(e) {
		e.preventDefault();
		var data = $(this).serialize();
	    var url = $(this).prop('action');
	    $.ajax({
	      type:"POST",
	      data: data,
	      url: url,
	      processData: false,
	      contentType: false
	    }).done(function(response){
	      console.log(response);
	    }).fail(function(){
	      console.log(response);
	    });
	});*/
	// Scroll Function
	$(function() {
	  $('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});
	// End of Scroll
	// Modal Windows
	$('.modalLink').modal({

	trigger: '.modalLink',

	olay:'div.overlay',

	modals:'div.modal',

	animationEffect: 'slidedown',

	animationSpeed: 400,

	moveModalSpeed: 'slow',

	background: '00c2ff',

	opacity: 0.8,

	openOnLoad: false,

	docClose: true,

	closeByEscape: true,

	moveOnScroll: true,

	resizeWindow: true,

	video:'http://player.vimeo.com/video/9641036?color=eb5a3d',

	close:'.closeBtn'

	});
	// End of Modal Windows


	//check if the user is registered
	/*setInterval(function(){

		notification = $('.notification').contents();
		console.log(notification);
	},3000);*/
});