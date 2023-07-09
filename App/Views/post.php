<?php require "includes/header.php"; ?>

<!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $post['post_title']; ?></h1>

                <!-- Author -->
                <p class="lead">
                    <?php echo $post['post_author']; ?>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post['post_date']; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="/image/<?php echo $post['post_image']; ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p><?php echo $post['post_content']; ?></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="Author">Author</label>
                            <input type="text" name="comment_author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                            <label for="content">Your Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <?php if(!empty($comments)) {
                    foreach ($comments as $comment) { ?>
                        <!-- Posted Comments -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $comment['comment_author']; ?>
                                    <small><?php echo $comment['comment_date']; ?></small>
                                </h4>
                                <?php echo $comment['comment_content']; ?>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>

<?php require "includes/sidebar.php";?>

<?php require "includes/footer.php"; ?>