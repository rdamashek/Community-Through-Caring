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
		left: -53px;
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

<div class="container" id="chat-container" style="margin-top: 140px">
	<h2 style="color: white; text-align: center;"><?php echo get_lang('lang_about_us') ?></h2>
	<p style="color: white;  margin-top: 30px;"><?php echo get_lang('lang_about_text') ?></p>
	
</div>


<!-- Modal -->





<!-- =============chat profile end================ -->

<script>
	

	
</script>
