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

                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Firtname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Subscriber</th>
                            <th>Admin</th>
                            <th>UPDATE</th>
                            <th>DELETE</th>
                        </tr>
                        </thead>
                        <?php foreach ($users as $user) { ?>

                            <tbody>
                            <tr>
                                <td><?php echo $user['user_id']; ?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['user_firstname']; ?></td>
                                <td><?php echo $user['user_lastname']; ?></td>
                                <td><?php echo $user['user_email']; ?></td>
                                <td><?php echo $user['user_role']; ?></td>
                                <td><a href="?role=subscriber&id=<?php echo $user['user_id']; ?>">Subscriber</a></td>
                                <td><a href="?role=admin&id=<?php echo $user['user_id']; ?>">Admin</a></td>
                                <td><a href="/admin/users/edit/<?php echo $user['user_id']; ?>">UPDATE</a></td>
                                <td><a href="?delete=<?php echo $user['user_id']; ?>" onclick="return confirm('Are you sure?')">DELETE</a></td>
                            </tr>
                            </tbody>
                        <?php } ?>

                    </table>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php require "includes/footer.php";?>
