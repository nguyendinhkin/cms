<?php require "includes/header.php"; ?>

<div id="wrapper">

    <?php require "includes/navigation.php";?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Blank Page
                        <small>Subheading</small>
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="user_firstname" class="title">Firstname</label>
                            <input value="<?php echo $user[0]['user_firstname'] ?>" type="text" class="form-control" name="user_firstname">
                        </div>

                        <div class="form-group">
                            <label for="user_lastname" class="title">Lastname</label>
                            <input value="<?php echo $user[0]['user_lastname'] ?>" type="text" class="form-control" name="user_lastname">
                        </div>

                        <div class="form-group">
                            <select name="user_role" id="user_role">
                                <option value="<?php echo $user[0]['user_role'] ?>"><?php echo $user[0]['user_role']; ?></option>
                                <?php
                                if($user[0]['user_role'] == 'admin') { ?>
                                    <option value="subscriber">Subscriber</option>
                                <?php } else { ?>
                                    <option value="admin">Admin</option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="username" class="title">Username</label>
                            <input value="<?php echo $user[0]['username'] ?>" type="text" class="form-control" name="username">
                        </div>

                        <div class="form-group">
                            <label for="user_email" class="title">Email</label>
                            <input value="<?php echo $user[0]['user_email'];?>" type="email" class="form-control" name="user_email">
                        </div>

                        <!--    <div class="form-group">-->
                        <!--        <label for="post_image" class="title">Post Image</label>-->
                        <!--        <input type="file" name="image">-->
                        <!--    </div>-->

                        <div class="form-group">
                            <label for="user_password" class="title">Password</label>
                            <input autocomplete="off" type="password" class="form-control" name="user_password">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="update_user" value="Update User"></div>
                    </form>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php require "includes/footer.php";?>
