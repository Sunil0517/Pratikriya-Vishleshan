(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });

})(jQuery);

function myFunction() {
	var x = document.createElement("BUTTON");
	var t = document.createTextNode("Click me");
	x.appendChild(t);
	document.body.appendChild(x);
  }