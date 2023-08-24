<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieLogin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f8f8;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.075);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 150px;
        }

        .title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .auth-link {
            display: block;
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
            color: #000;
            text-decoration: none;
        }

        .auth-link:hover {
            text-decoration: underline;
        }

        .social-btns {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .social-btns .btn {
            margin-right: 10px;
        }

        .social-btns .btn i {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="{{url('images/logo.svg')}}" alt="logo">
        </div>
        <h2 class="title">Hello! Let's get started</h2>
        <p>Sign in to continue.</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">SIGN IN</button>
            </div>
        </form>

        <p class="auth-link">Don't have an account? <a href="{{route('register')}}">Create</a></p>

        <div class="social-btns">
            <button class="btn btn-facebook"><i class="fab fa-facebook-f"></i>Connect using Facebook</button>
            <button class="btn btn-twitter"><i class="fab fa-twitter"></i>Connect using Twitter</button>
        </div>
    </div>
    <script src="{{url('vendors/js/vendor.bundle.base.js')}}"></script>
</body>

</html>
