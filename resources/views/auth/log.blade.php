<!DOCTYPE html>
<html lang="en">
<head>
	<title>GStock</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="/login/css/main.css">
   <link rel="stylesheet" href="/css/bootstrap.min.css">


<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form"  method="post"  action="{{ route('auth.check') }}">
            @if(session()->has('fail'))
            <div class="alert alert-danger" id="alert" role="alert" >
               {{ session()->get('fail') }}
            </div>
               @endif
           @csrf
					<span class="login100-form-title p-b-26">
						Bienvenue
					</span>
					<span class="login100-form-title p-b-48">
               <img src="/logo-bim.jpg">    					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input type="text" class="input100" name="Matricule" required placeholder="Matricule" value="{{ old('Matricule') }}">
						<span class="text-danger" >@error('Matricule'){{ $message }} @enderror</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="Password" required name="Password" placeholder="Mot de passe">
						<span class="text-danger" >@error('password'){{ $message }} @enderror</span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Valider
							</button>
						</div>
					</div>


				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
  
</body>
</html>
<script >
		setTimeout(function () {

			// Closing the alert
			$('#alert').alert('close');
		}, 3000);
	</script>