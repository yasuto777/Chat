// mode 0: load
// mode 1: send
// mode 2: comet

// func load
function load(){
	$.ajax({
		type: 'POST',
		url: "./comet.php",
		dataType: 'html',
		data: {mode: 0},
		success: function(data){
			$('.outputField').append(data);
			}
	});
}


//function send(){
	$(function(){
		// Click on send event
		$('#send').click(function(){
		var user = $(':text[name="user"]').val();
		var message = $(':text[name="message"]').val();
		// If input form blank, don't send
		if(user != "" && message != ""){
			$.ajax({
				type:'POST',
				url: "./comet.php",
				dataType: 'html',
				data: {
					mode: 1,
				user: user,
				message: message
				},
				success: function(data){
					$('.outputField').append(data);
					$('#message').val("");
				}
			});//end ajax
		}//end if
		});
	});
