$(document).ready(function() {
	
	function updateChatList() {
		
			$.get( "updateChatList.php", function( data ) {
			  
			  var parsedata = JSON.parse(data);
			  
			  $("#chatroomlist li").remove();
			  
			  for(i=0;i<JSON.parse(data).length;i++) {
					$("#chatroomlist").append('<li data-chatroom-number="' + parsedata[i].chatroom_id + '"><a href="#">' + parsedata[i].name + '</a></li>');
			  }
			  
			});
			
	}
	
	
	updateChatList();
	//setInterval(function() { updateChatList() }, 1000);
	
	/*
	 * Create new chatroom by setting a name
	 */
	$('#newchat').click(function(e) {
		
		var chatname, sanchatname;
		
		chatname = prompt("Chatroom name:");
		
		//sanitize input
		sanchatname = chatname.replace(/\W/g, '');
		
		if (sanchatname.length > 0) {
						
			$.ajax({
				type: "POST",
				url: 'newchat.php',
				data: {
					'chat_name' : sanchatname
				},
				success: function (data) {
					var chatdet = JSON.parse(data);
					
					$("#chatroomlist").append('<li data-chatroom-number="' + chatdet[1] + '"><a href="#">' + chatdet[0] + '</a></li>');
					updateChatList();
					
				}
			});
			
		}
			
		e.preventDefault();
    });
	
	
});