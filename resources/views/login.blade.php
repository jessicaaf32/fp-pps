<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Vendor original -->
    <link rel="stylesheet" type="text/css" href="{{asset('login/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/main.css')}}">

    <style>
		/* BACKGROUND SOFT TEAL */
		body {
			background: linear-gradient(135deg, #e7f8f6, #d9f1ee, #c4e9e5);
			font-family: 'Poppins', sans-serif;
			position: relative;
			overflow: hidden;
		}

		/* Background blob kiri */
		body::before {
			content: "";
			position: absolute;
			top: -90px;
			left: -60px;
			width: 400px;
			height: 400px;
			background: rgba(0,128,128,0.12);
			border-radius: 50%;
			filter: blur(55px);
		}

		/* Background blob kanan */
		body::after {
			content: "";
			position: absolute;
			bottom: -130px;
			right: -80px;
			width: 330px;
			height: 330px;
			background: rgba(0,150,150,0.18);
			border-radius: 50%;
			filter: blur(65px);
		}

		/* Center container */
		.login-container {
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			padding: 20px;
		}

		/* CARD BESAR */
		.login-card {
			width: 960px;
			height: 540px;
			border-radius: 35px;
			overflow: hidden;
			display: flex;
			background: #fff;
			box-shadow: 0 25px 50px rgba(0,0,0,0.12);
			position: relative;
		}

		/* LEFT PANEL EXACT MODEL */
		.login-left {
			flex: 1.15;
			padding: 55px 50px;
			background: linear-gradient(135deg, #008080, #006d6d);
			color: white;
			border-top-right-radius: 120px;
			border-bottom-right-radius: 120px;
			position: relative;
		}

/* LEFT PANEL TYPOGRAPHY YANG BARU */
		/* TITLE mirip GrowID */
		.login-left h1 {
			font-size: 48px;
			font-weight: 800;
			line-height: 1.1;               /* lebih compact */
			letter-spacing: 0.3px;
			margin-bottom: 20px;
			color: #ffffff;
		}

		/* PARAGRAF mirip GrowID */
		.login-left p {
			font-size: 16px;
			font-weight: 300;
			line-height: 1.55;
			color: #d8f7f4;                 /* warna putih lembut */
			max-width: 430px;
			margin-top: 10px;
		}



		/* BULATAN UTAMA PERSIS MODEL */
		.big-circle {
			position: absolute;
			bottom: -80px;
			left: 25px;
			width: 260px;
			height: 260px;
			border-radius: 50%;
			background: rgba(255,255,255,0.14);
		}

		.big-circle2 {
			position: absolute;
			top: 30px;
			right: 40px;
			width: 190px;
			height: 190px;
			border-radius: 50%;
			background: rgba(255,255,255,0.17);
		}

		/* RIGHT PANEL */
		.login-right {
			flex: 1;
			padding: 60px 55px;
			background: white;
		}

		.login-right h2 {
			font-size: 32px;
			font-weight: 700;
			margin-bottom: 25px;
		}

		/* INPUT FIELD MODERN */
		.input-group-custom {
			display: flex;
			align-items: center;
			background: #f1f3f6;
			padding: 14px 18px;
			border-radius: 12px;
			margin-bottom: 18px;
			border: 2px solid transparent;
			transition: 0.25s;
		}

		.input-group-custom:focus-within {
			border-color: #008080;
			background: #eefefe;
		}

		.input-group-custom input {
			border: none;
			background: transparent;
			width: 100%;
			margin-left: 10px;
			outline: none;
		}

		/* BUTTON GRADIENT */
		.btn-teal {
			width: 100%;
			padding: 14px;
			border-radius: 12px;
			border: none;
			color: #fff;
			font-weight: 600;
			font-size: 17px;
			background: linear-gradient(90deg, #008080, #00b3b3);
			transition: .25s;
		}

		.btn-teal:hover {
			background: linear-gradient(90deg, #006666, #009999);
			transform: translateY(-2px);
		}

		/* Divider */
		.divider {
			margin: 22px 0;
			text-align: center;
			position: relative;
			color: #8e8e8e;
		}

		.divider::before,
		.divider::after {
			content: "";
			position: absolute;
			top: 50%;
			width: 40%;
			height: 1px;
			background: #d5d5d5;
		}

		.divider::before { left: 0; }
		.divider::after { right: 0; }
		
		.alert-success {
			animation: fadeIn .6s ease-out;
		}

		@keyframes fadeIn {
			from { opacity: 0; transform: translateY(-6px); }
			to { opacity: 1; transform: translateY(0); }
		}

    </style>

</head>

<body>

<div class="login-container">
    <div class="login-card">

        <!-- LEFT -->
        <div class="login-left">
			<h1>Welcome to GROWID<span style="color:#ff6b00;">.</span></h1>
			<p class="text-white">GROWID adalah sebuah website pembelajaran teknologi yang menyediakan fitur lengkap, mudah digunakan, dan gratis
				sebagai wadah bagi mahasiswa untuk belajar, berdiskusi, dan mengembangkan keterampilan digital secara mandiri.</p>


			<div class="big-circle"></div>
			<div class="big-circle2"></div>
        </div>

        <!-- RIGHT -->
        <div class="login-right">
			<h2>Sign In</h2>
			@if(session('success'))
				<div class="alert alert-success mb-3" 
					style="border-radius:10px; padding:12px; background:#d1f7e2; color:#0b6b3a; font-weight:500;">
					{{ session('success') }}
				</div>
			@endif

            <form method="POST" action="{{ route('login.action')}}">
                @csrf

                <div class="input-group-custom">
                    <i class="fa fa-user"></i>
                    <input type="text" name="username" placeholder="Username">
                </div>

                <div class="input-group-custom">
                    <i class="fa fa-lock"></i>
                    <input type="password" name="password" placeholder="Password">
                </div>

                @if(session('error'))
                    <p class="text-danger mb-3"><b>Oops!</b> {{ session('error') }}</p>
                @endif

                <div class="d-flex justify-content-between mb-3">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="/forgot_password">Forgot Password?</a>
                </div>

                <button class="btn-teal">Sign in</button>

                <div class="divider">Or</div>

                <p class="text-center mt-3">
                    Don't have an account? <a href="/register">Sign Up</a>
                </p>
            </form>
        </div>

    </div>
</div>

</body>
</html>
