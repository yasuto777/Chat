function comet(mode){
	$.ajax({
		type: 'POST',
		url: "./comet.php",
		dataType: 'html',
		data: {
			mode: mode
		},
		success: function(data){
			$('.outputField').append(data);
		}
	});
}
