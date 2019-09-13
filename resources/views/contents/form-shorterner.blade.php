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
		</style>
	</head>
	<body>
		<div class="container container-kecil">
			<div class="row">
				<div class="col-md-12">
					<form method='post'>
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
					</form>
				</div>
			</div>
		</div>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<script src="{{ url('public/js/sweetalert.min.js') }}"></script>
		@include('sweet::alert')
	</body>
</html>