<?php require "includes/header.php"; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <script>
            $(document).ready(function() {
                $('#password').hideShowPassword({
                    show: false,
                    innerToggle: 'focus'
                });
            });
        </script>
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-xs-6 col-xs-offset-3">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="/login/create" method="post">
                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group">
                            <label for="email" class="text-info">Email:</label><br>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
<!--                            <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>-->
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                        </div>
                        <div id="register-link" class="text-right">
                            <a href="#" class="text-info">Register here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <?php require "includes/footer.php"; ?>
