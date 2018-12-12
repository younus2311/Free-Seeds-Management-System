$(document).ready(function(){
	$('.set-dealers').click(function(){
		var modalId=$(this).data('target');

		// $(modalId+' form').submit(function(e){
		// 	e.preventDefault();

		// 	var val=$(modalId+'select').val();
		// 	alert(val);
		// });
	});

	// ---------- Select2 -----------
	$(".set-dealers-field").select2();
});