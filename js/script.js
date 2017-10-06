$(document).ready(function() {
	
	function updateChatList() {
		
			$.get( "updateChatList.php", function( data ) {
			  
			  var parsedata = JSON.parse(data);
			  
			  $("#chatroomlist li").remove();
			  
			  for(i=0;i<JSON.parse(data).length;i++) {
					$("#chatroomlist").append('<li data-chatroom-number="' + parsedata[i].chatroom_id + '"><a href="./chat.php?id=' + parsedata[i].chatroom_id + '&name=' + parsedata[i].name + '" target="_blank">' + parsedata[i].name + '</a></li>');
			  }
			  
			});
			
	}
	
	
	updateChatList();
	//setInterval(function() { updateChatList() }, 1000);
	
	/*
	 * Add user to the chatroom users
	 */
	function enterChat() {	$.ajax({type: "POST", url: 'enterchat.php'}); }
	
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
					
					$("#chatroomlist").append('<li data-chatroom-number="' + chatdet[1] + '"><a href="./chat.php?id=' + chatdet[1] + '&name=' + parsedata[i].name + '" target="_blank">' + chatdet[0] + '</a></li>');
					updateChatList();
					
				}
			});
			
		}
			
		e.preventDefault();
    });
	
	
});