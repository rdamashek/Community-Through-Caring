<style>
	#chat-container .casing {
		border: 1px solid #000;
		width: 300px;
		height: 550px;
		margin: auto;
		padding: 20px;
		background: #333 linear-gradient(65deg, #333 60%, #444 60%, #333 100%);
		border-radius: 20px;
		box-shadow: 2px 2px 1px #444, 3px 3px 1px #555, 4px 4px 0px #666;
	}

	#chat-container .window {
		margin-top: 54px !important;
		border: 1px solid #288171;
		border-radius: 10px;
		background: #fff;
		width: 100%;
		height: calc(100vh - 160px);
		margin: auto;
		padding: 10px;
		box-sizing: border-box;
		position: relative;
		overflow: hidden;
	}

	#chat-container .header {
		background: #ededed;
		padding: 10px;
		margin: -10px -10px 8px -10px;
		text-align: center;
		border-bottom: 1px solid #ddd;
	}

	#chat-container .home-btn {
		height: 45px;
		width: 45px;
		margin-top: 10px;
		margin-left: auto;
		margin-right: auto;
		border-radius: 23px;
		border: 1px solid #444;
		background: #222;
	}

	#chat-container .home-btn .hb-square {
		background: none;
		width: 23px;
		height: 23px;
		margin: 10px;
		border-radius: 4px;
		border: 1px solid #444;
	}

	#chat-container .chat {
		background: #72b8ff;
		border-radius: 15px;
		display: inline-block;
		padding: 10px;
		color: #fff;
		font-weight: lighter;
		font-size: small;
		box-shadow: 1px 1px 2px rgb(0 0 0 / 30%);
		margin: 5px;
		position: relative;
	}

	#chat-container .chat.u1 {
		float: left;
		clear: both;
	}

	#chat-container .chat.u1:before {
		content: "";
		width: 0px;
		height: 0px;
		display: block;
		border-left: 5px solid transparent;
		border-right: 5px solid #72b8ff;
		border-top: 5px solid #72b8ff;
		border-bottom: 5px solid transparent;
		position: absolute;
		top: 0px;
		left: -10px;
		display: none;
	}

	#chat-container .chat.u2 {
		float: right;
		clear: both;
		background: #00D025;
	}

	#chat-container .chat.u2:before {
		content: "";
		width: 0px;
		height: 0px;
		display: block;
		border-left: 5px solid #00D025;
		border-right: 5px solid transparent;
		border-top: 5px solid #00D025;
		border-bottom: 5px solid transparent;
		position: absolute;
		top: 0px;
		right: -10px;
		display: none;
	}

	#chat-container .new-chat {
		position: absolute;
		bottom: 0;
		width: 100%;
		background: #ededed;
		height: 65px;
		left: 0px;
		border-top: 1px solid #ddd;
	}

	#chat-container .new-chat input {
		outline: none;
		padding: 10px;
		box-sizing: border-box;
		font-size: 18px;
		width: calc(100% - 130px);
		height: 65px;
		border: none;
		display: inline-block;
		color: #fff;
		font-weight: 100;
		background: #ddd;
	}



	#chat-container .new-chat button {
		width: 40px;
		height: 30px;
		padding: 0;
		display: inline-block;
		border: none;
		color: #00D025;
		background: none;
		position: relative;
		top: -3px;
		outline: none;
		cursor: pointer;
	}

	#chat-container .new-chat button:active {
		color: #555;
	}


	.chats::-webkit-scrollbar {
		width: 6px;
	}

	.chats::-webkit-scrollbar-thumb {
		background: #ddd;
		border-radius: 20px;
	}

	.chats::-webkit-scrollbar-track {
		background: #dddddd50;
		border-radius: 20px;
	}

	.fade:not(.show) {
		opacity: 1;
	}

	.modal-backdrop.fade:not(.show) {
		opacity: 0.5;
	}

	#chats-messages .user-img {
		width: 40px;
		height: 40px;
		object-fit: cover;
		border-radius: 50%;
		position: absolute;
		left: -42px;
		top: -4px;
		background-color: #4bbfaa;
		text-align: center;
		align-items: center;
		display: flex;
		flex-wrap: nowrap;
		font-size: 21px;
		justify-content: space-around;
	}

	#chats-messages {
		padding-top: 25px;
	}

	#chats-messages span.chat {
		margin-left: 60px;
	}

	#useriamge {
		margin-left: 160px;
		border-radius: 50%;
	}
	#user-name {text-align: center;
		color: #FFF;
	}
	#user-join-date {
		color: #FFF;
		text-align: center;
	}

	@media screen and (max-width: 480px) {
		#useriamge {
		margin-left: 90px;
		border-radius: 50%;
	}
		
	
}
</style>

