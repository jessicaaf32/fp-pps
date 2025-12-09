<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
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

        /* TITLE GrowID STYLE */
        .login-left h1 {
            font-size: 48px;
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: 0.3px;
            margin-bottom: 20px;
            color: #ffffff;
        }

        /* PARAGRAPH GrowID STYLE */
        .login-left p {
            font-size: 16px;
            font-weight: 300;
            line-height: 1.55;
            color: #d8f7f4;
            max-width: 430px;
            margin-top: 10px;
        }

        /* BULATAN */
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

        /* INPUT FIELD */
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

        /* BUTTON */
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

        .bottom-text {
            margin-top: 10px;
            text-align: center;
        }
    </style>

</head>

<body>

<div class="login-container">
    <div class="login-card">

        <!-- LEFT SAME AS LOGIN -->
        <div class="login-left">
 			<h1>Welcome to GROWID<span style="color:#ff6b00;">.</span></h1>
			<p class="text-white">GROWID adalah sebuah website pembelajaran teknologi yang menyediakan fitur lengkap, mudah digunakan, dan gratis
				sebagai wadah bagi mahasiswa untuk belajar, berdiskusi, dan mengembangkan keterampilan digital secara mandiri.</p>

            <div class="big-circle"></div>
            <div class="big-circle2"></div>
        </div>

        <!-- RIGHT REGISTER VERSION -->
        <div class="login-right">
            <h2>Create Account</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('register.post')}}" method="POST">
                @csrf

                <div class="input-group-custom">
                    <i class="fa fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>

                <div class="input-group-custom">
                    <i class="fa fa-user"></i>
                    <input type="text" name="username" placeholder="Username" required>
                </div>

                <div class="input-group-custom">
                    <i class="fa fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>

                <button class="btn-teal">Register</button>

                <p class="bottom-text">
                    Already have an account? <a href="/">Sign In</a>
                </p>

            </form>
        </div>

    </div>
</div>

</body>
</html>
