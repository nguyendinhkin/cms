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
                            <label for="title" class="title">Post Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>

                        <div class="form-group">
                            <label for="post_category" class="title">Post Category</label>
                            <br>
                            <select name="post_category" id="post_category">
                                <?php foreach ($categories as $category) { ?>

                                <option value="<?php echo $category['cat_id']; ?>"><?php echo $category['cat_title']; ?></option>
                                <?php } ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title" class="title">Post Author</label>
                            <input type="text" class="form-control" name="author">
                        </div>

                        <div class="form-group">
                            <label for="post_status" class="title">Post Status</label>
                            <br>
                            <select name="post_status" id="">
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="post_image" class="title">Post Image</label>
                            <input type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label for="post_tags" class="title">Post Tags</label>
                            <input type="text" class="form-control" name="post_tags">
                        </div>

                        <div class="form-group">
                            <label for="post_content" class="title">Post Content</label>
                            <textarea class="form-control" name="post_content" id="summernote" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="create-post" value="Publish Post"></div>
                    </form>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php require "includes/footer.php";?>
