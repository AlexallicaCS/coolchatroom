$(document).ready(function() {
	
	$('#newchat').click(function(e) {
		
		$.ajax({
			type: "POST",
			url: 'newchat.php',
			data: {
				'chat_name' : 'metallica'
			},
			success: function (data) {
					alert(data);
				}
			});
			
		e.preventDefault();
    });
	
	
});