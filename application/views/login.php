<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        /* Register */
        .register-text {
            text-align: center;
            font-size: 14px;
            margin-top: 15px;
        }

        .register-text a {
            color: #ff8c00;
            text-decoration: none;
        }

        .register-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>LOGIN</h2>

        <!-- Flash Message -->
        <?php if ($this->session->flashdata('error')): ?>
        <div style="color: red; text-align: center; margin-bottom: 10px;">
            <?= $this->session->flashdata('error'); ?>
        </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')): ?>
        <div style="color: green; text-align: center; margin-bottom: 10px;">
            <?= $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>

        <form action="<?php echo site_url('index.php/authcontroller/login')?>" method="POST">
        <div>
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Masukkan email" name="email">
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Masukkan password" name="password">
        </div>
        <div class="register-text">
            <p>Belum Punya Akun? <a href="<?php echo site_url("index.php/authcontroller/index_register")?>">Register</a></p>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>