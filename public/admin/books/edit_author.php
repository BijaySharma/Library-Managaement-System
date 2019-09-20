<?php require_once("../../../private/initialize.php") ?>

<?php
if(!isset($_GET['id'])){
    redirect_to(url_for("admin/books/all_authors.php"));
}

$id = $_GET['id'];
$author = Author::find_by_id($id);
if($author == false){
    redirect_to(url_for("admin/books/all_authors.php"));
}
?>

<?php
if(is_post_request()){
    $args = $_POST['author'];

    $author->merge_attributes($args);
    $result = $author->save();

    if($result == true){
        $_SESSION['message'] = "Author's Name has been updated successfully.";
        redirect_to(url_for("/admin/books/all_authors.php"));
    }else{
        // show errors
    }
}else{
    // display the form
}



?>
<?php require_once(SHARED_PATH . "/admin_header.php");?>

    <div class="container mb-4">
        <h1 class="display-3 mb-4 text-center text-primary">Edit Author</h1>

        <div class="card" style="margin: 0 auto; max-width: 600px">
            <div class="card-header">
                Edit Author
            </div>
            <div class="card-body">
                <?php echo display_errors($author->errors); ?>

                <form method="post" action="edit_author.php?id=<?php echo $id;?>">

                    <div class="form-group">
                        <label class="form-label" for="author_name">Name</label>
                        <input type="text" name="author[name]" class="form-control" value="<?php echo $author->name ?? '' ?>">
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" value="Update" class="btn btn-primary" name="submit">
                    </div>
                </form>
            </div>
        </div>

    </div>


<?php require_once(SHARED_PATH . "/public_footer.php");?>