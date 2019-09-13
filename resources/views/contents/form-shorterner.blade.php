<!DOCTYPE HTML>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- <link rel="stylesheet" href="{{ url('public/bootstrap/dist/css/bootstrap.min.css') }}"> -->
		<!-- <link rel="stylesheet" href="{{ url('public/bootstrap/dist/css/bootstrap-theme.min.css') }}"> -->

		<link rel="stylesheet" href="{{ url('public/css/sweetalert.css') }}">

		<style>
			body{
				/*background-color: #aaa;*/
				background: url("https://images.pexels.com/photos/40870/cube-game-cube-instantaneous-speed-pay-40870.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
				background-size: cover;
	            background-position: center;
	            background-attachment: fixed;
			}
			.container-kecil{
				background-color: #fff;
				max-width:678px;
				margin:5% auto;
				border:1px solid #bbb;
				padding:10px;
				border-radius:10px;
				box-shadow: 0px 0px 5px 1px #555;
			}
			hr {
			  height: 1.5px;
			}
			.hr-success{
			  background-image: -webkit-linear-gradient(left, rgba(15,157,88,.8), rgba(15, 157, 88,.6), rgba(0,0,0,0));
			}
			#for-result{
				display: none;
			}
		</style>
	</head>
	<body>
		<div class="container container-kecil">
			<div class="row">
				<div class="col-md-12">
					<!-- <form method='post'> -->
						<div class="row">
							<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
								<h3>Buat URL Anda menjadi singkat, hanya sekali klik</h3>
							</div>
							<div class="col-md-9 col-lg-9 col-xs-12 col-sm-12">
								<input type='text' class='form-control' required placeholder='Masukkan Link Di Sini' id='link-address'>
							</div>
							<div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
								<button class='btn btn-success btn-md' id='btn-generate'>
									Shortern
								</button>
							</div>
						</div>
						<hr class="hr-success" id="for-result">
						<div class="row" id="for-result">
							<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
								<label>Link baru Anda : </label><br>
								<a href='#' id='new-link'></a>
							</div>
						</div>
					<!-- </form> -->
				</div>
			</div>
		</div>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<!-- <script src="{{ url('public/bootstrap/dist/js/bootstrap.min.js') }}"></script> -->

		<script src="{{ url('public/jquery/jquery.js') }}"></script>
		<script src="{{ url('public/jquery/jquery.min.js') }}"></script>

		<script src="{{ url('public/js/sweetalert.min.js') }}"></script>
		@include('sweet::alert')

		<script type="text/javascript">
			$(document).ready(function(){
        		$('#btn-generate').click(function(){
        			var previous_link = $('#link-address').val();

        			$.ajax({
		                url : '{{ url("api/generating/new-link") }}',
		                type:'POST',
		                data: JSON.stringify({ 
		                    "previous_link" : previous_link,
		                }),
		                contentType: "application/json",
		                dataType: 'json',
		                success: function(output_nya){
		                	if(output_nya.code == "200"){
		                		var new_link = output_nya.new_link;

		                		$('#for-result').css('display','block');

		                		$('#new-link').html(new_link);

		                        swal({
		                            title: "Yeay..",
		                            text: output_nya.message,
		                            showConfirmButton: false,
		                            timer: 2500,
		                            type: "success",
		                        });
		                    }else{
		                    	$('#for-result').css('display','none');

		                    	$('#new-link').html("");

		                        swal({
		                            title: "Oops..",
		                            text: output_nya.message,
		                            showConfirmButton: false,
		                            timer: 2500,
		                            type: "error",
		                        });    
		                    }
		                },
		                error: function(xhr, status, error) {
		                  var err = eval("(" + xhr.responseText + ")");
		                  alert(err.Message);
		                }
		            });
        		});
        	});
		</script>
	</body>
</html>