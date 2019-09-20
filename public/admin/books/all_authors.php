<?php require_once("../../../private/initialize.php"); ?>

<?php $authors = Author::find_all(); ?>

<?php require_once(SHARED_PATH . "/admin_header.php");?>

    <style>
        .card{
            margin: 1em 0;
        }
    </style>
    <div class="container">
        <h1 class="display-3 text-primary text-center mb-4">
            Manage Authors
        </h1>

        <?php echo display_session_message(); ?>
        <a href="add_author.php" class="btn btn-primary ml-2">Add a new Author</a>



        <div class="card">
            <div class="card-header" style="background: #fffee6;">
                <span class="h4">Authors</span>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                    <th>#id</th>
                    <th>Category</th>
                    <th>Actions</th>
                    </thead>

                    <?php foreach ($authors as $author){ ?>

                        <tr>
                            <td><?php echo $author->id ?></td>
                            <td><?php echo $author->name ?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="edit_author.php?id=<?php echo $author->id; ?>">Edit</a>
                                <a class="btn btn-danger btn-sm disabled" href="#">Delete</a>
                            </td>
                        </tr>

                    <?php } ?>


                </table>
            </div>
        </div>

    </div>


<?php require_once(SHARED_PATH . "/public_footer.php");?><?php
