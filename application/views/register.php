<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* General Reset*/
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-label {
            font-size: 14px;
            color: #555;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            margin-top: 6px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            color: #333;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #ff8c00;
            outline: none;
        }

        .form-check-label {
            font-size: 14px;
            color: #555;
        }

        .form-check-input {
            margin-right: 10px;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            margin-top: 40px;
            background-color: #ff8c00;
            border: none;
            color: #fff;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #ff8c00;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .login-container {
                padding: 30px;
            }

            .form-control {
                font-size: 14px;
            }

            .btn-primary {
                font-size: 14px;
            }
        }
        /* Login */
        .login-text {
            text-align: center;
            font-size: 14px;
            margin-top: 15px;
        }

        .login-text a {
            color: #ff8c00;
            text-decoration: none;
        }

        .login-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>REGISTER</h2>
        <form action="<?php echo base_url('/authcontroller/register')?>" method="POST">
            <div>
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama">
            </div>
            <div>
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Masukkan email" name="email">
            </div>
            <div>
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Masukkan password" name="password">
            </div>
            <div>
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <div class="login-text">
            <p>Sudah Punya Akun? <a href="<?php echo site_url("main/login")?>">Login</a></p>
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>