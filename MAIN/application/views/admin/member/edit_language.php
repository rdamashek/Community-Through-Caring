<style>
    input.main-single-inp {
			width: 100% !important;
			margin: auto;
			margin-top: 50px;
			background-color: #ffffff00;
			height: 50px;
			border: none;
			border-bottom: 2px solid #ffffff;
			border-radius: 0;
			color: #fff;
			outline: none;
			font-size: 25px;
			text-align: center;
			box-shadow: none !important;
			max-width: 100%;
		}

		 h2.main-heading {
			font-size: 85px;
			font-weight: 600;
			color: #fff
		}

		 h2.sub-heading {
			font-size: 45px;
			font-weight: 600;
			color: #fff
		}

		 h3.heading-small {
			font-size: 22px;
			font-weight: 300;
			color: #fff;
			max-width: 800px;
			margin: auto;
		}

		 input.main-single-inp::placeholder {
			color: #ffffff70;
		}

		 a.next-btn-circle {
			display: block;
			width: 50px;
			height: 50px;
			border-radius: 50%;
			background-color: #fff;
			color: #4caf9d;
			line-height: 53px;
			text-align: center;
			margin: auto;
			margin-top: 28px;
			border: 2px solid white;
			padding-left: 2px;
			transition: all 0.3s;

		}

		 a.next-btn-circle:hover {
			padding-left: 10px;
			transition: all 0.3s;
		}

		 a.next-btn-circle>i {
			font-size: 23px;
		}

		@media (max-width: 700px) {
			 h2.main-heading {
				font-size: 60px;
			}

			 h3 {
				font-size: 22px;
				font-weight: 400;
			}

		}

		.alert-warning {
			color: #810000;
			background-color: #4caf9d;
			border-color: #810000;
		}
</style>

<div class="container text-center col-md-10 auth-container" style="margin-top: 15vh; ">
    <div class="col-md-8" style="margin: auto; color: white">
        <h3 class="text-center">Language</h3>

        <form method="post" action="<?php echo base_url('admin/edit_language_submit'); ?>">

        <input type="hidden" name="update_id" value="<?php echo $languages['id']; ?>">

        
            <div style="margin-top: 15px">
                <!-- <span style="color: white; display: block; text-align: left;font-style: italic;font-size: 13px;">Lable</span> -->
                <input type="text" id="word" class="form-control main-single-inp" name="word" placeholder="Lable" value="<?php echo $languages['word']; ?>" readonly>
            </div>
            <div style="margin-top: 15px">
                <!-- <span style="color: white; display: block; text-align: left;font-style: italic;font-size: 13px;">Display Text</span> -->
                <input type="display_text" id="offer_price" class="form-control main-single-inp" name="display_text" placeholder="Display Text" value="<?php echo $languages['display_text']; ?>">
            </div>





            <div style="margin-top: 35px">
                <button type="submit" style="background-color: #288171; color: white; cursor:pointer; width: auto; margin: auto;" class="form-control"><i class="fa fa-check"></i> Submit</button>
            </div>

        </form>
    </div>
    <script>
        // function submit($this) {

        //     $word = $('input#word').val();
        //     $display_text = $('input#display_text').val();
        //     $.ajax({
        //         url: '<?php // echo base_url('users/edit_language'); ?>',
        //         data: {
        //             word: $word,
        //             display_text: $display_text,
        //             password: $password
        //         },
                
        //         type: 'post',

                
        //         success: function(data) {

        //         }
        //     })
        // }
    </script>
</div>