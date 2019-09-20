<?php require_once("../../../private/initialize.php") ?>

<?php
if(is_post_request()){
    $args = $_POST['author'];

    $author = new Author($args);
    $result = $author->create();

    if($result == true){
        $_SESSION['message'] = "Author- \"" . $author->name . "\" has been added successfully.";
        redirect_to(url_for("/admin/index.php"));
    }else{
        // show errors
    }
}else{
    // display the form
    $author = new Author();
}



?>
<?php require_once(SHARED_PATH . "/admin_header.php");?>

    <div class="container mb-4">
        <h1 class="display-3 mb-4 text-center text-primary">Add New Author</h1>

        <div class="card" style="margin: 0 auto; max-width: 600px">
            <div class="card-header">
                Author Registration Form
            </div>
            <div class="card-body">
                <?php echo display_errors($author->errors); ?>
                <form method="post" action="add_author.php">

                    <div class="form-group">
                        <label class="form-label" for="category">Name</label>
                        <input type="text" name="author[name]" class="form-control" value="<?php echo $author->name ?? '' ?>" placeholder="Author Name">
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" value="Add" class="btn btn-primary" name="submit">
                    </div>
                </form>
            </div>
        </div>

    </div>


<?php require_once(SHARED_PATH . "/public_footer.php");?>