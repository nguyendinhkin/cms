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
                    <?php if(!empty($user)) { ?>
                        <ul>
                            <?php foreach ($user as $error) { ?>
                            <li><?php echo $error;?></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                    <form id="login-form" class="form" action="/signup/success" method="post">
                        <h3 class="text-center text-info">Signup</h3>
                        <div class="form-group">
                            <label for="username" class="text-info">Username:</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-info">Email:</label><br>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="text" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <?php require "includes/footer.php"; ?>
