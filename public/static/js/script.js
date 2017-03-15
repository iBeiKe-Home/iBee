$(document).ready(function(){
	$("#toTopButton").on('click',function(){
		$('html,body').animate({
			scrollTop:0
		},400);
		});


	$(window).on('scroll',function()
	{
		if($(window).scrollTop()>600){
            $('#toTopButton').show();
		}
		else
		{
			$('#toTopButton').hide();
		}
	});

	$(window).trigger("scroll");



});