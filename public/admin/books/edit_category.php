<?php require_once("../../../private/initialize.php") ?>
<?php
    if(!isset($_GET['id'])){
        redirect_to(url_for("admin/books/all_categories.php"));
    }

    $id = $_GET['id'];
    $category = Category::find_by_id($id);
    if($category == false){
        redirect_to(url_for("admin/books/all_categories.php"));
    }
?>

<?php
if(is_post_request()){
    $args = $_POST['category'];
    $category->merge_attributes($args);
    $result = $category->save();

    if($result == true){
        $_SESSION['message'] = "Category has been successfully Updated.";
        redirect_to(url_for("/admin/books/all_categories.php"));
    }else{
        // show errors
    }
}else{
    // display the form
    $category = Category::find_by_id($id);
}



?>
<?php require_once(SHARED_PATH . "/admin_header.php");?>

    <div class="container mb-4">
        <h1 class="display-3 mb-4 text-center text-primary">Edit Category</h1>
        <?php echo display_errors($category->errors); ?>

        <form method="post" action="edit_category.php?id=<?php echo $id ?>">
            <div class="form-group">
                <label class="form-label" for="category">Name of the Category</label>
                <input type="text" name="category[name]" class="form-control" value="<?php echo $category->name; ?>">
            </div>

            <div class="form-group">
                <label class="form-label" for="status">Category Status</label>
                <select class="form-control" name="category[status]">
                    <option value="Active" <?php if($category->status == "Active"){echo "selected";} ?> >Active</option>
                    <option value="Inactive" <?php if($category->status == "Inactive"){echo "selected";} ?>>Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary" name="submit">
            </div>
        </form>
    </div>


<?php require_once(SHARED_PATH . "/public_footer.php");?>