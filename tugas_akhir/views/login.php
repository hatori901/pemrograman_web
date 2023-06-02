<!DOCTYPE html>
<html lang="en">
<?php
include 'components/header.php';
?>

<body>
    <div class="content-login">
        <div class="login-form">
            <h2 class="title">Login Page</h2>
            <form id="login" name="loginForm">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <button id="login_btn" type="submit" class="btn btn-success">
                    Login
                </button>
            </form>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('#login').submit(function(e) {
            e.preventDefault();
            $('#login_btn').html("Loading...")
            $.ajax({
                type: "POST",
                url: "/api/login-request",
                data: $(this).serialize(),
                success: function(response) {
                    setTimeout(() => {
                        $('#login_btn').html("Login")
                        if (response.status) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.href = '/dashboard'
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal login!',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }, 500)
                }
            });
        });
    });
    </script>
</body>

</html>