<div class="container" id="chat-container">
	<div class="window">
		<div class="header">Public Chat Manage</div>
		<div class="chats" id="chats-messages" style="overflow-y: auto; display: block; overflow-x: hidden; max-height: calc(100% - 110px);">
			<?php
			foreach ($messages as $message) {

				if (isset($_SESSION['admin']['id'])) {

					if (isset($message['photo']) && strlen($message['photo']) > 0) {
						$img_placeholder = '<a onclick="delete_user('. $message['id'].')" href="#"><i class="fa fa-trash" style="color:gray !important;left: -69px;position: relative;color: black;z-index: 9999; "></i></a><img class="user-img" src="' . base_url('assets/images/uploads/thumb/' . $message['photo']) . '" > ';

							echo '<span title="' . $message['name'] . ' ' . $message['time'] . '" class="u1 chat" data-toggle="modal" data-target="#myModal" data-join_data="' . $message['join_date'] . '" onclick="show_info(\'' . $message['name'] . '\', \'' . $message['join_date'] . '\', \'' . base_url('assets/images/uploads/thumb/' . $message['photo']) . '\')">' . $img_placeholder . ' ' . $message['message'] . '</span>';
						
					}
				} else {
					if (isset($message['photo']) && strlen($message['photo']) > 0) {
						$img_placeholder = '<a onclick="delete_user('. $message['id'].')" href="#"><i class="fa fa-trash" style="color:gray !important; left: -69px;position: relative;color: black;z-index: 9999; "></i></a><img class="user-img" src="' . base_url('assets/images/uploads/thumb/' . $message['photo']) . '" > ';
					
					}
					echo '<span title="' . $message['name'] . ' ' . $message['time'] . '" class="u1 chat" data-toggle="modal" data-target="#myModal" data-join_data="' . $message['join_date'] . '" onclick="show_info(\'' . $message['name'] . '\', \'' . $message['join_date'] . '\', \'' . base_url('assets/images/uploads/thumb/' . $message['photo']) . '\')">' . $img_placeholder . ' ' . $message['message'] . '</span>';
				}
			}
			?>


		</div>

		
	</div>
</div>





<!-- ==========chat profile========== -->


<div class="modal fade" id="member_info" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">;
	<div class="modal-dialog" role="document" style="    margin-top: 20vh;">
		<div class="modal-content" style="background-color: #268171;">
			<div class="modal-header">


				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #FFF;">
					<span aria-hidden="true">&times;</span>
				</button>

			</div>
			<div class="modal-body">

				<div id="user-profile"></div><br>
				
				<p id="user-name"></p>
				<p id="user-join-date"></p>




			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" style="background-color: #5CCAB6;" data-dismiss="modal"><?php echo $language['worldchat_model_close'] ?></button>

			</div>
		</div>
	</div>
</div>



<!-- Modal -->

<!-- =============chat profile end================ -->

<script>
	// function show_info($name, $join_date, $photo) {

	// 	$('#member_info').modal('show');
	// 	$("#user-profile").html('<img id="useriamge"src="' + $photo + '">');
	// 	$("#user-name").html($name);
	// 	$("#user-join-date").html($join_date);
	// }

	// window.onload = function() {

	// 	document.querySelector('#chats-messages').scrollTo(0, document.querySelector("#chats-messages").scrollHeight);

	// 	$('#send').on('click', function() {
	// 		<?php
	// 		if (isset($_SESSION['admin']['id'])) {

	// 		?>
	// 			$message = $('#message').val();
	// 			$.ajax({
	// 				url: '<?php //echo base_url('member/new_message'); ?>',
	// 				data: {
	// 					message: $message
	// 				},
	// 				type: 'post',
	// 				success: function(data) {
	// 					$('#chats-messages').append('<span title="" class="u2 chat">' + $message + '</span>');
	// 					$('#message').val('');
	// 					document.querySelector('#chats-messages').scrollTo(0, document.querySelector("#chats-messages").scrollHeight);
	// 				}
	// 			})
	// 		<?php

	// 		} else {
	// 		?>
	// 			$('#login-prompt').modal('show');
	// 		<?php
	// 		}
	// 		?>
	// 	})



	// }

	function delete_user($id) {
		$("body").overhang({
			type: "confirm",
			primary: "#40D47E",
			accent: "#27AE60",
			yesColor: "#3498DB",
			message: "Do you want to remove this chat?",
			overlay: true,
			callback: function(value) {

				if (value) {
					window.location = '<?php echo base_url('admin/delete_chat/'); ?>' + $id;
				}
			}
		});
	}
	// <i class="fa fa-close" onclick="delete_offer()">
</script>
