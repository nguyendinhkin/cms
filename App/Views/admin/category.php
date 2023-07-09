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

                    <div class="col-xs-6">
                        <form action="" method="POST">
                            <label for="cat-title">Add category</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                            </div>
                        </form>
                        <?php if(isset($_GET['edit'])) { ?>
                        <form action="" method="POST">
                            <label for="cat-title">Edit category</label>
                            <div class="form-group">
                                <input class="form-control" type="text" name="cat_title" value="<?php echo $category[0]['cat_title']; ?>">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update_category" value="Update category">
                            </div>
                        </form>
                        <?php } ?>
                    </div>

                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Category title</td>
                                <td>DELETE</td>
                                <td>UPDATE</td>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $category) { ?>
                                <tr>
                                    <td><?php echo $category['cat_id']; ?></td>
                                    <td><?php echo $category['cat_title']; ?></td>
                                    <td><a href="category?delete=<?php echo $category['cat_id']; ?>" onclick="return confirm('Are you sure?')">DELETE</a></td>
                                    <td><a href="category?edit=<?php echo $category['cat_id']; ?>">UPDATE</a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php require "includes/footer.php";?>
