$(document).ready(function(){
	// Ajax Registration
	$(document).on('submit',".reg", function() {
		$.post('index.php', $(this).serialize(), function(data) {
			console.log(data); 
			$(".alert").html(data);

		});
		return false;
	});
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
});