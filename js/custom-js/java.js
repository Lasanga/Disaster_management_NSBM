
$(function(){

	$('#subscribe').on('click',function(){
		var $btn = $(this);

		var $btnDetails = $btn.text();
		if ($btnDetails == 'Subscribe') {
			$('#subscribe').on('click',function(){
				$btn.text('Unsubscribe').delay(100);
			});	
		}else{
			$('#subscribe').on('click',function(){
				$btn.text('Subscribe').delay(100);
			});	
		}
	});

	$('#submitProfile').on('click',function(event){

		var $username = $('#Username').val();
		var $password1 = $('#password1').val();
		var $password2 = $('#password2').val();

		if ($username.length < 5 ) {
			$('#user').text('more than 5 characters required').css({color:'red'});
			event.preventDefault();
		}else if($password1 != $password2){
			$('#pass').text('passwords didnt match. try again!').css({color:'red'});
			event.preventDefault();
		}else{

		}
	});
});