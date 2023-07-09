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
                    <form action="/admin/posts/option" method="post">
                        <table class="table table-bordered table-hover">
                            <div id="bulkOptionContainer" class="col-xs-4">
                                <select name="bulk_option" id="" class="form-control">
                                    <option value="">Select Option</option>
                                    <option value="published">Published</option>
                                    <option value="draft">Draft</option>
                                    <option value="delete">Delete</option>
                                    <option value="clone">Clone</option>

                                </select>
                            </div>

                            <div class="col-xs-4">
                                <input type="submit" name="submit" class="btn btn-success" value="Apply">
                                <a href="/admin/add-post" class="btn btn-primary">Add new</a>
                            </div>
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="checkAllBoxes"></th>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Date</th>
                                <th>UPDATE</th>
                                <th>DELETE</th>
                            </tr>
                            </thead>
                            <?php foreach ($posts as $post) { ?>

                            <tbody>
                            <tr>
                                <td><input type="checkbox" class="checkBoxes" name="checkBoxesArray[]" value="<?php echo $post['post_id']; ?>"></td>
                                <td><?php echo $post['post_id']; ?></td>
                                <td><?php echo $post['post_author']; ?></td>
                                <td><?php echo $post['post_title']; ?></td>
                                <td><?php echo $post['cat_title']; ?></td>
                                <td><?php echo $post['post_status']; ?></td>
                                <td><img width="80" src="/image/<?php echo $post['post_image']; ?>" alt=""></td>
                                <td><?php echo $post['post_tags']; ?></td>
                                <td><?php echo $post['post_date']; ?></td>
                                <td><a href="/admin/posts/edit/<?php echo $post['post_id']; ?>">UPDATE</a></td>
                                <td><a href="?source=delete&id=<?php echo $post['post_id']; ?>" onclick="return confirm('Are you sure?')">DELETE</a></td>
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
