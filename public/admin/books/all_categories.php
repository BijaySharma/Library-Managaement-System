<?php require_once("../../../private/initialize.php"); ?>

<?php $categories = Category::find_all(); ?>

<?php require_once(SHARED_PATH . "/admin_header.php");?>

<style>
    .card{
        margin: 1em 0;
    }
</style>
<div class="container">
    <h1 class="display-3 text-primary text-center mb-4">
        Manage Categories
    </h1>

        <?php echo display_session_message(); ?>
        <a href="add_category.php" class="btn btn-primary ml-2">Add a new category</a>



    <div class="card">
        <div class="card-header" style="background: #fffee6;">
            <span class="h4">Categories</span>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                <th>#id</th>
                <th>Category</th>
                <th>Status</th>
                <th>Actions</th>
                </thead>

                <?php foreach ($categories as $category){ ?>

                    <tr>
                        <td><?php echo $category->id ?></td>
                        <td><?php echo $category->name ?></td>
                        <td><?php echo $category->status ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="edit_category.php?id=<?php echo $category->id; ?>">Edit</a>
                            <a class="btn btn-danger btn-sm disabled" href="#">Delete</a>
                        </td>
                    </tr>

                    <?php } ?>


            </table>
        </div>
    </div>

</div>


<?php require_once(SHARED_PATH . "/public_footer.php");?>