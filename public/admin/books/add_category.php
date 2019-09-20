<?php require_once("../../../private/initialize.php") ?>

<?php
if(is_post_request()){
    $args = $_POST['category'];

    $category = new Category($args);
    $result = $category->create();

    if($result == true){
        $_SESSION['message'] = "New Category has been successfully added.";
        redirect_to(url_for("/admin/index.php"));
    }else{
        // show errors
    }
}else{
    // display the form
    $category = new Category();
}



?>
<?php require_once(SHARED_PATH . "/admin_header.php");?>

    <div class="container mb-4">
    <h1 class="display-3 mb-4 text-center text-primary">Add New Category</h1>
<?php echo display_errors($category->errors); ?>
    <form method="post" action="add_category.php">
        <div class="form-group">
            <label class="form-label" for="category">Name of the Category</label>
            <input type="text" name="category[name]" class="form-control" placeholder="Category Name">
        </div>

        <div class="form-group">
            <label class="form-label" for="status">Category Status</label>
            <select class="form-control" name="category[status]">
                <option value="Active" selected>Active</option>
                <option value="Inactive">Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary" name="submit">
        </div>
    </form>
    </div>


<?php require_once(SHARED_PATH . "/public_footer.php");?>