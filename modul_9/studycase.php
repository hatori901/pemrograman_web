<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $message = "";
    if (is_string($username) && is_string($password)) {
        if ($username == "admin" && $password == "admin") {
            $message = "Selamat datang " . $username . "!";
        } else {
            $message = "Login gagal. Silahkan coba lagi.";
        }
    } else {
        $message = "Data tidak valid.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        .container {
            width: 100%;
            height: 100vh;
            background-color: #f1f1f1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-form {
            width: 400px;
            height: 400px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            margin-bottom: 10px;
        }

        input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #2ecc71;
            color: #fff;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .message {
            border: 1px solid #000;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-form">
            <h2 class="title">Login Page</h2>
            <?php if (isset($message)) : ?>
                <div class="message">
                    <?= $message ?>
                </div>
            <?php endif; ?>
            <form name="loginForm" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" onsubmit="return validate()">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <input type="submit" name="login" value="Login">
            </form>
        </div>
    </div>

    <script>
        function validate() {
            const username = document.querySelector('input[name="username"]').value;
            const password = document.querySelector('input[name="password"]').value;

            if (!username || !password) {
                alert('Username dan Password harus diisi!');
                document.forms["loginForm"]["username"].focus()
                return false;
            }
            if (!/^[a-zA-Z]*$/g.test(username) || !/^[a-zA-Z]*$/g.test(pasword)) {
                alert("Username dan Password hanya boleh berisi huruf");
                document.forms["loginForm"]["username"].focus();
                return false;
            }
        }
    </script>
</body>

</html>