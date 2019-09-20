<?php require_once("../../private/initialize.php")?>
<?php require_admin_login(); ?>
<?php require_once(SHARED_PATH . "/admin_header.php");?>
    <div class="container">
        <h1 class="display-3">Admin's Dashboard</h1>

        <?php echo display_session_message(); ?>

        <div class="row">
            <div class="col-sm-4 mb-4 mt-4">

                <div class="card">
                    <div class="card-header">
                        Books
                    </div>
                    <div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action" href="<?php echo url_for("/admin/books/all_books.php");?>">All Books</a>
                        <a class="list-group-item list-group-item-action" href="<?php echo url_for("/admin/books/add_book.php");?>"> Add Books</a>
                        <a class="list-group-item list-group-item-action" href="<?php echo url_for("/admin/books/all_authors.php");?>"> Manage Authors</a>
                        <a class="list-group-item list-group-item-action" href="<?php echo url_for("/admin/books/add_author.php");?>"> Add Authors</a>
                        <a class="list-group-item list-group-item-action" href="<?php echo url_for("/admin/books/all_categories.php");?>"> Manage Categories</a>
                        <a class="list-group-item list-group-item-action" href="<?php echo url_for("/admin/books/add_category.php");?>"> Add Category</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-4 mt-4">
                <div class="card">
                    <div class="card-header">
                        Management
                    </div>
                    <div class="list-group list-group-flush">
                         <a class="list-group-item list-group-item-action" href="<?php echo url_for("/admin/books/issue_book.php");?>"> Issue Book</a>
                         <a class="list-group-item list-group-item-action" data-toggle="modal" data-target="#withdrawModal" href="#" class="disabled"> Withdraw Book</a>
                         <a class="list-group-item list-group-item-action" href="<?php echo url_for("/admin/books/all_issued_books.php");?>"> View all Issued Books</a>
                         <a class="list-group-item list-group-item-action" href="#" class="disabled"> View By User</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-4 mt-4">
                <div class="card">
                    <div class="card-header">
                        User Management
                    </div>
                    <ul class="list-group list-group-flush">
<!--                         <a class="list-group-item list-group-item-action" href="--><?php //echo url_for("/admin/users/index.php"); ?><!--">User Management</a></li>-->
                         <a class="list-group-item list-group-item-action" href="<?php echo url_for("/admin/users/index.php")?>"> Manage Users</a></li>
                         <a class="list-group-item list-group-item-action" href="<?php echo url_for("/admin/users/add_user.php"); ?>">Add new User </a></li>
                         <a class="list-group-item list-group-item-action" href="<?php echo url_for("/admin/users/find_user.php"); ?>"> Search User</a></li>
                    </ul>
                </div>
            </div>
        </div>



        <!-- Withdraw Book Modal -->
        <div class="modal fade" id="withdrawModal" tabindex="-1" role="dialog" aria-labelledby="withdrawModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Withdraw Book</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label class="form-label" for="library_id">Library ID</label>
                                <input type="text" class="form-control" placeholder="Library ID" name="usrid">
                                <small>Please enter User's Library ID No. here.</small>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Continue</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

<?php require_once(SHARED_PATH . "/public_footer.php");
