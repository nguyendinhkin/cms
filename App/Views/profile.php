<?php require "includes/header.php"; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="container bootstrap snippets bootdey">
            <h1 class="text-primary">Edit Profile</h1>
            <hr>
            <div class="row">
                <!-- left column -->
                <div class="col-md-3">
                    <div class="text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-circle img-thumbnail" alt="avatar">
                        <h6>Upload a different photo...</h6>

<!--                        <input type="file" class="form-control">-->
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#password').hideShowPassword({
                            show: false,
                            innerToggle: 'focus'
                        });
                    });
                </script>
                <!-- edit form column -->
                <div class="col-md-9 personal-info">

                    <h3>Personal info</h3>

                    <form class="form-horizontal" method="post" action="/profile/edit">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">First name:</label>
                            <div class="col-lg-8">
                                <input name="user_firstname" class="form-control" type="text" value="<?php echo $user[0]['user_firstname'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Last name:</label>
                            <div class="col-lg-8">
                                <input name="user_lastname" class="form-control" type="text" value="<?php echo $user[0]['user_lastname'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Username:</label>
                            <div class="col-lg-8">
                                <input name="username" class="form-control" type="text" value="<?php echo $user[0]['username'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                                <input name="user_email" class="form-control" type="text" value="<?php echo $user[0]['user_email'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Password:</label>
                            <div class="col-lg-8">
                                <input id="password" name="user_password" class="form-control" type="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary center-block" name="submit" value="Submit"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>

        <?php require "includes/footer.php"; ?>
