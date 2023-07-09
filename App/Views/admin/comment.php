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
                            <th>Author</th>
                            <th>Email</th>
                            <th>Content</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Unapprove</th>
                            <th>Approve</th>
                            <th>DELETE</th>
                            <th>VIEW COMMENT</th>
                        </tr>
                        </thead>
                        <?php foreach ($comments as $comment) { ?>
                            <tbody>
                            <tr>
                                <td><?php echo $comment['comment_id']; ?></td>
                                <td><?php echo $comment['comment_author']; ?></td>
                                <td><?php echo $comment['comment_email']; ?></td>
                                <td><?php echo $comment['comment_content']; ?></td>
                                <td><?php echo $comment['comment_status']; ?></td>
                                <td><?php echo $comment['comment_date']; ?></td>
                                <td><a href="?unapprove=<?php echo $comment['comment_id'];?>">Unapprove</a></td>
                                <td><a href="?approve=<?php echo $comment['comment_id'];?>">Approve</a></td>
                                <td><a href="?delete=<?php echo $comment['comment_id'];?>">DELETE</a></td>
                                <td><a target="_blank" href="/posts/new/<?php echo $comment['comment_post_id']; ?>">View Comment</a></td>
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
