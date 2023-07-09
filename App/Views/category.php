<?php require "includes/header.php"; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                New Posts
                <small>Secondary Text</small>
            </h1>
            <?php foreach ($posts as $post) { ?>
                <!-- First Blog Post -->
                <h2>
                    <a href="/posts/new/<?php echo $post['post_id']; ?>"><?php echo $post['post_title'] ?></a>
                </h2>
                <p class="lead">
                    <?php echo $post['post_author'] ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post['post_date'] ?></p>
                <hr>
                <img class="img-responsive" src="/image/<?php echo $post['post_image'] ?>" alt="">
                <hr>
                <p><?php echo $post['post_content'] ?></p>
                <a class="btn btn-primary" href="/posts/new/<?php echo $post['post_id']; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            <?php } ?>

        </div>

        <?php require "includes/sidebar.php";?>

        <?php require "includes/footer.php"; ?>
