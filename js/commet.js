// mode 0: load
// mode 1: send
// mode 2: comet

// func load
//function load(){
//	$.ajax({
//		type: 'POST',
//		url: "./comet.php",
//		dataType: 'html',
//		data: {mode: 0},
//		success: function(data){
//			$('.outputField').append(data);
//			}
//	});
//}

$.ajax({
	type:'POST',
	url: "./comet.php",
	data:{id: $id},
	success: function(data){
		$('.outputField').append(data);
	}
});
