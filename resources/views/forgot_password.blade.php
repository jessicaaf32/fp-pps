<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{asset('login/images/icons/favicon.ico')}}"/>


    <!-- Vendor -->
    <link rel="stylesheet" type="text/css" href="{{asset('login/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/main.css')}}">

    <style>
        /* BACKGROUND SOFT TEAL */
        body {
            background: linear-gradient(135deg, #e7f8f6, #d9f1ee, #c4e9e5);
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
            position: relative;
        }

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

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .login-card {
            width: 960px;
            height: 540px;
            border-radius: 35px;
            display: flex;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 25px 50px rgba(0,0,0,0.12);
        }

        /* LEFT PANEL */
        .login-left {
            flex: 1.15;
            padding: 55px 50px;
            background: linear-gradient(135deg, #008080, #006d6d);
            color: white;
            border-top-right-radius: 120px;
            border-bottom-right-radius: 120px;
            position: relative;
        }

        .login-left h1 {
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .login-left p {
            font-size: 16px;
            font-weight: 300;
            line-height: 1.55;
            color: #d8f7f4;
            max-width: 430px;
        }

        .big-circle {
            position: absolute;
            bottom: -80px;
            left: 25px;
            width: 260px;
            height: 260px;
            background: rgba(255,255,255,0.14);
            border-radius: 50%;
        }

        .big-circle2 {
            position: absolute;
            top: 30px;
            right: 40px;
            width: 190px;
            height: 190px;
            background: rgba(255,255,255,0.17);
            border-radius: 50%;
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

        .input-group-custom {
            display: flex;
            align-items: center;
            background: #f1f3f6;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 18px;
            border: 2px solid transparent;
            transition: .25s;
        }

        .input-group-custom:focus-within {
            border-color: #008080;
            background: #eefefe;
        }

        .input-group-custom input {
            border: none;
            background: transparent;
            margin-left: 10px;
            width: 100%;
            outline: none;
        }

        .btn-teal {
            width: 100%;
            padding: 14px;
            border-radius: 12px;
            border: none;
            color: white;
            font-size: 17px;
            font-weight: 600;
            background: linear-gradient(90deg, #008080, #00b3b3);
            transition: 0.25s;
        }

        .btn-teal:hover {
            background: linear-gradient(90deg, #006666, #009999);
            transform: translateY(-2px);
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
            <h2>Forgot Password</h2>

			@if(session('error'))
				<div class="alert alert-danger" 
					style="border-radius:8px; padding:12px; background:#ffe6e6; color:#b30000; margin-bottom:15px;">
					{{ session('error') }}
				</div>
			@endif

			@if ($errors->any())
				<div class="alert alert-danger" style="border-radius:8px; padding:12px; background:#ffe6e6; color:#b30000;">
					<ul style="margin:0; padding-left:18px;">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif


            <form action="{{route('forgot.action')}}" method="POST">
                @csrf

                <div class="input-group-custom">
                    <i class="fa fa-user"></i>
                    <input type="text" name="username" placeholder="Username" required>
                </div>

                <div class="input-group-custom">
                    <i class="fa fa-lock"></i>
                    <input type="password" name="password" placeholder="Password Baru" required>
                </div>

                <div class="input-group-custom">
                    <i class="fa fa-lock"></i>
                    <input type="password" name="cpassword" placeholder="Konfirmasi Password Baru" required>
                </div>

                <button class="btn-teal">Submit</button>

                <p class="mt-3 text-center">
                    <a href="/">Back to Sign In</a>
                </p>
            </form>
        </div>

    </div>
</div>

</body>
</html>
